<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");

if ($conn) {
    if (isset($_POST['Submit'])) {
        $fName = $_POST['firstName'];
        $lName = $_POST['lastName'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $username = $_POST['username'];
        $phoneNumber = $_POST['phoneNumber'];
        $type = "Client";

        if ($_FILES["profileImage"]["error"] == 4) {
            $newImageName = "person.jpg";

        } else {
            $fileName = $_FILES["profileImage"]["name"];
            $fileSize = $_FILES["profileImage"]["size"];
            $tmpName = $_FILES["profileImage"]["tmp_name"];

            $validImageExtension = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp', 'tiff', 'psd', 'raw'];
            $ImageExtension = explode('.', $fileName);
            $ImageExtension = strtolower(end($ImageExtension));
            if (!in_array($ImageExtension, $validImageExtension)) {
                echo
                    "
              <script>
                alert('Invalid profileImage Extension');
              </script>
              ";
            } else if ($fileSize > 1000000) {
                echo
                    "
              <script>
                alert('profileImage Size Is Too Large');
              </script>
              ";
            } else {
                $newImageName = uniqid();
                $newImageName .= '.' . $ImageExtension;

                move_uploaded_file($tmpName, 'assets/img/' . $newImageName);




            }
        }
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $check_username_sql = "SELECT * FROM Client WHERE Username = '$username'";
        $check_username_result = mysqli_query($conn, $check_username_sql);

        if (mysqli_num_rows($check_username_result) > 0) {
            echo "<script>alert('Username already exists')</script>";
        } else {
            $insert_sql = "INSERT INTO Client (ClientName, ClientSurname, Username, Email, Gender, Phone, Password,Type, ProfileImage) 
    VALUES ('$fName', '$lName', '$username', '$email', '$gender', '$phoneNumber', '$hashed_password','$type','$newImageName')";

            if (mysqli_query($conn, $insert_sql)) {
                echo "<script>alert('Registration successful')</script>";
                header('Location: signIn.php');
                exit;
            } else {
                echo "<script>alert('Registration failed')</script>";
            }
        }

    }



} else {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_close($conn);

?>