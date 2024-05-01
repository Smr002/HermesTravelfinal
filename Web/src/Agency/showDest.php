<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
else {
    $getData = "SELECT * FROM destination";
    $result = mysqli_query($conn, $getData);

   
    if (mysqli_num_rows($result) > 0) {
     
        while ($row = mysqli_fetch_assoc($result)) {
          
            $countryName = $row['DestinationName'];
            $info = $row['DestinationInfo']; 
            $imagePath = 'assets/img/' . $row['DestinationImage'];
            $price = $row['DestinationPrice'];
            $type = $row['Type'];
            $start = $row['StartDate'];
            $end = $row['EndDate'];
            $destID = $row['DestinationID'];

            echo "
            <div class='main-content'>  
                <div class='card'>
                    <img src='$imagePath' alt='$countryName' class='card-img'>
                    <div class='card-content'>
                        <h3>$countryName</h3>
                        <p>Description: $info</p>
                        <p>Price: $price</p>
                        <p>Type: $type</p>
                        <p>Start Date: $start</p>
                        <p>End Date: $end</p>
                        <div class='card-actions'>
                            
                            <form action='editDestForm.php' method='post'>
                        <input type='hidden' name='DestinationID' value='$destID'>
                        <button type='submit' class='material-icons-outlined' id='edit-country' onclick='return confirmEdit()'>edit</button>
                        </form>
                       
                            <form action='deleteDest.php' method='post'>
                                <input type='hidden' name='DestinationID' value='$destID'>
                                <button type='submit' class='material-icons-outlined' id='delete-country' onclick='return confirmDelete()'>delete</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>";
        }
    } else {
        echo "No countries found.";
    }

  
    mysqli_free_result($result);

  
    mysqli_close($conn);
}

?>
