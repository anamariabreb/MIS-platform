<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ./login.php");
    exit;
}
?>

<?php include 'header.php' ;?>

<div class="c-content">
    <h1 class="my-5">Hi, <b style="text-transform: capitalize;"><?php echo htmlspecialchars($_SESSION["username"]); ?></b>, 
    <br>
    Welcome to the Management Information System.</h1>

    <h3>What would you like to do today?</h3>

    <p><a href="homepage.php" class="btn btn-outline-primary">Access Components</a></p>
    <p><a href="reset-password.php" class="btn btn-outline-primary">Reset Your Password</a></p>
    <p><a href="logout.php" class="btn btn-outline-danger">Sign Out of Your Account</a></p>
</div>

<?php include 'footer.php' ;?>