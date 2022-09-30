<?php 
include('config.php');
session_start();

$bookingUserID = $_SESSION['userid'];


$bookinghistoryQuery = "SELECT * from booking where user_id='$bookingUserID' ";
$bookHistory = mysqli_query($conn, $bookinghistoryQuery);
$bookingHistoryCount = mysqli_num_rows($bookHistory);

?>






<!DOCTYPE html>
<html lang="en">

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
            <a class="nav-link" href="./profile.php">My Profile</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active" href="./booking.php">Booking</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- ------------------------ -->



  <!-- Table  -->

  <div class="mt-5 container table-responsive">
    <table class="table caption-top">
      <h3 class="text-center mb-4 stroke" >Your Bookings</h3>
      <thead>
        <tr>
          <th scope="col">Booking ID</th>
          <th scope="col">From</th>
          <th scope="col">To</th>
          <th scope="col">Date</th>
          <th scope="col">Quantity</th>
          <th scope="col">Amount</th>
          <th scope="col">Status</th>
        </tr>
      </thead>
      <tbody>
      <?php 
      while($row = mysqli_fetch_array($bookHistory))
      {
        ?>


        <tr>
          <td><?php echo $row['booking_id']?></td>
          <td><?php echo $row['from_city']?></td>
          <td><?php echo $row['destination_city']?></td>
          <td><?php echo $row['book_date']?></td>
          <td><?php echo $row['quantity']?></td>
          <td><?php echo $row['amount']?></td>
          <td><?php echo $row['booking_status']?></td>

        </tr>
<?php
      }
?>
      </tbody>


    </table>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>
</body>

</html>