<!DOCTYPE html>
<html>

<head>
    <title>Contact Page</title>
    <style>
        video {
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            z-index: -1;
            object-fit: cover;
            width: 100%;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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
            max-width: 800px;
            margin: 50px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"],
        select,
        textarea {
            width: calc(100% - 22px);
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        select {
            appearance: none;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            background-color: #ffc800;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: black;
        }

        .contact-details {
            text-align: center;
            margin-top: 30px;
        }

        .contact-details p {
            margin-bottom: 10px;
        }

        #signIn {
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
        #signIn:hover {
            background-color: black;
            transform: scale(1.05);
        }

        .sign-in-container {
            text-align: center;
            margin-top: 1px;
        }

        .error-message,
        .success-message {
            color: white;
            margin-top: 5px;
            padding: 5px 10px;
            border-radius: 5px;
            display: none;
        }

        .error-message {
            background-color: #dc3545;
        }

        .success-message {
            background-color: #28a745;
        }

        .footer {
            text-align: center;
            color: gray;
            margin-top: 20px;
        }

        .mot {
            color: gray;
            margin-left: 30px;
            animation: moveLeftRight 2s infinite;
        }

        @keyframes moveLeftRight {
            0% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(50px);
            }

            100% {
                transform: translateX(0);
            }
        }
    </style>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body>
    <video autoplay loop muted>
        <source src="assets/img/video.mp4" type="video/mp4" name='video'>
    </video>
    <div class="container">
        <h1>SignUp</h1>
        <form id="contactForm" action="createAcc.php" method="post" enctype="multipart/form-data">

            <div style="display: flex; flex-wrap: wrap;">
                <div style="flex-basis: 48%;">
                    <label for="firstName">First Name:</label>
                    <input type="text" id="firstName" placeholder="First Name" name="firstName" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="lastName">Last Name:</label>
                    <input type="text" id="lastName" placeholder="Last Name" name="lastName" required>
                </div>
                <div style="flex-basis: 100%;">
                    <label for="username">Username:</label>
                    <input type="text" id="username " placeholder="Username" name="username" required>
                </div>
                <div style="flex-basis: 100%;">
                    <label for="email">Email:</label>
                    <input type="email" id="email" placeholder="Email" name="email" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="phoneNumber">Phone Number:</label>
                    <input type="tel" id="phoneNumber" placeholder="Phone Number" name="phoneNumber" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Password" name="password" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword"
                        required>
                </div>
                <input type="file" name="profileImage" accept=".jpg, .jpeg, .png, .gif, .bmp, .svg, .webp, .tiff, .psd, .raw">




                
                <div style="flex-basis: 50%;">
                    <input type="submit" value="Submit" name="Submit">
                    <p class="success-message"></p>
                    <p class="error-message"></p>
                </div>

                <div class="sign-in-container">
                    <a href="http://localhost/web/src/Agency/signIn.php">
                        <button id="signIn" type="button">Sign In</button>
                </div>
                <br>
                <div style="display: flex; justify-content: center; align-items: center;">
                    <div class="g-recaptcha" data-sitekey="6LcAS9MpAAAAABr3H4NksFbee5AYEGstu4L6FHgV"></div>
                </div>
                <br>
                <div class="sign-in-container">
                
                </div>
                
                


        </form>
        <div class="footer">
            &copy; 2024 Your Adventure Journey. All rights reserved.
        </div>
        <div class="mot">
            "Explore Beyond Boundaries: Your Adventure Awaits!" &amp; ENJOYY"
        </div>
    </div>
   
    <script>

        function validateForm() {
            var inputs = document.querySelectorAll('input, select, textarea');
            var errorMessage = document.querySelector('.error-message');
            var isValid = true;
            errorMessage.style.display = 'none';

            inputs.forEach(function (input) {
                if (!input.value.trim()) {
                    displayErrorMessage('Please enter your ' + input.name);
                    isValid = false;
                }
            });

            var emailInput = document.getElementById('email');
            if (!validateEmail(emailInput.value)) {
                displayErrorMessage('Please enter a valid email address');
                isValid = false;
            }

            var passwordInput = document.getElementById('password');
            var confirmPasswordInput = document.getElementById('confirmPassword');
            if (passwordInput.value !== confirmPasswordInput.value) {
                displayErrorMessage('Passwords do not match');
                isValid = false;
            }


            return isValid;
        }

        function displayErrorMessage(message) {
            var errorMessage = document.querySelector('.error-message');
            errorMessage.textContent = message;
            errorMessage.style.display = 'block';
        }

        function validateEmail(email) {
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }

    </script>
</body>

</html>