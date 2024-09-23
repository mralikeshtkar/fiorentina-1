<style>
    .chat-container {
        max-width: 600px;
        margin: 0 auto;
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        background-color: #f9f9f9;
    }

    .chat-messages {
        height: 400px;
        overflow-y: scroll;
        border: 1px solid #ccc;
        padding: 10px;
        margin-bottom: 10px;
        background-color: white;
    }

    .chat-messages ul {
        list-style: none;
        padding: 0;
    }

    .chat-messages li {
        margin-bottom: 10px;
    }

    .chat-form {
        display: flex;
        justify-content: space-between;
    }

    .chat-form input[type="text"] {
        width: 80%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .chat-form button {
        padding: 10px 20px;
        border: none;
        background-color: #28a745;
        color: white;
        border-radius: 5px;
    }
</style>

<div class="col-lg-4">
    <div class="chat-container">
        <!-- Messages Display Section -->
        <div class="chat-messages" id="chat-messages">
            <ul id="messages-list">
                <!-- Messages will be appended here -->
            </ul>
        </div>

        <!-- Form to Submit a New Message -->
        <div class="chat-form">
            <input type="text" id="message-input" placeholder="Type a message" />
            <button id="send-message-btn">Send</button>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>

<script>
    // Setup CSRF token for axios
    axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute(
        'content');

    // Initialize Pusher for real-time updates
    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

    // Subscribe to the channel and bind the event
    const channel = pusher.subscribe('chat');
    channel.bind('MessageSent', function(data) {
        appendMessage(data.message);
    });

    // Function to append a message to the messages list
    function appendMessage(message) {
        const messagesList = document.getElementById('messages-list');
        const newMessage = document.createElement('li');
        newMessage.textContent = message.message; // Assuming 'message.message' contains the actual message content
        messagesList.appendChild(newMessage);

        // Scroll to the bottom of the chat
        const chatMessages = document.getElementById('chat-messages');
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Send message when button is clicked or enter key is pressed
    const sendMessageButton = document.getElementById('send-message-btn');
    const messageInput = document.getElementById('message-input');

    sendMessageButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keyup', function(event) {
        if (event.key === 'Enter') {
            sendMessage();
        }
    });

    function sendMessage() {
        const message = messageInput.value.trim();

        if (message === '') {
            return;
        }

        // Send message to the server
        axios.post('/messages', {
                message: message
            })
            .then(response => {
                messageInput.value = ''; // Clear input field
            })
            .catch(error => {
                console.error('Error sending message:', error);
            });
    }

    // Fetch existing messages when the page loads
    window.onload = function() {
        axios.get('/messages')
            .then(response => {
                const messages = response.data;
                messages.forEach(function(message) {
                    appendMessage(message);
                });
            })
            .catch(error => {
                console.error('Error fetching messages:', error);
            });
    };
</script>
