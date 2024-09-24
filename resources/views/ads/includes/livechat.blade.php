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

    .message-bubble {
        display: flex;
        align-items: center;
        margin-bottom: 15px;
    }

    .message-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        margin-right: 10px;
        background-color: #28a745;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 18px;
    }

    .message-content {
        max-width: 70%;
        padding: 10px;
        border-radius: 10px;
        background-color: #f1f1f1;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }

    .message-time {
        margin-top: 5px;
        font-size: 12px;
        color: #888;
    }

    .chat-form {
        display: flex;
        justify-content: space-between;
        padding-top: 10px;
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

<div class="col-lg-4 mt-50">
    <div class="chat-container">
        <!-- Messages Display Section -->
        <div class="chat-messages" id="chat-messages">
            <ul id="messages-list">
                <!-- Messages will be appended here -->
            </ul>
        </div>

        <!-- Form to Submit a New Message -->
        <div class="chat-form">
            <input type="text" id="message-input" placeholder="Invia il tuo messaggio" />
            <button id="send-message-btn">Send</button>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/7.0.3/pusher.min.js"></script>

<script>
    // Setup CSRF token for axios
    axios.defaults.headers.common['X-CSRF-TOKEN'] = '{{ csrf_token() }}'
    
    // Extract match_id from the URL
    const urlParams = new URLSearchParams(window.location.search);
    const matchId = urlParams.get('match_id'); // Get match_id from the URL

    if (!matchId) {
        console.error('Match ID is missing in the URL.');
    }

    // Initialize Pusher for real-time updates
    const pusher = new Pusher('{{ env('PUSHER_APP_KEY') }}', {
        cluster: '{{ env('PUSHER_APP_CLUSTER') }}',
        encrypted: true
    });

    // Subscribe to the chat channel
    const channel = pusher.subscribe('chat');
    channel.bind('MessageSent', function(data) {
        appendMessage(data.message);
    });

    // Function to append a message to the messages list
    function appendMessage(message) {
        const messagesList = document.getElementById('messages-list');
        
        const newMessage = document.createElement('li');
        newMessage.classList.add('message-bubble');
        
        const avatar = document.createElement('div');
        avatar.classList.add('message-avatar');
        avatar.textContent = message.user.name.charAt(0).toUpperCase() || 'A';
        
        const messageContent = document.createElement('div');
        messageContent.classList.add('message-content');
        messageContent.innerHTML = `
            <strong>${message.user.name}</strong><br>
            ${message.message}
            <div class="message-time">${new Date(message.created_at).toLocaleTimeString()}</div>
        `;
        
        newMessage.appendChild(avatar);
        newMessage.appendChild(messageContent);
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
        axios.post(`/chat/${matchId}`, { message: message })
            .then(response => {
                messageInput.value = ''; // Clear input field
            })
            .catch(error => {
                console.error('Error sending message:', error);
            });
    }

    // Fetch existing messages when the page loads
    window.onload = function() {
        axios.get(`/chat/${matchId}`)
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
