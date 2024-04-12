<?php
// Include database connection file
 include("dbconnect.php");
 


// Prepare and execute the SQL statement
$statement = "SELECT * FROM task_lists";
$stmt = $dbcon->prepare($statement);
$stmt->execute();
$result = $stmt->get_result();


 while($row = $result->fetch_assoc()) {

    echo "<div class='d-flex flex-column'>";

    echo "<div >";
    echo "<label style='width: 150px;'  class='m-2' for='list_" . $row["list_id"] . "'>" . $row["name"] . "</label>";
 
    
    $delete_list = "home.php?del_list=" . $row["list_id"];
    echo "<span><a class='mx-2 btn btn-sm' class='m-2' href='$delete_list'>X</a></span>";
    echo "</div>";

    
 
 }
 ?>

