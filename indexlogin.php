<?php
session_start();
error_reporting(0);
include('connection.php');
if($_POST['submit']=='LOGIN')
{
    $email=$_POST['email'];
    $pass = $_POST['password'];
    $query=mysqli_query($con,"select * from sign_up where email='".$email."' and password='".$pass."'");
    $row= mysqli_fetch_array($query);
    $count = mysqli_num_rows($query);
    if($count>0)
    {
        $_SESSION['user']=$row['user'];
        $_SESSION['email']=$email;
        $_SESSION['id']=$row['id'];
    }
    else{
        header('Location:login.php');
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Automobile Rental System Login Page</title>
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
                <li><a href="indexlogin.php">Home</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="#">Welcome <?php echo $_SESSION['user'];?></a></li>
                <li><a href="logout.php">Log Out</a></li>
                <li><a href="mybookings.php">My Bookings</a></li>
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
                <a href="car1.php?id=1&rent=1000"><button>rent now</button></a>  
            </div>
            <div class="car">
                <img src="images/car2.jpeg" alt="Car 2">
                <h3>Car Model 2</h3>
                <p>Price: 1500 Rs/day</p>
                <a href="car1.php?id=2&rent=1500""><button>rent now</button></a>  
            </div>
            <div class="car">
                <img src="images/car3.jpeg" alt="Car 3">
                <h3>Car Model 3</h3>
                <p>Price: 2000 Rs/day</p>
                <a href="car1.php?id=3&rent=2000""><button>rent now</button></a>  
            </div>
        </section>
        <section class="Bike-listings">
            <h2>Available Bikes</h2>
            <div class="Bike">
                <img src="images/bike1.jpeg" alt="Bike 1">
                <h3>Bike Model 1</h3>
                <p>Price: 200 Rs/day</p>
                <a href="car1.php?id=4&rent=200"><button>rent now</button></a>  
            </div>
            <div class="Bike">
                <img src="images/bike2.png" alt="Bike 2">
                <h3>Bike Model 2</h3>
                <p>Price: 300 Rs/day</p>
                <a href="car1.php?id=5&rent=300"><button>rent now</button></a>  
            </div>
            <div class="Bike">
                <img src="images/bike3.jpeg" alt="Bike 3">
                <h3>Bike Model 3</h3>
                <p>Price: 400 Rs/day</p>
                <a href="car1.php?id=6&rent=400"><button>rent now</button></a>  
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
