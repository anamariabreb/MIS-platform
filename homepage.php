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
    <?php include 'components.php'; ?>
</div>

<?php include 'footer.php' ;?>