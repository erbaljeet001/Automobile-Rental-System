<?php
include("connection.php");
$id=$_GET['id'];
$rent = $_GET['rent'];
$query=mysqli_query($con,"select * from products where id='".$id."'");
$result=mysqli_fetch_array($query);

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link rel="stylesheet" href="car1.css">
</head>
<body>
    <div class="container">
        <h2>Car Rentals</h2>
        <form method="POST">
            <input type="hidden" value="<?php echo $id; ?>" name="id">
            <input type="hidden" value="<?php echo $rent; ?>" name="rent">
            <div class="form-group">
                <label for="selected-car">Selected Car: </label>
                <span id="selected-car"><?php echo $result['product_name']; ?></span>
            </div>
            <div class="form-group">
                <label for="number-plate">Number Plate: </label>
                <span id="number-plate"><?php echo $result['product_number']; ?></span>
            </div>
            <div class="form-group">
                <label for="start-date">Start Date: </label>
                <input type="date" id="start-date" name="start_date" required>
            </div>
            <div class="form-group">
                <label for="end-date">End Date: </label>
                <input type="date" id="end-date" name="end_date" required>
            </div>
            <div class="form-group">
                <label>Choose your car type:</label>
                <label><input  type="radio" name="car_type" value="with_ac" checked> With AC</label>
                <label><input type="radio" name="car_type" value="without_ac"> Without AC</label>
            </div>
            <div class="form-group">
                <label>Charge type: </label>
                
                <label><input type="radio" name="charge_type" value="per_day" checked> Per Day</label>
            </div>
            <div class="form-group">
                <label for="driver">Select Driver:</label>
                <select id="driver" name="driver" required>
                    <option value="">--  --</option>
                    <option value="driver1">Yes</option>
                    <option value="driver2">No</option>
                </select>

            <div class="form-group">
                <label for="driver">Available Drivers:</label>
                <select id="driver" name="driver" required>
                    <option value="">-- Available Drivers --</option>
                    <option value="driver1">Driver 1</option>
                    <option value="driver2">Driver 2</option>
                    <option value="driver3">Driver 3</option>
                </select>
            </div>
            <button type="submit" class="rent-button"><a href="bookingcar1.php">Rent Now</a></button>
        </form>
        <p class="note">Note: You will be charged with an extra Rs. 500 for each day after the due date ends.</p>
    </div>
</body>
</html>
