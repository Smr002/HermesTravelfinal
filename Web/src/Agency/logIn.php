<?php
    session_start();

    $conn = mysqli_connect("localhost", "root", "", "agencydb");
    
    if($conn){
    
    if(isset($_POST['loginButton'])){
        
        $_SESSION['username'] = $_POST['username'];
        $_SESSION['password'] = $_POST['password'];
        $username = $_POST['username'];
        $password = $_POST['password'];


      
        $sql = "SELECT * FROM Client WHERE Username = '".$_POST['username']."' ";
        $result = mysqli_query($conn, $sql);


    
        if(mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                $resultPassword = $row['Password'];
                $_SESSION['ClientName'] = $row['ClientName'];
                $_SESSION['ClientSurname'] = $row['ClientSurname'];
                $_SESSION['Type'] = $row['Type'];
                
                
                
                if(password_verify($password , $resultPassword)) { 
                    if($row['Type'] == "employee" || $row['Type'] == "manager"){
                        header('Location: employeeDash.php');
                     }else if($row['Type'] == "admin" ){
                        header('Location: admin.php');
                    }else{
                    header('Location: main.php');
                    }
                    exit;
                } else {
                    echo "<script>alert('Login unsuccessful')</script>";
                    session_destroy();
                }
            }
        } else {
            echo "<script>alert('Username not found')</script>";
            session_destroy();
        }
        mysqli_close($conn);
    }}
    ?>
