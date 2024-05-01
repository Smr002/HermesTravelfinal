<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
}
else {
    $getData = "SELECT * FROM country";
    $result = mysqli_query($conn, $getData);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $countryId = $row['CountryID'];
            $countryName = $row['CountryName'];
            $info = $row['CountryInfo']; 
            $imagePath = 'assets/img/' . $row['CountryImage']; 

            echo "
            <div class='main-content'>  
                <div class='card'>
                    <img src='$imagePath' alt='$countryName' class='card-img'>
                    <div class='card-content'>
                        <h3>$countryName</h3>
                        <p>Description: $info</p>
                        <div class='card-actions'>
                        <form action='edit_country_form.php' method='post'>
                        <input type='hidden' name='country_id' value='$countryId'>
                        <button type='submit' class='material-icons-outlined' id='edit-country' onclick='return confirmEdit()'>edit</button>
                        </form>
                            <form action='delete_country.php' method='post'>
                                <input type='hidden' name='country_id' value='$countryId'>
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

<script>
    function confirmEdit(){
        return confirm("Are you sure you want to edit this country?");
    }

    function confirmDelete() {
        return confirm("Are you sure you want to delete this country?");
    }
</script>
