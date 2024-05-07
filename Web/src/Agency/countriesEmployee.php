
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Dashboard</title>
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
                <span class="material-icons-outlined">image</span>Countries
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
<div class="add-form" id="add-country-form" >
    <h3>Add Country</h3>
    <form action='addCountry.php'id="country-form" method="post" enctype="multipart/form-data">
<input type="text" name="country-name"  placeholder="Country Name">
<textarea name="description" placeholder="Description"></textarea>
<input type="file" name="image"accept=".jpg, .jpeg, .png">
<input type="submit" class="btn btn-primary" name="submitCountry">
<button type="button" class="btn btn-secondary" id="cancel-country-btn">Cancel</button>

    </form>
    </div>
   <?php include_once "showCountry.php";?>
    </div>
    </main>
    

  

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>