<?php 
include('config.php');


$txtName = $_POST['signupName'];
$txtEmail = $_POST['signupEmail'];
$txtPassword = $_POST['signupPassword'];
$date = date('Y-m-d');


echo $mysql = "SELECT * FROM `users`";

$sql = "INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `date`) VALUES (NULL, '$txtName', '$txtEmail', '$txtPassword', '$date')";



if ($conn->query($sql) === TRUE) {

 echo "Successfully Signup";
 header('Location: homepage.php');


} else {

 echo "Error: " . $sql . "<br>" . $conn->error;

}

$conn->close(); 



?>