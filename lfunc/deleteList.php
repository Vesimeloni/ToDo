<?php

// Include database connection file
 include("dbconnect.php");

 // delete task
if (isset($_GET['del_list'])) {
    $list_id = $_GET['del_list'];


    // Delete list based on list_id
    $statement = "DELETE FROM task_lists WHERE list_id=?";
    $stmt = $dbcon->prepare($statement);
    $stmt->bind_param("s", $list_id);
    $stmt->execute();

    // Redirect back to the same page after deletion
    header("Location: home.php");
    exit;

}
?>