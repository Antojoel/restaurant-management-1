<?php 
// checking if the user is login or not
// authorization

    if (!isset($_SESSION['user'])) {
        // if user is login then redirect to dashboard

        $_SESSION['no-login-message']= '<div class="error text-center">unauthorized access denial please login </div>';
        header("location:".SITEURL."admin/login.php");
    }



?>