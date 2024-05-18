<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles1.css">
    <style>
        #add-country-form {
            display: none;
        }
        .card-img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="grid-container">
        <!-- Header -->
        <header class="header">
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
            <div class="main-title">
                <h2>Countries</h2>
            </div>
            <div class="main-bar">
                <div class="search-container">
                    <input type="text" class="search-bar" id="search-bar" placeholder="Search...">
                    <button class="btn btn-search" id="search-btn">Search</button>
                </div>
                <button class="btn btn-primary" id="add-country-btn">Add Country</button>
            </div>
            <!-- hidden till add-country-btn is clicked -->
            <div class="add-form" id="add-country-form">
                <h3>Add Country</h3>
                <form action='addCountry.php' id="country-form" method="post" enctype="multipart/form-data">
                    <input type="text" name="country-name" placeholder="Country Name">
                    <textarea name="description" placeholder="Description"></textarea>
                    <input type="file" name="image" accept=".jpg, .jpeg, .png">
                    <input type="submit" class="btn btn-primary" name="submitCountry">
                    <button type="button" class="btn btn-secondary" id="cancel-country-btn">Cancel</button>
                </form>
            </div>
            <!-- Display search results -->
            <div id="search-results"></div>
        </main>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            function loadAllCountries() {
                $.ajax({
                    url: "showCountry.php",
                    type: "POST",
                    success: function(response){
                        $("#search-results").html(response);
                    }
                });
            }

            $("#search-btn").click(function() {
                var searchQuery = $("#search-bar").val();
                $.ajax({
                    url: "showCountry.php",
                    type: "POST",
                    data: {search: searchQuery},
                    success: function(response){
                        $("#search-results").html(response);
                    }
                });
            });

            if ($("#search-bar").val() === "") {
                loadAllCountries();
            }

            $('#add-country-btn').click(function() {
                $('#add-country-form').show();
            });

            $('#cancel-country-btn').click(function() {
                $('#add-country-form').hide();
            });
        });

        function openSidebar() {
  if (!sidebarOpen) {
    sidebar.classList.add("sidebar-responsive");
    sidebarOpen = true;
  }
}

    </script>
</body>
</html>
