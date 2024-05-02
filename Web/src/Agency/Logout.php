<?php
function logout() {
    // Start the session
    session_start();

    // Unset all session variables
    $_SESSION = array();
    session_unset();

    // Destroy the session
    session_destroy();

    // Redirect to the login page or any other page as needed
    header("Location: main.php");
    exit;
}
?>
