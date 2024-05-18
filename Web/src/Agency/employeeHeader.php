<?php


include_once "Logout.php";

if (isset($_POST['logout'])) {
    logout();
}


?>


<link rel="stylesheet" href="css/dashboard-styles.css">

<aside id="sidebar">
    <div class="menu-icon">
        <span class="material-icons-outlined" onclick="closeSidebar()">close</span>Close
    </div>
    <ul class="sidebar-list">
        <li class="sidebar-list-item">
        <a href="employeeDash.php">
                <span class="material-icons-outlined">dashboard</span>Dashboard
            </a>
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
        <li class="sidebar-list-item">
            <a href="saleEmployee.php">
                <span class="material-icons-outlined">monetization_on</span>Sales
            </a>
        </li>
        <li class="sidebar-list-item">
            <form method="post">
                <input type=submit value="Logout" name="logout" class="btn btn-secondary">
            </form>
        </li>

    </ul>
</aside>
<script src="js/scripts.js"></script>