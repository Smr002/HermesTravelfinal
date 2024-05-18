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
            <a href="admin.php">
                <span class="material-icons-outlined">dashboard</span>Dashboard
            </a>
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
        <li class="sidebar-list-item">
            <form method="post">
                <input type=submit value="Logout" name="logout" class="btn btn-secondary">
            </form>
        </li>
    </ul>
</aside>
<script src="js/scripts.js"></script>