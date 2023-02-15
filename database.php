<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'MIS-platform');

// define('DB_SERVER', 'dbaas-db-6770483-do-user-13453799-0.b.db.ondigitalocean.com');
// define('DB_USERNAME', '607IT');
// define('DB_PASSWORD', 'AVNS_G_wR0UmZ3MjydKHDi--');
// define('DB_NAME', 'MIS');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>