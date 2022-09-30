
<?php 
include('config.php');

session_start();

$email = $_POST['emailLogin'];  
$password = $_POST['passLogin'];  
  
    //to prevent from mysqli injection  
    $email = stripcslashes($email);  
    $password = stripcslashes($password);  
    $email = mysqli_real_escape_string($conn, $email);  
    $password = mysqli_real_escape_string($conn, $password);  
  
    $sql = "select * from users where email = '$email' and password = '$password'";  
    
    $result = mysqli_query($conn, $sql);  
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    $count = mysqli_num_rows($result);  
      
    if($count){  
     
        echo "<h1><center> Login successful </center></h1>";  
        

        // $_SESSION['email'] = $email;
        $_SESSION['userid'] = $row['user_id'];
        header('Location: homepage.php');
    }  
    else{  
        echo "<h1> Login failed. Invalid email or password.</h1>";  
  
    }  

mysqli_close($conn);
?>