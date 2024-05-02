<?php
    $conn = mysqli_connect("localhost", "root", "", "agencydb");

    if ($conn) {    
        if(isset($_POST['Submit'])){
            $fName = $_POST['firstName'];
            $lName = $_POST['lastName'];
            $password = $_POST['password'];
            $email = $_POST['email'];
            $gender = $_POST['gender'];
            $username = $_POST['username'];
            $phoneNumber = $_POST['phoneNumber'];
            $type = $_POST['Type'];
        
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        
            $check_username_sql = "SELECT * FROM Client WHERE Username = '$username'";
            $check_username_result = mysqli_query($conn, $check_username_sql);
        
            if(mysqli_num_rows($check_username_result) > 0) {
                echo "<script>alert('Username already exists')</script>";
            } else {
                $insert_sql ="INSERT INTO Client (ClientName, ClientSurname, Username, Email, Gender, Phone, Password,Type) 
                VALUES ('$fName', '$lName', '$username', '$email', '$gender', '$phoneNumber', '$hashed_password','$type')";
                
                if(mysqli_query($conn, $insert_sql)) {
                    echo "<script>window.location.href = 'staff-admin.php';</script>";
                    exit;
                } else {
                    echo "<script>alert('Registration failed')</script>";
                }
            }
        }
        
      
    }else{
        die("Connection failed: " . mysqli_connect_error());
    }
    
    
    mysqli_close($conn);

?>