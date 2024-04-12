<?php

session_start();

if(isset($_POST["task"]) && $_POST["task"] != "" && isset($_SESSION["username"])) {

// Include database connection file
include("../dbconnect.php");

// Debug: Inspect session variables
var_dump($_SESSION);

$username = $_SESSION["username"];
$user_id = $_SESSION["user_id"];
$task = $_POST["task"];



// Insert task into tasks table with user_id
$stmt = $dbcon->prepare("INSERT INTO tasks (user_id, title) VALUES (?, ?)");
$stmt->bind_param("is", $user_id, $task);

// Execute query and handle errors
if($stmt->execute()) {
    // Query executed successfully
    $stmt->close();

    // Redirect back to home.php after adding the task
    header("Location:../home.php");
    exit;
} else {
    // Query execution failed
    $error = "Task insertion failed: " . $dbcon->error;
}
} else {
// Handle incomplete form or unauthorized access
$error = "Incomplete form or unauthorized access";
}

// Debug: Output error message
echo "Error: $error";

header("Location:../home.php?error=" . urlencode($error));
exit;
?>