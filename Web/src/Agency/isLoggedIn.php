<?php
       session_start();

       // Check if the user is logged in
       if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
           // Redirect to h2.php if the session is active
           
          
           include_once "h2.php";
           
       }else{
        include_once "header.php";
        
       }
?>