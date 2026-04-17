<?php
session_start();
error_reporting(0);
include('connection.php');

$signup_success = false;
$signup_error = false;

if($_POST['submit']=='SignUp')
{
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass = $_POST['password'];   
    
    // Check if email already exists
    $check_query = mysqli_query($con, "SELECT * FROM sign_up WHERE email='".$email."'");
    if(mysqli_num_rows($check_query) > 0) {
        $signup_error = "Email already registered!";
    } else {
        $query = mysqli_query($con, "INSERT INTO sign_up(user, email, password) VALUES('".$username."', '".$email."', '".$pass."')");
        if($query) {
            $signup_success = "Signup successful! You can now login.";
        } else {
            $signup_error = "Signup failed! Please try again.";
        }
    }
}

if($_POST['submit']=='LOGIN')
{
    $email=$_POST['email'];
    $pass = $_POST['password'];   
    
    $query = mysqli_query($con, "SELECT * FROM sign_up WHERE email='".$email."' AND password='".$pass."'");
    $row = mysqli_fetch_assoc($query);
    
    if($row) {
        $_SESSION['user'] = $row['user'];
        $_SESSION['email'] = $row['email'];
        header('Location: indexlogin.php');
    } else {
        $signup_error = "Invalid email or password!";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="signup.css">
    <script src="script.js" defer></script>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        
        <?php if($signup_success): ?>
            <div style="color: green; text-align: center; margin-bottom: 15px;">
                <strong><?php echo $signup_success; ?></strong>
            </div>
        <?php endif; ?>
        
        <?php if($signup_error): ?>
            <div style="color: red; text-align: center; margin-bottom: 15px;">
                <strong><?php echo $signup_error; ?></strong>
            </div>
        <?php endif; ?>
        
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <input type="submit" name="submit" value="LOGIN">
        </form>
        <div class="options">
            <a href="#">Forgot Password?</a>
            <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
        </div>
    </div>
</body>
</html>