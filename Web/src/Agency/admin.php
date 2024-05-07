
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard-styles.css">
</head>
<body>
  

    <div class="grid-container">
    <!-- Header -->
    <header class="header"></header>
    <!-- <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div> -->
        <div class="header-right">
        <a href="main.php" class="home-link" title="Go to main page">
    <span class="material-icons-outlined">home</span>
</a>
<!-- <span class="material-icons-outlined">logout</span> -->



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
                <a href="clients-admin.php">
                <span class="material-icons-outlined">people</span>Clients
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="sales.php">
                <span class="material-icons-outlined">monetization_on</span>Sales
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="staff-admin.php">
                <span class="material-icons-outlined">manage_accounts</span>Staff
                </a>
            </li>
        </ul>
    </aside>
    <!-- End Sidebar -->
  
    <main class="main-container">
    <?php
    include_once 'admin-dashboard.php';
    ?>
</main>

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>