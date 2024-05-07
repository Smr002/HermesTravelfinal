
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/styles1.css">
</head>
<body>
  

    <div class="grid-container">
    <!-- Header -->
    <header class="header"></header>
    <!-- <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div> -->
        <div class="header-right">
            <a href="employeeDash.php">
        <span class="material-icons-outlined">home</span>
        </a>
        <span class="material-icons-outlined">logout</span>

    </div>
    <!-- End Header -->

    <!-- Sidebar -->
    <aside id="sidebar">
        <div class="sidebar-title">
            <div class="sidebar-brand">
                <span class="material-icons-outlined">menu</span>MENU
            </div>
        </div>
        <ul class="sidebar-list">
            <li class="sidebar-list-item">
                <span class="material-icons-outlined">dashboard</span>Dashboard
            </li>
            <li class="sidebar-list-item">
                <a href="countriesEmployee.php">
                <span class="material-icons-outlined">flag</span>Countries
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="destinationsEmployee.php">
                <span class="material-icons-outlined">place</span>Destinations
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="clientEmployee.php">
                <span class="material-icons-outlined">people</span>Clients
                </a>
            </li>
        </ul>
    </aside>
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
<label for="type">Choose country</label>
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
       
        <!-- <div class="card">
            <img src="vlore1.jpg" alt="flag" class="card-img">
            <div class="card-content">
                <h3>Vlore</h3>
                <p>Country: Albania</p>
                <div class="card-actions">
                    <button class="material-icons-outlined" id="edit-destination">edit</button>
                    <button class="material-icons-outlined" id="delete-destination">delete</button>
                </div>
            </div>
        </div>
        
        <div class="card">
            <img src="sevilla1.jpg" alt="flag" class="card-img">
            <div class="card-content">
                <h3>Sevilla</h3>
                <p>Country: Spain</p>
                <div class="card-actions">
                    <button class="material-icons-outlined" id="edit-destination">edit</button>
                    <button class="material-icons-outlined" id="delete-destination">delete</button>
                </div>
            </div>
        
        </div> -->
        <?php

    include_once 'showDest.php';

    ?>
    </div>
  
    </main>

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>