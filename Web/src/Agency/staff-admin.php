
    
    
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
            <li class="sidebar-list-item">
                <a href="sales.php">
                <span class="material-icons-outlined">monetization_on</span>Sales
                </a>
            </li>
            <li class="sidebar-list-item">
                <a href="staff-admin.php">
                <span class="material-icons-outlined">manage_accounts</span>Staff
                </a>
        </ul>
    </aside>
    <!-- End Sidebar -->
    <!-- Main Content -->
    <main class="main-container">
     <button class="btn btn-primary" id="add-staff-btn">Add Staff </button>
    <div class="add-country-form" id="add-staff-form">
        <form id="staff-form" method="get">
          <input type="text" name="staff-name" id="staff-name" placeholder="staff Name">
          <input type="text" name="staff-email" id="staff-email" placeholder="staff Email">
            <input type="text" name="staff-phone" id="staff-phone" placeholder="staff Phone">
            <input type="text" name="staff-role" id="staff-role" placeholder="staff Role">
            <input type="text" name="staff-username" id="staff-username" placeholder="staff Username">
            <input type="text" name="staff-password" id="staff-password" placeholder="staff Password">
            <input type="number" name="staff-salary" id="staff-salary" placeholder="staff Salary">
            <input type="submit" value="Add Staff" class="btn btn-primary">
            <input type="button" id="cancel-staff-btn" value="Cancel" class="btn btn-primary">

        </form>
    </div>    
    <?php
    echo "</br>Ketu printon stafin</br>";
    
   
    // if(isset($_GET['staff-name'])){
    //     $staff_name = $_GET['staff-name'];
    //     $staff_email = $_GET['staff-email'];
    //     $staff_phone = $_GET['staff-phone'];
    //     $staff_role = $_GET['staff-role'];
    //     $staff_username = $_GET['staff-username'];
    //     $staff_password = $_GET['staff-password'];
    //     $staff_salary = $_GET['staff-salary'];
    //     echo "<div class='staff-item'>";
    //     echo "<p>$staff_name</p>";
    //     echo "<p>$staff_email</p>";
    //     echo "<p>$staff_phone</p>";
    //     echo "<p>$staff_role</p>";
    //     echo "<p>$staff_username</p>";
    //     echo "<p>$staff_password</p>";
    //     echo "<p>$staff_salary</p>";
        echo "<button class='btn btn-primary'>Edit</button>";
        echo "<button class='btn btn-primary'>Delete</button>";
        echo "</div>";
    //}
    
?>

    </main>
    <script src="js/scripts.js"></script>
</body>
</html>