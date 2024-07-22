<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Background Image Example</title>
    <style>
        .background-container {
            position: relative;
            width: 100%; /* Adjust the width as necessary */
            height: 400px; /* Adjust the height as necessary */
            overflow: hidden; /* Ensures no content spills outside */
        }

        .background-container img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensures the image covers the div without stretching */
            z-index: -1; /* Puts the image behind other content */
        }
    </style>
</head>
<body>
@if(isset($ads) && $ads)
<div class="background-container">
    @foreach($ads as $ad)

            <a href="" class="d-block w-full">
                <img src="{{ $ad->getImageUrl() }}" alt="{{ $ad->title }}" class="w-full d-block">
            </a>

    @endforeach
</div>
@endif
</body>
</html>
