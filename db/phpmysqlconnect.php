<?php
define('NON_WEB_BASE_DIR', '/Users/quentin/cis4270/');
define('APP_NON_WEB_BASE_DIR', NON_WEB_BASE_DIR . 'ProjectFramework/');
include_once(APP_NON_WEB_BASE_DIR . 'db/dbconfig.php');
 
try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    if($conn != null) {
        // echo "Connected to $dbname at $host successfully.";
    }
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}