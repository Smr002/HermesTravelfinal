<?php
$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}

if(isset($_POST['submitDestEdit'])){
    $id = $_POST['destID'];
    $destName = $_POST['dest-name'];
    $description = $_POST['description'];
    $destCountry = $_POST['country'];
    $destPrice = $_POST['destPrice'];
    $destStart = $_POST['startDate'];
    $destEnd = $_POST['endDate'];
    $destType = $_POST['destType'];
    
    if($_FILES["image"]["error"] == 4){
        echo "<script> alert('Image Does Not Exist'); </script>";
    } else{
        $fileName = $_FILES["image"]["name"];
        $fileSize = $_FILES["image"]["size"];
        $tmpName = $_FILES["image"]["tmp_name"];
    
        $validImageExtension = ['jpg', 'jpeg', 'png'];
        $imageExtension = explode('.', $fileName);
        $imageExtension = strtolower(end($imageExtension));
        if (!in_array($imageExtension, $validImageExtension)){
            echo "<script> alert('Invalid Image Extension'); </script>";
        } elseif($fileSize > 1000000){
            echo "<script> alert('Image Size Is Too Large'); </script>";
        } else{
            $newImageName = uniqid();
            $newImageName .= '.' . $imageExtension;

            move_uploaded_file($tmpName, 'assets/img/' . $newImageName);
            // Modify the country details using UPDATE query
            $update_sql = "UPDATE destination SET DestinationName='$destName', DestinationInfo='$description', DestinationImage='$newImageName',DestinationPrice = '$destPrice', StartDate = '$destStart',EndDate = '$destEnd', Type = '$destType' WHERE DestinationID='$id'";
            if(mysqli_query($conn, $update_sql)) {
                echo "<script>window.location.href = 'destinations-admin.php';</script>";
            } else {
                echo "<script>alert('Update Destination failed: " . mysqli_error($conn) . "');</script>";
            }
        }
    }
}

mysqli_close($conn);
?>
