<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if($conn){
    if(isset($_POST['submitDestination'])){
        $destName = $_POST['dest-name'];
        $destInfo = $_POST['dest-info'];
        $destCountry = $_POST['country'];
        $destPrice = $_POST['dest-price'];
        $destStart = $_POST['start-date'];
        $destEnd = $_POST['end-date'];
        $destType = $_POST['type'];
    
        if($_FILES["dest-flag"]["error"] == 4){
            echo
            "<script> alert('dest-flag Does Not Exist'); </script>"
            ;
          }
          else{
            $fileName = $_FILES["dest-flag"]["name"];
            $fileSize = $_FILES["dest-flag"]["size"];
            $tmpName = $_FILES["dest-flag"]["tmp_name"];
        
            $validImageExtension = ['jpg', 'jpeg', 'png'];
            $ImageExtension = explode('.', $fileName);
            $ImageExtension = strtolower(end($ImageExtension));
            if ( !in_array($ImageExtension, $validImageExtension) ){
              echo
              "
              <script>
                alert('Invalid dest-flag Extension');
              </script>
              ";
            }
            else if($fileSize > 1000000){
              echo
              "
              <script>
                alert('dest-flag Size Is Too Large');
              </script>
              ";
            }
            else{
              $newImageName = uniqid();
              $newImageName .= '.' . $ImageExtension;
        
              move_uploaded_file($tmpName, 'assets/img/' . $newImageName);
              $insert_sql = "INSERT INTO destination (DestinationName, DestinationInfo, DestinationImage, DestinationPrice,StartDate,EndDate,Type ,Revenue,CountryID) VALUES ('$destName', '$destInfo', '$newImageName',$destPrice,'$destStart','$destEnd','$destType' ,0,'$destCountry')";
              if(mysqli_query($conn, $insert_sql)) {
                echo "<script>window.location.href = 'destinations-admin.php';</script>";
              } else {
                  echo "<script>alert('Add Destination failed: " . mysqli_error($conn) . "');</script>";
              }
         
    
            }
        }
    }
    
    mysqli_close($conn);
    
}
?>