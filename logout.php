<?php
// Start or resume the session
session_start();

if(isset($_SESSION["username"])) {

        // Unset all session variables
        $_SESSION = array();

        // Destroy the session
        session_destroy();

        // Redirect the user to a login page or any other appropriate page
        header("Location: login.php");
        exit; // Ensure script execution stops after redirection

}


?>