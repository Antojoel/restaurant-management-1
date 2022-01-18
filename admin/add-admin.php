<?php include("partials/menu.php"); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>ADD ADMIN</h1>
<br><br>
        <?php
        if(isset($_SESSION['add']))
        {
            echo $_SESSION['add'];
            unset($_SESSION['add']);
        }
        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td><input type="text" name="full_name" id=""></td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td><input type="text" name="user_name" id=""></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td><input type="password" name="password" id=""></td>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="submit" name="submit" value="Add Admin" class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>



<?php include("partials/footer.php"); ?>

<?php
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $user_name = $_POST['user_name'];
        $password = md5($_POST['password']);

        $sql = "INSERT INTO tbl_admin SET
        full_name = '$full_name',
        username = '$user_name',
        password = '$password'
        ";

        $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
        
        if ($result==TRUE)
        {
            // create a variable to store the alert message
            $_SESSION['add'] = "Admin Added Successfully"; 
            //redirect to the admin page
            header("location:".SITEURL."admin/manage-admin.php");
        }
        else {
            // create a variable to store the alert message
            $_SESSION['add'] = "Admin Not Added"; 
            //redirect to the admin page
            header("location:".SITEURL."admin/add-admin.php");
        }
    }
?>
