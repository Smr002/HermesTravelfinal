
    
    
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
       <?php
            include_once "viewSales.php";
       ?>
            
    
  
    <script src="js/scripts.js"></script>
</body>
</html>