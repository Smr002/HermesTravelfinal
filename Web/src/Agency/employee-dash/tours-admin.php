
    
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Country Dashboard</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
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
        </ul>
    </aside>
    <!-- End Sidebar -->
    <!-- Main Content -->
    <main class="main-container">
        <div class="main-title">
            <h2>Tours</h2>
            
        </div>
        <div class="main-bar">
            <div class="search-container">
                <input type="text" class="search-bar" placeholder="Search...">
                <button class="btn btn-search">Search a tour</button>
            </div>
            <button class="btn btn-primary" id="add-tour-btn">Add Tour</button>
        </div>
    
<div class="add-form" id="add-tour-form" >
    <h3>Add Tour</h3>
    <form id="tour-form" method="get" class="add-tour-form">
        <h3>Add Tour</h3>
        <div class="form-group">
            <label for="country">Select Country</label>
            <select name="country" id="country">
                <option value="">Select Country</option>
                <option value="Albania">Albania</option>
                <option value="Spain">Spain</option>
               
            </select>
        </div>
    
        <div class="form-group" id="city-group" style="display: none;">
            <label for="city">Select City</label>
            <select name="city" id="city">
                <option value="Tirana">Tirana</option>
                <option value="Sevilla">Sevilla</option>
            </select>
        </div>
    
        <div class="form-group">
            <label for="start-date">Start Date</label>
            <input type="date" id="start-date" name="start-date">
        </div>
    
        <div class="form-group">
            <label for="end-date">End Date</label>
            <input type="date" id="end-date" name="end-date">
        </div>
    
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" id="price" name="price" placeholder="Price">
        </div>
    
        <div class="form-group">
            <label for="tour-type">Tour Type</label>
            <select id="tour-type" name="tour-type">
                <option value="">Select Tour Type</option>
                <option value="Type 1">Type 1</option>
                <option value="Type 2">Type 2</option>
                <option value="Type 3">Type 3</option>
                <option value="Other">Other</option>
            </select>
        </div>
    
        <div class="form-group" id="other-type-group" style="display: none;">
            <label for="other-type">Other Tour Type</label>
            <input type="text" id="other-type" name="other-type" placeholder="Enter Other Tour Type">
        </div>
    
        <div class="form-group">
            <label for="details">Details</label>
            <textarea id="details" name="details" placeholder="Enter tour details"></textarea>
        </div>
    
        <div class="form-group">
            <label for="image">Upload Image</label>
            <input type="file" id="image" name="image" accept="image/png, image/jpeg">
        </div>
    
        <button type="submit" class="btn btn-primary">Add Tour</button>
        <button type="button" class="btn btn-secondary" id="cancel-tour-btn">Cancel</button>
    </form>
    
    
    </div>
    <div class="main-content">  
        
        <div class="card">
            <img src="albania1.jpg" alt="flag" class="card-img">
            <div class="card-content">
                <h3>tour 0</h3>
                <p>City:tr</p>
                <div class="card-actions">
                    <button class="material-icons-outlined" id="edit-country">edit</button>
                    <button class="material-icons-outlined" id="delete-country">delete</button>
                </div>
            </div>
        </div>
        
        <div class="card">
            <img src="spain1.jpg" alt="flag" class="card-img">
            <div class="card-content">
                <h3>Test Tour1</h3>
                <p>city:sevilla</p>
                <div class="card-actions">
                    <button class="material-icons-outlined" id="edit-country">edit</button>
                    <button class="material-icons-outlined" id="delete-country">delete</button>
                </div>
            </div>
        </div>
    </div>
    </main>
    

  

    
    </div>
    <script src="js/scripts.js"></script>
</body>
</html>