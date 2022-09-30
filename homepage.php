
<?php 

session_start();

// If user directly open homepage url without login, it will redirect to index.html.
if($_SESSION['userid'] == ''){
    header("Location: index.html");
    die();
}



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
  <link rel="stylesheet" href="./homepage.css">
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
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./profile.php">My Profile</a>
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
      <div class="card-body mycard mt-5">
        <h3 class="card-title text-center">Book your Train Tickets</h3>
        <div class="card-text">
          <!-- <h1></h1> -->

          <form class="d-flex justify-content-around flex-wrap  " action="" method="POST">

            <div class="form-group mt-1 col-10 col-sm-10">
              <label for="fromLocation">From</label>
              <input type="text" class=" d-inline form-control w-100" id="fromLocation"
                aria-describedby="emailHelp" name="fromcity" required>
            </div>
            <div class="form-group mt-4 col-10 col-sm-10 ">
              <label for="destination">To</label>
              <input type="text" class="d-inline form-control w-100" id="destination" name="destcity"  required>
            </div>
            <div class="form-group mt-4 col-10 col-sm-10">
              <label for="mydate">Date</label>
              <input type="date" class="d-inline form-control w-100" id="mydate" name="bookdate" required>
            </div>
            <div class="form-group mt-4 col-10 col-sm-10">
              <label for="forquantity">Ticket Quantity <i>( Min: 1 or Max: 5 )</i> </label>
              <input type="number" class="d-inline form-control w-100" id="forquantity" onchange="fareAmount()" name="quantity" min="1" max="5" required>
            </div>
            <div class="form-group mt-4 col-10 col-sm-10">
              <label for="fornumber">Fare Amount</label>
              <input type="number" class="d-inline form-control w-100" id="fornumber" name="amount" readonly required  value="">
            </div>
            <input type="submit" name="book" class="btn btn-primary btn-block col-3 col-sm-3 mt-4 mb-2" value="Book your train"/>

          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- ------------------------------- -->


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>


    <script>
      function fareAmount(){
        let fromLocation = document.getElementById('fromLocation').value;
        let destination = document.getElementById('destination').value;
        let quantity = document.getElementById('forquantity');
        let fare = document.getElementById('fornumber');

        if ((fromLocation == "Karachi" && destination == "Lahore")|| (fromLocation == "Lahore" && destination == "Karachi")) {

          fare.value = 5500 * quantity.value;
        }
        else if((fromLocation == "Karachi" && destination == "Islamabad") || (fromLocation == "Islamabad" && destination == "Karachi")){
          fare.value = 7000 * quantity.value;
        }
        else if((fromLocation == "Karachi" && destination == "Rawalpindi") || (fromLocation == "Rawalpindi" && destination == "Karachi")){
          fare.value = 8000 * quantity.value;
        }
        else if((fromLocation == "Karachi" && destination == "Peshawar") || (fromLocation == "Peshawar" && destination == "Karachi")){
          fare.value = 9500 * quantity.value;
        }
        else if((fromLocation == "Karachi" && destination == "Hyderabad") || (fromLocation == "Hyderabad" && destination == "Karachi")){
          fare.value = 1500 * quantity.value;
        }
        else if((fromLocation == "Lahore" && destination == "Islamabad") || (fromLocation == "Islamabad" && destination == "Lahore")){
          fare.value = 3000 * quantity.value;
        }
        else if((fromLocation == "Lahore" && destination == "Rawalpindi") || (fromLocation == "Rawalpindi" && destination == "Lahore")){
          fare.value = 3500 * quantity.value;
        }
        else if((fromLocation == "Lahore" && destination == "Multan") || (fromLocation == "Multan" && destination == "Lahore")){
          fare.value = 4000 * quantity.value;
        }
        else if((fromLocation == "Lahore" && destination == "Peshawar") || (fromLocation == "Peshawar" && destination == "Lahore")){
          fare.value = 6000 * quantity.value;
        }

        else{

          alert("Train not available on selected routes.")
        }



        
        console.log(fromLocation);
      }

    </script>
</body>

</html>



<?php 

include('config.php');

if(isset($_POST['book'])){
  $fromCity = $_POST['fromcity'];
  $destCity = $_POST['destcity'];
  $bookingDate = $_POST['bookdate'];
  $ticketQuantity = $_POST['quantity'];
  $fareAmount = $_POST['amount'];
  $homeUserID = $_SESSION['userid'];

  $bookinginsertquery = "INSERT INTO booking(booking_id, from_city, destination_city, book_date, booking_status, quantity, amount, user_id) VALUES (NULL,'$fromCity','$destCity','$bookingDate','pending',$ticketQuantity, $fareAmount, $homeUserID)" ;

  $bookingResult = mysqli_query($conn, $bookinginsertquery);


  if($bookingResult){
 

    ?>
    <script>
      alert("Booking Successfull");
      location.href = 'payment.php';
      
      </script>
    

    <?php


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



