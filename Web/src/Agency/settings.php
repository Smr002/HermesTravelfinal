<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "agencydb");
    
    if($conn){

      $username = $_SESSION['username'];
      $sql = "SELECT * FROM Client WHERE Username = '$username' ";
      $result = mysqli_query($conn, $sql);


  
      if(mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              $currentPassword = $row['Password'];
              $name = $row['ClientName'];
              $surname = $row['ClientSurname'];
              $phoneNumber = $row['Phone'];
              $email =$row['Email'] ;
              $img = $row['ProfileImage'];
      }

  }


    }else{
      echo "<script>alert('Please try again')</script>";
    }

    if ($conn) {
      if (isset($_POST['update'])) {
          $username = $_SESSION['username'];
          $newUsername =  $_POST['fullname'];
          $currPass = $_POST['currentPassword'];
          $email =  $_POST['email'];
          $phone =  $_POST['phone'];
          $newPassword =  $_POST['newPassword'];
          $newImage1="";


          if ($_FILES["newImage"]["error"] == 4) {
            $newImage1 = $img;
            } else {
            $fileName = $_FILES["newImage"]["name"];
            $fileSize = $_FILES["newImage"]["size"];
            $tmpName = $_FILES["newImage"]["tmp_name"];
      
            $validImageExtension = ['jpg', 'jpeg', 'png', 'gif', 'bmp', 'svg', 'webp', 'tiff', 'psd', 'raw'];
            $ImageExtension = explode('.', $fileName);
            $ImageExtension = strtolower(end($ImageExtension));
            if (!in_array($ImageExtension, $validImageExtension)) {
                echo
                    "
              <script>
                alert('Invalid newImage
         Extension');
              </script>
              ";
            } else if ($fileSize > 1000000) {
                echo
                    "
              <script>
                alert('newImage
         Size Is Too Large');
              </script>
              ";
            } else {
                $newImage1 = uniqid();
                $newImage1 .= '.' . $ImageExtension;
                if (move_uploaded_file($tmpName, 'assets/img/' . $newImage1)) {
                    echo
                        "
                <script>
                  alert('newImage
            Uploaded Successfully');
                </script>
                ";
                }
            }

  
        if (password_verify($currPass, $currentPassword)) {
              $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
              $sqlUpdate = "UPDATE Client SET Username='$newUsername', Email='$email', Password='$newPasswordHash', Phone='$phone', ProfileImage = '$newImage1' WHERE Username='$username'";
              $resultUpdate = mysqli_query($conn, $sqlUpdate);
  
              if ($resultUpdate) {
                  echo "<script>alert('Profile updated successfully');</script>";
                  // Update session if username changed
                  if ($newUsername !== $username) {
                      $_SESSION['username'] = $newUsername;
                  }
                  header("Location: main.php");
              } else {
                  echo "<script>alert('Failed to update profile');</script>";
              }
          } else {
              echo "<script>confirm('Current password is incorrect');</script>";
          }
      }
    }
  } else {
      echo "<script>alert('Database connection failed');</script>";
  }
    

    mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile Update</title>
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="styles.css" />
    <style>
      body {
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
        color: #333;
      }
      h5,
      h6 {
        color: #ffe480;
      }
      .card {
        border: none;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      }
      .update-button {
        background-color: #ffe480;
        border-color: #ffe480;
      }
      .personal-details {
        color: #ffe480 !important;
      }
      .btn {
        border-radius: 20px;
        padding: 8px 20px;
      }
      input[type="text"],
      input[type="email"],
      input[type="password"] {
        border-radius: 20px;
      }
      .container {
        display: flex;
        align-items: center;
        justify-content: center;
        min-height: 100vh;
      }

      .edit-picture-button {
        position: absolute;
        bottom: 0;
        right: 0;
        margin: 8px;
        background-color: #ffe480;
        border-color: #ffe480;
      }
      .edit-picture-button:hover {
        position: absolute;
        bottom: 0;
        right: 0;
        margin: 8px;
        background-color: #ffe480;
        border-color: #ffe480;
      }

      .user-avatar {
        position: relative;
      }

      .user-avatar .btn {
        display: none;
      }

      .user-avatar:hover .btn {
        display: block;
      }
    </style>
 <script>
      document.addEventListener("DOMContentLoaded", function () {
        const fileInput = document.getElementById("fileInput");
        const userImage = document.querySelector(".user-image");

        const editPictureButton = document.querySelector(
          ".edit-picture-button"
        );

        editPictureButton.addEventListener("click", function () {
          fileInput.click();
        });

        fileInput.addEventListener("change", function (event) {
          const file = event.target.files[0];
          const reader = new FileReader();

          reader.onload = function (event) {
            userImage.src = event.target.result;
          };

          reader.readAsDataURL(file);
        });
      });
    </script>
  </head>
  <body>
    <form action="settings.php" method="POST" enctype="multipart/form-data">
    <div class="container">
      <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
          <div class="card h-100">
            <div class="card-body">
              <div class="account-settings text-center">
                <div class="user-profile">
                  <div class="user-avatar">
                    <img
                      src="<?php echo"assets/img/$img";?>"
                      alt="Profile Image"
                      class="img-fluid rounded-circle user-image"
                    />
                    <input
                      type="file"
                      id="fileInput"
                      accept="image/*"
                      style="display: none"
                      name="newImage"
                    />
                    <button
                      type="button"
                      class="btn btn-primary edit-picture-button"
                    >
                      Edit Picture
                    </button>
                  </div>
                  <h5 class="user-name mt-3"><?php echo"$name $surname";?></h5>
                  <h6 class="user-email mb-4"><?php echo"$email";?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
          <div class="card h-100">
            <div class="card-body">
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <h6 class="mb-4 text-primary font-weight-bold h3 personal-details">
                    Personal Details
                  </h6>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="fullName">Username</label>
                    <input
                      type="text"
                      class="form-control"
                      id="fullName"
                      value="<?php echo"$username";?>"
                      name="fullname"
                    />
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="eMail">Email</label>
                    <input
                      type="email"
                      class="form-control"
                      id="eMail"
                      value="<?php echo"$email";?>"
                      name="email"
                    />
                  </div>
                </div>
              
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="website">Current Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="website"
                      placeholder="**********"
                      name="currentPassword"
                    />
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <input
                      type="text"
                      class="form-control"
                      id="phone"
                      value="<?php echo"$phoneNumber";?>"
                      name="phone"
                    />
                  </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                    <label for="website">New Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="website"
                      placeholder="**********"
                      name="newPassword"
                    />
                  </div>
                </div>
              
              </div>
              <div class="row gutters">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                  <div class="text-right">
                    <a href="main.php" class="btn btn-secondary">Cancel</a>
                    <input type="submit" class="btn btn-primary update-button" value="Update" name = "update">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
  </body>
</html>
