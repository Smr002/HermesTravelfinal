
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinations Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  

    <div class="grid-container">
    <!-- Header -->
    <header class="header"></header>
    <!-- <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div> -->
        <div class="header-right">
            <a href="admin.php">
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
                <a href="countries.php">
                <span class="material-icons-outlined">flag</span>Countries
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="destinations-admin.php">
                <span class="material-icons-outlined">place</span>Destinations
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="tours-admin.php">
                <span class="material-icons-outlined">luggage</span>Tours
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="clients-admin.php">
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
    <form id="destination-form" method="get">
<input type="text" name="country-name"  placeholder="Destination Name">
<label for="country">Choose country</label>
<select name="country">
    <option value="Albania">Albania</option>
    <option value="Spain">Spain</option>
    
</select>
<textarea name="description" placeholder="Description"></textarea>
<input type="file" name="flag" accept="image/png, image/jpeg">
<button type="submit" class="btn btn-primary">Add Destination</button>
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

    $destinations = [
        ["name" => "Vlore", "country" => "Albania", "image" => "vlore1.jpg"],
        ["name" => "Sevilla", "country" => "Spain", "image" => "sevilla1.jpg"]
    ];
    foreach ($destinations as $destination) {
        echo "<div class='card'>";
        echo "<img src='{$destination['image']}' alt='flag' class='card-img'>";
        echo "<div class='card-content'>";
        echo "<h3>{$destination['name']}</h3>";
        echo "<p>Country: {$destination['country']}</p>";
        echo "<div class='card-actions'>";
        echo "<button class='material-icons-outlined' id='edit-destination'>edit</button>";
        echo "<button class='material-icons-outlined' id='delete-destination'>delete</button>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }

    ?>
    </div>
  

    </main>
   

   

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>