
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/styles1.css">
    <style>
        * {
            box-sizing: border-box;
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
        .add-country-form label {
        color: white; 
    }

    
    .add-country-form input[type="submit"] {
        background-color: red; 
        color: white; 
        border: none; 
        padding: 10px 20px; 
        cursor: pointer; 
    }

    .add-country-form input[type="submit"]:hover {
        background-color: darkred; 
    }
    </style>
</head>
<body>
  

    <div class="grid-container">
    <!-- Header -->
    <header class="header">
    <!-- <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div> -->
       
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <?php include_once "adminHeader.php";?>
    <!-- End Sidebar -->
    <!-- Main Content -->
    <main class="main-container">
     
    <div class="add-country-form" id="add-staff-form" >
    <form  action="addStaff.php" method="post">
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
                        <option value="other">Other</option>
                    </select>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="Type">Type:</label>
                    <select id="Type" name="Type" required>
                        <option value="employee">Employee</option>
                        <option value="manager">Manager</option>
                    </select>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="password">Password:</label>
                    <input type="password" id="password" placeholder="Password" name="password" required>
                </div>
                <div style="flex-basis: 48%;">
                    <label for="confirmPassword">Confirm Password:</label>
                    <input type="password" id="confirmPassword" placeholder="Confirm Password" name="confirmPassword" required>
                </div>
                <div style="flex-basis: 100%;">
                    <input type="submit" value="Submit" name = "Submit"> <br><br>
                    <p class="success-message"></p>
                    <p class="error-message"></p>
                </div>
            </div>
          
        </form>
    </div>    
    <?php
    include_once "viewStaff.php";
    
   
    // if(isset($_GET['staff-name'])){
    //     $staff_name = $_GET['staff-name'];
    //     $staff_email = $_GET['staff-email'];
    //     $staff_phone = $_GET['staff-phone'];
    //     $staff_role = $_GET['staff-role'];
    //     $staff_username = $_GET['staff-username'];
    //     $staff_password = $_GET['staff-password'];
    //     $staff_salary = $_GET['staff-salary'];
    //     echo "<div class='staff-item'>";
    //     echo "<p>$staff_name</p>";
    //     echo "<p>$staff_email</p>";
    //     echo "<p>$staff_phone</p>";
    //     echo "<p>$staff_role</p>";
    //     echo "<p>$staff_username</p>";
    //     echo "<p>$staff_password</p>";
    //     echo "<p>$staff_salary</p>";
      
        echo "</div>";
    //}
    
?>

    </main>
    <script src="js/scripts.js"></script>
</body>
</html>