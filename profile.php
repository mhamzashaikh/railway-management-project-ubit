<?php


session_start();

// If user directly open homepage url without login, it will redirect to index.html.
if($_SESSION['userid'] == ''){
    header("Location: index.html");
    die();
}

?>

<?php
include('config.php');

$profileUserID = $_SESSION['userid'];

$profilequery = "select * from users where user_id= '$profileUserID' ";
$profileResult = mysqli_query($conn, $profilequery);
$profileRow = mysqli_fetch_array($profileResult, MYSQLI_ASSOC);  // has array value of that matched row.
$profileCount = mysqli_num_rows($profileResult);  // for checking that match email is present in a row or not
if($profileCount){  
 

  ?>


     



<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="./login.css">
  <title>Railway System</title>
</head>

<body>
  <!-- Navbar  -->

  <nav class="navbar navbar-expand-lg bg-success shadow ">
    <div class="container ">
      <a class="navbar-brand " href="#">
        <img src="./images/logo.png" alt="RailwayLogo" width="60">
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="./homepage.php">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link active" href="./profile.php">My Profile</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./booking.php">Booking</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- ------------------------ -->



  <!-- Form  -->
  <div class="global-container">
    <div class="card login-form">
      <div class="card-body d-flex flex-column justify-content-center">
        <h3 class="card-title text-center">My Profile</h3>
        <div class="card-text">

          <form action="" method="POST">

            <div class="form-group">
              <label for="Name">Name</label>
              <input type="text" class="form-control form-control-sm" id="Name" name="pname" value="<?php echo $profileRow['name']; ?>"
                aria-describedby="emailHelp" >
            </div>
            <div class="form-group mt-3">
              <label for="Email">Email address</label>
              <input type="email" class="form-control form-control-sm" id="Email" name="pemail"
                aria-describedby="emailHelp" value="<?php echo $profileRow['email']; ?>">
            </div>
            <div class="form-group mt-3">
              <label for="Password">Password</label>
              <input type="password" class="form-control form-control-sm" id="Password" name="password" value="<?php echo $profileRow['password']; ?>">
            </div>
            <button type="submit" class="btn btn-primary btn-block" name="updateProfile">Update Profile</button>

          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- ------------------------------- -->


  
<?php


   }  // closing if condition curly braces here 


   if(isset($_POST['updateProfile'])){
    $profileName = $_POST['pname'];
    $profileEmail = $_POST['pemail'];
    $profilePassword = $_POST['password'];

    $userid = $profileRow['user_id'];


    $profileUpdateQuery = "UPDATE users SET name='$profileName', email='$profileEmail', password='$profilePassword' where user_id ='$userid' ";
    $profileUpdateResult = mysqli_query($conn, $profileUpdateQuery);
    
    if($profileUpdateQuery){

      header("Location: profile.php");


  }
  else{
   
    ?>
    <script>
      alert("Oops There some error!");
    </script>

    <?php
      }


}


?>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
</body>

</html>