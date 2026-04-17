<?php
session_start();
include('connection.php');

$start_date = $_POST['start_date'] ?? '';
$end_date = $_POST['end_date'] ?? '';
$car_type = $_POST['car_type'] ?? 'with_ac';
$submit = $_POST['submit'] ?? '';
$show_confirmation = false;

if($submit == 'Confirm Booking' && $start_date && $end_date) {
    $user_id = $_SESSION['id'] ?? 0;
    $query = mysqli_query($con, "INSERT INTO bookings (user_id, product_id, start_date, end_date, car_type, booking_date) VALUES ('$user_id', 1, '$start_date', '$end_date', '$car_type', NOW())");
    $show_confirmation = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Model 1 - Booking</title>
    <link rel="stylesheet" href="booking.css">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
        .booking-form { max-width: 500px; margin: 50px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .form-group { margin: 15px 0; }
        .form-group label { display: block; margin-bottom: 5px; font-weight: bold; }
        .form-group input[type="date"], .form-group select { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
        .form-group button { width: 100%; padding: 10px; background: #007bff; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px; margin-top: 10px; }
        .form-group button:hover { background: #0056b3; }
        .confirmation-container { max-width: 600px; margin: 50px auto; padding: 20px; background: white; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .confirmation-box h1 { color: #28a745; text-align: center; }
        .booking-details p { margin: 10px 0; }
        .btn { display: inline-block; margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <?php if($show_confirmation): ?>
    <div class="confirmation-container">
        <div class="confirmation-box">
            <h1>✓ Booking Confirmed!</h1>
            <p>Thank you for choosing us.</p>
            <p>Your rental details are as follows:</p>

            <div class="booking-details">
                <p><strong>Booking ID:</strong> #<?php echo rand(100000, 999999); ?></p>
                <p><strong>Car Model:</strong> Car Model 1</p>
                <p><strong>Number Plate:</strong> CAR-001</p>
                <p><strong>Pickup Date:</strong> <?php echo date('d-M-Y', strtotime($start_date)); ?></p>
                <p><strong>Drop-off Date:</strong> <?php echo date('d-M-Y', strtotime($end_date)); ?></p>
                <p><strong>Car Type:</strong> <?php echo $car_type == 'with_ac' ? 'With AC' : 'Without AC'; ?></p>
                <p><strong>Daily Rate:</strong> 1000 Rs/day</p>
                <p><strong>Pickup Location:</strong> Our office</p>
            </div>

            <div class="thank-you">
                <p>We hope you have a smooth and enjoyable experience!</p>
            </div>

            <a href="indexlogin.php" class="btn">Go to Home</a>
        </div>
    </div>
    <?php else: ?>
    <div class="booking-form">
        <h2>Car Model 1 - Booking</h2>
        <p><strong>Daily Rate:</strong> 1000 Rs/day | <strong>Number Plate:</strong> CAR-001</p>
        
        <form method="POST">
            <div class="form-group">
                <label for="start_date">Pickup Date *</label>
                <input type="date" id="start_date" name="start_date" required>
            </div>
            
            <div class="form-group">
                <label for="end_date">Drop-off Date *</label>
                <input type="date" id="end_date" name="end_date" required>
            </div>
            
            <div class="form-group">
                <label>Car Type:</label>
                <label><input type="radio" name="car_type" value="with_ac" checked> With AC</label>
                <label><input type="radio" name="car_type" value="without_ac"> Without AC</label>
            </div>
            
            <div class="form-group">
                <button type="submit" name="submit" value="Confirm Booking">Confirm Booking</button>
            </div>
        </form>
    </div>
    <?php endif; ?>
</body>
</html>
