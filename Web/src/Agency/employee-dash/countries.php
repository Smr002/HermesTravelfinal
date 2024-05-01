
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Dashboard</title>
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
            <h2>Countries</h2>
            
        </div>
        <div class="main-bar">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search...">
                <button class="btn btn-search">Search</button>
            </div>
            <button class="btn btn-primary" id="add-country-btn">Add Country</button>
        </div>
        <!-- hidden till add-country-btn is clicked -->
<div class="add-form" id="add-country-form">
    <h3>Add Country</h3>
    <form id="country-form" method="get">
<input type="text" name="country-name"  placeholder="Country Name">
<label for="continent">Choose continent</label>
<select name="continent">
    <option value="Africa">Africa</option>
    <option value="Asia">Asia</option>
    <option value="Europe">Europe</option>
    <option value="North America">North America</option>
    <option value="South America">South America</option>
    <option value="Oceania">Oceania</option>
</select>
<textarea name="description" placeholder="Description"></textarea>
<input type="file" name="flag" accept="image/png, image/jpeg">
<button type="submit" class="btn btn-primary">Add Country</button>
<button type="button" class="btn btn-secondary" id="cancel-country-btn">Cancel</button>
    </form>
    </div>
    <div class="main-content">  
        <!-- create a card for each country -->
        <div class="card">
            <img src="albania1.jpg" alt="flag" class="card-img">
            <div class="card-content">
                <h3>Albania</h3>
                <p>Continent: Europe</p>
                <div class="card-actions">
                    <button class="material-icons-outlined" id="edit-country">edit</button>
                    <button class="material-icons-outlined" id="delete-country">delete</button>
                </div>
            </div>
        </div>
        
        <div class="card">
            <img src="spain1.jpg" alt="flag" class="card-img">
            <div class="card-content">
                <h3>Spain</h3>
                <p>Continent: Europe</p>
                <div class="card-actions">
                    <button class="material-icons-outlined" id="edit-country">edit</button>
                    <button class="material-icons-outlined" id="delete-country">delete</button>
                </div>
            </div>
        </div>
    </div>
    </main>
    

  

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>