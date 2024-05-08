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
    <header class="header">
        
            <div class="menu-icon" onclick="openSidebar()"> 

                <span class="material-icons-outlined"">menu</span>MENU
        </div>
        <div class="header-right">
            <a href="main.php" class="home-link" title="Go to main page">
                <span class="material-icons-outlined">home</span>
            </a>
            <!-- <span class="material-icons-outlined">logout</span> -->
        </div>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <?php include_once "adminHeader.php";?> <!-- Show only when window is large or menu icon in header is clicked when window is small -->
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
