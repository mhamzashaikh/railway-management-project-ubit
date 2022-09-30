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



$paymentUserID = $_SESSION['userid'];

$bookinghistoryQuery = "SELECT * from booking where user_id='$paymentUserID' ORDER BY booking_id DESC LIMIT 1 ";
$bookHistory = mysqli_query($conn, $bookinghistoryQuery);
$orderRow = mysqli_fetch_array($bookHistory); 

$paymentquery = "select * from users where user_id= '$paymentUserID' ";
$paymentResult = mysqli_query($conn, $paymentquery);
$paymentRow = mysqli_fetch_array($paymentResult, MYSQLI_ASSOC);  // has array value of that matched row.
$paymentCount = mysqli_num_rows($paymentResult);  // for checking that match email is present in a row or not
if($paymentCount){  
 





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
  <link rel="stylesheet" href="./payment.css">
  <title>Payment</title>
</head>

<body>



  <!-- ------------------------ -->


  <div class="container">
    <div class="card">
      <form action="" method="POST">
        <div class="payment-details">
            <h3>Payment Details</h3>
            <p>Complete your booking by providing your payment details.</p>
            <h3>Order ID # <?php echo $orderRow['booking_id']?></h3>
        </div>
        <div class="input-text">
            <input type="text"  value="<?php echo $paymentRow['email']; ?>" readonly >
            <span>Email</span>
        </div>
        <div class="input-text">
            <input type="text"  name="cardDetails" placeholder="0000 0000 0000 0000" data-slots="0" data-accept="\d" required >
            <span>Card Details</span>
        </div>
        <div class="input-text-cvv">
            <input type="text" name="cardDate" placeholder="mm/yyyy" data-slots="my" required>
            <!--<span>Card Details</span>-->
        </div>
         <div class="input-text-cvv cvv">
            <input type="text" name="cardCvv" placeholder="000" data-slots="0" data-accept="\d" size="3" required >
            <!--<span>Card Details</span>-->
        </div>
        <div class="input-text">
            <input type="text" name="cardName" placeholder="Username" required>
            <span>Card Holder name</span>
        </div>
        <div class="billing">
            <span>Billing Address</span>
            <select>
                <option>Select Country</option>
                <option>United States</option>
                <option>Pakistan</option>
                <option>England</option>
                <option>France</option>
                <option>Germany</option>
                <option>Japan</option>
                <option>China</option>
                <option>Italy</option>
                <option>Russia</option>
            </select>
            <div class="zip-state">
                <div class="zip">
                    <input type="text" placeholder="ZIP">
                </div>
                <div class="state">
                    <select>
                           <option>Select City</option>
                           <option>New York</option>
                           <option>Karachi</option>
                           <option>London</option>
                           <option>Paris</option>
                           <option>Berlin</option>
                           <option>Tokyo</option>
                           <option>Bejing</option>
                           <option>Rome</option>
                           <option>Mosco</option>
                    </select>
                </div>
                
            </div>
        </div>
        <div class="input-text">
            <input type="text" value="<?php echo $orderRow['from_city']?>" readonly>
            <span>From</span>
        </div>
        <div class="input-text">
            <input type="text" value="<?php echo $orderRow['destination_city']?>" readonly>
            <span>Destination</span>
        </div>
      
        <div class="input-text">
            <input type="text"  value="<?php echo $orderRow['quantity']?>" readonly>
            <span>Ticket Quantity</span>
        </div>
        <div class="input-text">
            <input type="text" value="<?php echo $orderRow['book_date']?>" readonly>
            <span>Booking date</span>
        </div>
        <div class="input-text">
            <input type="text" placeholder="Enter promo code here" onchange="myPromo(this.value)" >
            <span>Promo Code</span>
        </div>
        <div class="summary">
            <div class="text-data">
                <p>Subtotal</p>
                <p>Discount</p>
                <h5>Total</h5>
            </div>
            <div class="numerical-data">
                <p id="subTotal"><?php echo $orderRow['amount']?> PKR</p>
                <p id="promo">0 PKR</p>
                <h5 id="totalAmount">PKR</h5>
            </div>
        </div>
        <div class="pay">
            <button name="payment-btn">Pay</button>
        </div>
        <div class="secure">
            <i class="fa fa-lock"></i>
            <p> Payments are secured and encrypted</p>
        </div>
      </form>
        
    </div>
    
</div>



  

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
    crossorigin="anonymous"></script>

    <script>
        let subTotalDisplay = document.getElementById("subTotal");
        let discountDisplay = document.getElementById("promo");
        let totalAmountDisplay = document.getElementById("totalAmount");
        function myPromo(val){
            let workingPromo = "WELCOME";
            
            console.log(val);
            if(val === workingPromo){
                discountDisplay.innerHTML = "500";

                totalAmount();

            }

            else{
                discountDisplay.innerHTML = "0";

            }

            

        }

        function totalAmount(){

            let subAmount = parseInt(subTotalDisplay.innerHTML);
            let discountAmount = parseInt(discountDisplay.innerHTML);
            
            let mytotalamount =  subAmount - discountAmount;
            totalAmountDisplay.innerHTML  = mytotalamount; 
            console.log(mytotalamount);
            console.log(subAmount);
            console.log(discountAmount);

        }

        totalAmount();


        
    </script>
</body>

</html>



<?php 

$bookingid = $orderRow['booking_id'];

}

include('config.php');


if(isset($_POST['payment-btn'])){
  $cardDetails = $_POST['cardDetails'];
  $cardDate = $_POST['cardDate'];
  $cardCvv = $_POST['cardCvv'];
  $cardName = $_POST['cardName'];
  $date = date('Y-m-d');

  
  $updateStatusBooking = "UPDATE booking SET booking_status = 'confirmed' WHERE booking_id = '$bookingid'";
 


  $paymentQuery = "INSERT INTO payment(payment_id, card_number, card_date, card_cvv, card_name, payment_date, payment_status, booking_id) VALUES (NULL,'$cardDetails','$cardDate','$cardCvv','$cardName','$date','confirmed','$bookingid')";

  $paymentResult = mysqli_query($conn, $paymentQuery);
  

  if($paymentResult){
    $updateStatusBooking = mysqli_query($conn, $updateStatusBooking);

    ?>
    <script>
      alert("payment Successfull");
      location.href = 'homepage.php';
      
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





}

?>