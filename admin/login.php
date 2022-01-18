<?php include("../config/constants.php"); ?>


<html>
    <head>
        <title>
            login - restaurant
        </title>
        <link rel="stylesheet" href="../css/admin.css">
    </head>
    
    <body>
        
    <div class="login">
        <h1 class='text-center'>LOGIN</h1>
        <br><br>
        
        <?php 
            if (isset($_SESSION['login'])) {
                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }
            if (isset($_SESSION['no-login-message'])) {
                echo $_SESSION['no-login-message'];
                unset($_SESSION['no-login-message']);
            }
        ?>
        <br><br> 
         <!-- form starts here -->
         <form action="" method="post" class= "text-center">
            username: <br>
            <input type="text" name="username" id=""><br><br>
            password <br>
            <input type="password" name="password" id=""><br><br>
            <input type="submit" name="submit" value="login" class="btn-primary"><br> 
            <br><br>
         </form>




        <p class='text-center'>Created by  - <a href="https://www.linkedin.com/in/antojoelv/">Joan Elto</a></p>
    </div>
    </body>
</html> 



<?php
    if (isset($_POST['submit'])) {
        // getting valuse from the form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // checking if the user is admin
        $sql = "SELECT * FROM tbl_admin where username = '$username' and password = '$password'";


        $result = mysqli_query($conn, $sql);
        $count  = mysqli_num_rows($result);

        if ($count == 1) {
            $_SESSION['login'] = '<div class="success">Login Successful</div>';  
            $_SESSION['user'] = $username;  
            header('location:'.SITEURL.'admin/');    
        }
        else {
            $_SESSION['login'] = '<div class="error text-center">username or password incorrect</div>';
            header('location:'.SITEURL.'admin/login.php');
        }
    }
?>  