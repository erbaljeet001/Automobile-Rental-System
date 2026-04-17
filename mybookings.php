<?php
include("connection.php");
$id=$_POST['id'];
$rent = $_POST['rent'];
$query=mysqli_query($con,"select * from products where id='".$id."'");
$result=mysqli_fetch_array($query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Bookings</title>
    <link rel="stylesheet" href="mybookings.css">
    <script src="script.js" defer></script>
</head>
<body>
    <h1>My Bookings</h1>

    <div class="booking">
        <h2>Booking #1</h2>
        <p>Date: October 17, 2024</p>
        <p>Car Name: <?php echo $result['product_name']; ?></p>
        <p>Car Number: <?php echo $result['product_number']; ?></p>
        <p>Location: Gorakhpur</p>
        <p>Status: Confirmed</p>
    </div>

</body>
</html>