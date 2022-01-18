<?php
    //session starts
    session_start();


    //global constants just change the values as required
    define('SITEURL','http://localhost/food-order/');
    define('LOCALHOST','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','food-order');

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME,DB_PASSWORD) or die(mysqli_error());
    $db = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>
