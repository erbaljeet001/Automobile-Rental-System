<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link rel="stylesheet" href="car1.css">
</head>
<body>
    <div class="container">
        <h2>Bike Rentals</h2>
        <form action="submit_booking.php" method="POST">
            <div class="form-group">
                <label for="selected-car">Selected Bike</label>
                <span id="selected-car">Royal Enfield</span>
            </div>
            <div class="form-group">
                <label for="number-plate">Number Plate: </label>
                <span id="number-plate">UP 53 AQ 8965</span>
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
                <label>Charge type: </label>
                <label><input type="radio" name="charge_type" value="per_day" checked> Per Day</label>
            </div>
            <div class="form-group">
                <label for="driver">Select a driver:</label>
                <select id="driver" name="driver" required>
                    <option value="">-- Select Driver --</option>
                    <option value="driver1">Driver 1</option>
                    <option value="driver2">Driver 2</option>
                    <option value="driver3">Driver 3</option>
                </select>
            </div>
            <button type="submit" class="rent-button">Rent Now</button>
        </form>
        <p class="note">Note: You will be charged with an extra Rs. 500 for each day after the due date ends.</p>
    </div>
</body>
</html>
