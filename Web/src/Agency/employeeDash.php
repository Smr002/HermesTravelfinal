<!DOCTYPE html>
<html lang="en">
    
<?php


include_once "Logout.php"; 

if(isset($_POST['logoutButton'])) {
    logout(); 
}


?>

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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="css/styles.css" rel="stylesheet" />
    <style>
        #dropdown {
            position: relative;
            display: inline-block;
       
            
        }

        #dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
            
        }

        #dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            
        }

        #dropdown-content a:hover {
            background-color: #f1f1f1;
        }

        #dropdown:hover #dropdown-content {
            display: block;
            
        }

        .card {
            width: 400px;
            border: none;
            border-radius: 10px;
            background-color: #fff;
        }

        .stats {
            background: #f2f5f8 !important;
            color: #000 !important;
        }

        .articles {
            font-size: 10px;
            color: #a1aab9;
        }

        .number1 {
            font-weight: 500;
        }

        .followers {
            font-size: 10px;
            color: #a1aab9;
        }

        .number2 {
            font-weight: 500;
        }

        .rating {
            font-size: 10px;
            color: #a1aab9;
        }

        .number3 {
            font-weight: 500;
        }

        #pe {
            height: 1.9rem;
            margin-right: 1rem;
        }
        
    </style>
    <script>
        function goSettings() {
            window.location.href = "settings.php";
        }
    </script>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard-styles.css">
</head>
<body>
<?php
session_start();?>
<?php
                              $conn = mysqli_connect("localhost", "root", "", "agencydb");
    
                              if($conn){
                          
                                $username = $_SESSION['username'];
                                $sql = "SELECT ProfileImage FROM Client WHERE Username = '$username' ";
                                $result = mysqli_query($conn, $sql);
                          
                          
                            
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $img = $row['ProfileImage'];
                                }
                          
                            }
                          
                          
                              }else{
                                echo "<script>alert('Please try again')</script>";
                              }
                              mysqli_close($conn);
                            ?>
<div class="grid-container">
    <!-- Header -->
    <header class="header">
        
            <div class="menu-icon" onclick="openSidebar()"> 

                <span class="material-icons-outlined"">menu</span>MENU
        </div>
        <<div class="header-right">
            < <li class="nav-item" id="dropdown">
                        <a class="nav-link" href="#">
                            <!-- insert img pfp-->
                            
                            <img src="<?php echo" assets/img/$img";?>" id="pe" alt="..." />
                            <div id="dropdown-content" style="right:0">
                                <div class="container mt-5 d-flex justify-content-center">
                                    <div class="card p-3">
                                        <div class="d-flex align-items-center">
                                            <div class="image">
                                                <img src="<?php echo" assets/img/$img";?>" class="rounded" width="30">
                                            </div>
                                            <div class="ml-3 w-100">
                                                <h4 class="mb-0 mt-0"><?php echo "{$_SESSION['ClientName']}"." "."{$_SESSION['ClientSurname']}";?></h4>
                                                <span>Status:<?php echo "{$_SESSION['Type']}";?></span>
                                                <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                                    
                                                    <div class="d-flex flex-column">
                                                        <span class="followers">Spending</span>
                                                        <span class="number2">SELECT </span>
                                                    </div>
                                                    
                                                </div>
                                                <div class="button mt-2 d-flex flex-row align-items-center">
                                                    <button class="btn btn-sm btn-outline-primary w-100" onclick="goSettings()">Profile</button>
                                                    <form method="post">
                                                    <input type="submit" class="btn btn-sm btn-primary w-100 ml-2" name="logoutButton" value="Logout">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                            </div>
                        </a>
                     </li>
        </div>
    </header>
    <!-- End Header -->

    <!-- Sidebar -->
    <?php include_once "employeeHeader.php";?> <!-- Show only when window is large or menu icon in header is clicked when window is small -->
    <!-- End Sidebar -->

    <main class="main-container">
        <?php
        include_once 'employeeDashboard.php';
        ?>
    </main>
</div>

<script src="js/scripts.js"></script>
</body>
</html>
