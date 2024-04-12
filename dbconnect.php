<?php
//Määritetään tiedot joilla yhdistetään serveriin.
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todoapp";

// Create connection
$dbcon = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($dbcon->connect_error) {
  die("Connection failed: " . $dbcon->connect_error);
}


// Make $dbcon a global variable
global $dbcon;

?>
