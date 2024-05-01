<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}

if(isset($_POST['submitCountry'])){
    $countryName = mysqli_real_escape_string($conn, $_POST['country-name']);
    $countryInfo = mysqli_real_escape_string($conn, $_POST['description']);

    if($_FILES["image"]["error"] == 4){
        echo
        "<script> alert('Image Does Not Exist'); </script>"
        ;
      }
      else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if ( !in_array($imageExtension, $validImageExtension) ){
          echo
          "
          <script>
            alert('Invalid Image Extension');
          </script>
          ";
        }
        else if($fileSize > 1000000){
          echo
          "
          <script>
            alert('Image Size Is Too Large');
          </script>
          ";
        }
        else{
          $newImageName = uniqid();
          $newImageName .= '.' . $imageExtension;
    
          move_uploaded_file($tmpName, 'assets/img/' . $newImageName);
          $insert_sql = "INSERT INTO country (CountryName, CountryInfo, CountryImage) VALUES ('$countryName', '$countryInfo', '$newImageName')";
          if(mysqli_query($conn, $insert_sql)) {
            echo "<script>window.location.href = 'countries.php';</script>";
          } else {
              echo "<script>alert('Add Country failed: " . mysqli_error($conn) . "');</script>";
          }
     

        }
    }
}

mysqli_close($conn);

?>