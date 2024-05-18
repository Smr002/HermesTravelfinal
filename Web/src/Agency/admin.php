<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Admin Dashboard</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link rel="stylesheet" href="css/styles1.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard-styles.css">
</head>

<body>
    <?php
    session_start(); ?>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "agencydb");

    if ($conn) {

        $username = $_SESSION['username'];
        $sql = "SELECT ProfileImage FROM Client WHERE Username = '$username' ";
        $result = mysqli_query($conn, $sql);



        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $img = $row['ProfileImage'];
            }
        }
    } else {
        echo "<script>alert('Please try again')</script>";
    }
    mysqli_close($conn);
    ?>
    <div class="grid-container">
        <!-- Header -->
        <header class="header">

            <div class="menu-icon" onclick="openSidebar()">

                <span class="material-icons-outlined">menu</span>MENU
            </div>
            
        
        </header>
        <!-- End Header -->

        <!-- Sidebar -->
        <?php include_once "adminHeader.php"; ?> <!-- Show only when window is large or menu icon in header is clicked when window is small -->
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