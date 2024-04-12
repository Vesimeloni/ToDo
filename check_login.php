<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

//Preventing direct access
if(!empty($_POST["username"]) && !empty($_POST["password"]))  {
    // Include database connection file
    include("dbconnect.php");

    //Selecting the username
    $username = $_POST["username"];
    $statement = "SELECT * FROM users WHERE username=?";
    $stmt = $dbcon->prepare($statement);
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();

    //Finding the password
    if($result->num_rows>=1)  {

        $row = $result->fetch_assoc();
        $hash = $row["password"];

        //compare input password to the one in database
        if(password_verify($_POST["password"], $hash))  {
            $_SESSION["username"] = $_POST["username"];
            $_SESSION["user_id"] = $row["user_id"]; // Set user_id session variable
            $dbcon->close();
            header("Location:home.php");
            exit;
        } else {
             $error = "Incorrect password";
            }
    } else {
            $error = "User not found";
        }
        
     $dbcon->close();
        
        
} else {
        $error = "Username or password cannot be empty";
}

// Debugging: Output session contents
var_dump($_SESSION);

// Redirect back to login page with error message
header("Location: login.php?error=" . urlencode($error));
exit;

?>