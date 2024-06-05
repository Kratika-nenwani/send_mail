<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f0f2f5;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        .send-mail-button {
            background: linear-gradient(90deg, #ff8a00, #e52e71);
            border: none;
            color: white;
            padding: 15px 30px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 30px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .send-mail-button:hover {
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.3);
            transform: translateY(-2px);
        }
        .send-mail-button:active {
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="container">

        <h1>Send Mail</h1>
        <a href="{{ route('send-mail') }}" class="send-mail-button">Send Mail</a>

        {{-- <button class="send-mail-button" onclick="sendMail()">Send Mail</button> --}}
    </div>

    <script>
        function sendMail() {
            // Implement the functionality to send mail
            alert('Mail sent!');
        }
    </script>
</body>
</html>
