<?php

$conn = mysqli_connect("localhost", "root", "", "agencydb");

if (!$conn) {
    die("Connection Failed : " . mysqli_connect_error());
} else {
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
                <div class='card'> <!-- Removed 'onclick' attribute -->
                    <img src='$imagePath' alt='$countryName' class='card-img' title='Click for more info'>
                    <div class='card-content'>
                        <h3>$countryName</h3>
                       
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
            echo "
            <div class='modal fade' id='exampleModal_$destID' tabindex='-1' role='dialog' aria-labelledby='exampleModalLabel_$destID' aria-hidden='true'>
                <div class='modal-dialog modal-dialog-centered modal-sm' role='document'> <!-- Added modal-sm class to make it smaller -->
                    <div class='modal-content' style='background-color: #9FA8F5; max-width: 30%; margin:0 auto;'> <!-- Added background color style -->
                        <div class='modal-header'>
                            <h5 class='modal-title' id='exampleModalLabel_$destID'>$countryName</h5>
                            <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                            </button>
                        </div>
                        <div class='modal-body'>
                            <img src='$imagePath' alt='$countryName' style='max-width: 60%; height: auto; margin: 0 auto;'> <!-- Adjusted image size and centered -->
                            <p style='margin-top: 10px;'><strong>Description:</strong> $info</p>
                            <p><strong>Price:</strong> $price</p>
                            <p><strong>Type:</strong> $type</p>
                            <p><strong>Start Date:</strong> $start</p>
                            <p><strong>End Date:</strong> $end</p>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>
                          
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function confirmEdit(){
        return confirm("Are you sure you want to edit this country?");
    }

    function confirmDelete() {
        return confirm("Are you sure you want to delete this country?");
    }

    // Open modal when card is clicked
    $(document).ready(function(){
        $('.card img').click(function(){
            // Get the ID of the clicked destination
            var destID = $(this).closest('.card').find('input[name=DestinationID]').val();
            $('#exampleModal_'+destID).modal('show'); // Show the corresponding modal
        });
    });
</script>