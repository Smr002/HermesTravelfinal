<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if($conn){

if(isset($_POST['loginButton'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $sql = "SELECT * FROM client WHERE Username = '$username'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $resultPassword = $row['Password']; 

            if(password_verify($password , $resultPassword)) { 
                if($username == "admin"){
                    header('Location: http://localhost/web/src/Agency/admin.php');
                }
                echo "<script>alert('Login successful')</script>";
                exit;
            } else {
                echo "<script>alert('Login unsuccessful')</script>";
            }
        }
    } else {
        echo "<script>alert('Username not found')</script>";
    }
    mysqli_close($conn);
}}
?>
