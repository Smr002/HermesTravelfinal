<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles1.css">
    <style>
        /* Add this CSS to hide the form initially */
        #add-destination-form {
            display: none;
        }
    </style>
</head>
<body>
  

    <div class="grid-container">
    <!-- Header -->
    <header class="header">
    <!-- <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div> -->
    <div class="menu-icon" onclick="openSidebar()"> 

                <span class="material-icons-outlined">menu</span>MENU
    </div>
        
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <?php include_once "adminHeader.php";?>
    <!-- End Sidebar -->
    <!-- Main Content -->
    <main class="main-container">
        <div class="main-title">
            <h2>Destinations</h2>
            
        </div>
        <div class="main-bar">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search...">
                <button class="btn btn-search">Search</button>
            </div>
            <button class="btn btn-primary" id="add-destination-btn">Add Destination</button>
        </div>
        
<div class="add-form" id="add-destination-form">
    <h3>Add Destination</h3>
    <form action = "addDestination.php" id="destination-form" method="post" enctype="multipart/form-data">
<input type="text" name="dest-name"  placeholder="Destination Name">
<label for="country">Choose country</label>
<select name="country">
    <?php
        $conn = mysqli_connect("localhost", "root", "", "agencydb");

        if (!$conn) {
            die("Connection Failed : " . mysqli_connect_error());
        } else {
            $getData = "SELECT * FROM country";
            $result = mysqli_query($conn, $getData);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $countryId = $row['CountryID'];
                    $countryName = $row['CountryName'];
                    echo "<option value='$countryId'>$countryName</option>";
                }
            }
            mysqli_free_result($result);
            mysqli_close($conn);
        }
    ?>
</select>

<label>Price:</label><br>
<input type="number" name="dest-price" placeholder="Price" min="0"><br><br>
<label>Start Date:</label>
<input type="date" name="start-date"/>
<label>End Date:</label>
<input type="date" name="end-date"/><br><br>
<label for="type">Choose type</label>
<select name="type">
    <option value = "Adventure">Adventure</option>
    <option value = "Relaxation">Relaxation</option>
    <option value = "Historical">Historical</option>
    <option value = "Cultural">Cultural</option>
    <option value = "Other">Other</option>
</select>

<textarea name="dest-info" placeholder="Description"></textarea>
<input type="file" name="dest-flag" accept="image/png, image/jpeg">
<input type="submit" class="btn btn-primary" name="submitDestination">
<button type="button" class="btn btn-secondary" id="cancel-country-btn">Cancel</button>

    </form>
    </div>
    <div class="main-content">  
       
        <?php

    include_once 'showDest.php';

    ?>
    </div>
  
    </main>

    
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
    $(".btn-search").click(function() {
        var searchQuery = $(".search-bar").val(); // Changed selector to class
        console.log("Search Query:", searchQuery); // Add this line for debugging
        $.ajax({
            url: "showDest.php",
            type: "POST",
            data: {search: searchQuery},
            success: function(response){
                // Update the appropriate element with the search results
                $(".main-content").html(response);
            },
            error: function(xhr, status, error) {
                console.error("Error:", error);
            }
        });
    });
});


        function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

    </script>
    <script>
         document.addEventListener('DOMContentLoaded', function() {
    console.log('DOM Content Loaded');
    
    document.getElementById('add-destination-btn').addEventListener('click', function() {
        console.log('Add Destination button clicked');
        document.getElementById('add-destination-form').style.display = 'block'; // Show the form
    });

    document.getElementById('cancel-country-btn').addEventListener('click', function() {
        console.log('Cancel button clicked');
        document.getElementById('add-destination-form').style.display = 'none'; // Hide the form
    });
});

</script>
</body>
</html>