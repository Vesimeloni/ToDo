

 <?php

if(!empty($_POST["username"]) && !empty($_POST["password"]))
{

// Include database connection file
include("dbconnect.php");

$username = $_POST["username"];
$password = $_POST["password"];
$hashed = password_hash($password, PASSWORD_DEFAULT);

//Prepared statement for security
$statement = "SELECT * FROM users Where username=?";
$stmt = $dbcon->prepare($statement);
$stmt->bind_param("s", $username);
$stmt->execute();

$result = $stmt->get_result();

if($result->num_rows>=1)
{

    $value = "duplicate";
header("Location:signup.php?user=$value");

}

else
{

$statement = "INSERT INTO users(username, password) VALUES(?,?)";
$stmt = $dbcon->prepare($statement);
$stmt->bind_param("ss", $username, $hashed);
$stmt->execute();

$value = "successful";
header("Location:login.php?user=$value");

}
$dbcon->close();
}

else 
{

header("Location:signup.php");
}

 ?>