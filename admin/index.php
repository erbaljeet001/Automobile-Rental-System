<?php
include('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Automobile Rental System</title>
</head>
<body>
    <div class="background-image">
        <div class="overlay">
            <h1>Welcome to Our Website</h1>
            <p>Your journey starts here!</p>
        </div>
    </div>
    <header>
        <h1>Welcome to Our Automobile Rental System</h1>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="signup.php">Login/Sign Up</a></li>
                <li><a href="#Contact">Contact Us</a></li>
            </ul>
        </nav>
    </header>
    
    <main>
        <section class="car-listings">
                <h2>Available Cars</h2>
            <div class="car">
                <img src="images/car1.jpeg" alt="Car 1">
                <h3>Car Model 1</h3>
                <p>Price: 1000 Rs/day</p>
                <a href="signup.php"><button>rent now</button></a>  
            </div>
            <div class="car">
                <img src="images/car2.jpeg" alt="Car 2">
                <h3>Car Model 2</h3>
                <p>Price: 1500 Rs/day</p>
                <a href="signup.php"><button>rent now</button></a>  
            </div>
            <div class="car">
                <img src="images/car3.jpeg" alt="Car 3">
                <h3>Car Model 3</h3>
                <p>Price: 2000 Rs/day</p>
                <a href="signup.php"><button>rent now</button></a>  
            </div>
        </section>
        <section class="Bike-listings">
            <h2>Available Bikes</h2>
            <div class="Bike">
                <img src="images/bike1.jpeg" alt="Bike 1">
                <h3>Bike Model 1</h3>
                <p>Price: 200 Rs/day</p>
                <a href="signup.php"><button>rent now</button></a>  
            </div>
            <div class="Bike">
                <img src="images/bike2.png" alt="Bike 2">
                <h3>Bike Model 2</h3>
                <p>Price: 300 Rs/day</p>
                <a href="signup.php"><button>rent now</button></a>  
            </div>
            <div class="Bike">
                <img src="images/bike3.jpeg" alt="Bike 3">
                <h3>Bike Model 3</h3>
                <p>Price: 400 Rs/day</p>
                <a href="signup.php"><button>rent now</button></a>  
            </div>
        </section>
    </main>
    
    <footer id="Contact">
        <section>
        <div class="contact-info">
            <h2>Contact Us</h2>
            <p>Email: info@AutomatedRentalSystem.com</p>
            <p>Phone: 620600XXXX</p>
            <p>Address: Sector 7, Noida, India</p>
        </div>
        <p>&copy; 2024 Automobile Rental System. All rights reserved.</p>
    </footer>
    </section>
    
</body>
</html>
