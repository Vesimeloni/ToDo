<?php



 // Include database connection file
 include("dbconnect.php");

 // Select all tasks
 $user_id = $_SESSION["user_id"];


 $statement = "SELECT * FROM tasks WHERE user_id=?";
 $stmt = $dbcon->prepare($statement);
 $stmt->bind_param("s", $_SESSION["user_id"]);
 $stmt->execute();
 $result = $stmt->get_result();


      while($row = $result->fetch_assoc()) {

      

        echo "<div style='background-color: #D3D3D34D; border-radius: 15px;' class='p-2'>";

        echo "<input class='mx-3' type='checkbox' id='task_" . $row["task_id"] . "' onchange='markTaskDone(" . $row["task_id"] . ")'>";
        echo "<label class='mx-2' style='width: 60vw;' for='task_" . $row["task_id"] . "'>" . $row["title"] . "</label>";
    
    /*
        echo "<span>";
        echo $row["date"];
        echo "</span>";
    
        echo "<span>";
        echo $row["time"];
        echo "</span>";

        */

        

        $delete_task = "deletetask.php?task_id=" . $row["task_id"];
        $task_id = $row["task_id"];
        $delete_task .=$task_id;
    
        echo "<span >";
        echo "<a class='mx-2 btn btn-sm' href='$delete_task'>X</a>";
        echo "</span>";
        echo "</div>";
    
        
     
     }

?>
      

