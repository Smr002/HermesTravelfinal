<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
   
        * {
            box-sizing: border-box;
        }

        .video {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            z-index: -1; 
            object-fit: cover; 
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('images/globe.jpg'); 
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
            background-attachment: fixed; 
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #ffc800;
            text-align: center;
            margin-bottom: 30px;
        }

        form {
            margin-top: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="password"] {
            width: calc(100% - 20px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
            transition: border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="password"]:focus {
            border-color: #007bff;
            outline: none;
        }

        input[type="submit"],
        #signUp {
            width: 100%;
            background-color: #ffc800;
            color: #fff;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover,
        #signUp:hover {
            background-color: black;
            transform: scale(1.05);
        }

        .sign-up-container {
            text-align: center;
            margin-top: 10px;
        }

        .error-message {
            color: #dc3545;
            margin-top: 5px;
            display: none;
            text-align: center;
        }

        .success-message {
            color: #28a745;
            margin-top: 5px;
            display: none;
            text-align: center;
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    
</head>
<body>
    <script defer src="video.js"></script>
    <video class="video" autoplay muted loop>
        <source src="assets/img/video.mp4">
    </video>
    
    <div class="container">
        <h1>Login</h1>
        <form id="loginForm" action="#" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>
            <div class="g-recaptcha" data-sitekey="6LcAS9MpAAAAABr3H4NksFbee5AYEGstu4L6FHgV"></div><br>
            <input type="submit" value="Login" name="loginButton">
            <div class="sign-up-container">
                     <a href="http://localhost/web/src/Agency/signUp.php">
                <button id="signUp" type="button">Sign Up</button>

            </div>
            <div class="error-message" id="error-message"></div>
            <div class="success-message" id="success-message"></div>
        </form>
    </div>
    <?php
        include "logIn.php";
        
    ?>

    <script>   

        function validateForm() {
            var username = document.getElementById('username').value;
            var password = document.getElementById('password').value;
            var isValid = true;

            var errorMessage = document.getElementById('error-message');
            errorMessage.textContent = '';
            errorMessage.style.display = 'none';

            if (!username.trim() || !password.trim()) {
                errorMessage.textContent = 'Please enter both username and password.';
                errorMessage.style.display = 'block';
                isValid = false;
            }

            return isValid;
        }

        function resetForm() {
            document.getElementById('loginForm').reset();
            document.getElementById('error-message').textContent = '';
            document.getElementById('error-message').style.display = 'none';
            document.getElementById('username').classList.remove('input-error');
            document.getElementById('password').classList.remove('input-error');
        }
    </script>
</body>
</html>