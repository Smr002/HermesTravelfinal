    
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
    <!-- <div class="menu-icon" onclick="openSidebar()">
        <span class="material-icons-outlined">menu</span>
    </div> -->
    <div class="menu-icon" onclick="openSidebar()"> 

                <span class="material-icons-outlined">menu</span>MENU
    </div>
        <div class="header-right">
            <a href="employeeDash.php" class="home-link" title="go back to dashboard">
        <span class="material-icons-outlined">home</span>
        </a>
        <span class="material-icons-outlined">logout</span>

    </div>
    </header>
    <!-- End Header -->

    <?php include "employeeHeader.php";?>
    <!-- End Sidebar -->
    <!-- Main Content -->
    <main class="main-container">
        <?php
        

        
        include_once "viewUsers.php";
        ?>
    </main>
    

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>