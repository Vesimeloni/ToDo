<?php
 
 // Include database connection file
 include("dbconnect.php");

 // initialize errors variable
        $errors = "";

        // insert a quote if submit button is clicked
        if (isset($_POST['submit'])) {
          if (empty($_POST['name'])) {
                  $errors = "You must fill in the task";
          }else{
            $list_name = $_POST['name'];
    
            // SQL query to insert data into the database
            $sql = "INSERT INTO task_lists (name) VALUES ('$list_name')";
            
            // Execute query
            if (mysqli_query($dbcon, $sql)) {
                // Redirect to home.php after successful insertion
                header('location: home.php');
                exit();
            } else {
                // Display an error message if insertion fails
                $errors = "Error: " . mysqli_error($dbcon);
            }
        }
  }  
  

 ?> 
