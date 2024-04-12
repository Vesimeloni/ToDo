<?php

session_start();

if(isset($_SESSION["username"]) && isset($_GET["task_id"])) {

 // Include database connection file
 include("dbconnect.php");

 $task_id = $_GET["task_id"];
 $statement = "DELETE FROM tasks WHERE task_id = ?";

 $stmt = $dbcon->prepare($statement);
 $stmt->bind_param("i", $task_id);
 $stmt->execute();
 $stmt->close();

 header("Location: home.php");

} else {
    header("Location: home.php");
}


?>