<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>CHANGE PASSWORD</h1>
        <br><br>
        <?php
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        ?>


        <form action="" method="post">
            <table class="tbl-30">
                <tr>
                    <td>
                        <label>Old Password</label>
                    </td>
                    <td>
                        <input type="password" name="old_password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>New Password</label>
                    </td>
                    <td>
                        <input type="password" name="new_password" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Confirm Password</label>
                    </td>
                    <td>
                        <input type="password" name="confirm_password" required>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td colspan= "2">
                        <input type="hidden" name="id" value="<?php echo $id;?>">
                        <input type="submit" name="submit" class="btn-secondary" value="Change Password">
                    </td>   
                </tr>
            </table>
        </form>
    </div>
</div>
<?php 
    if (isset($_POST['submit'])) 
    {
        $id = $_POST['id'];
        $old_password = md5($_POST['old_password']);
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);


        //check wheter the user exisr
        $sql = "SELECT * FROM tbl_admin WHERE id = '$id' AND password = '$old_password'";

        $result = mysqli_query($conn, $sql);

        if ($result==TRUE)
        {
            $count = mysqli_num_rows($result);
            if ($count==1)
            {
                if ($new_password==$confirm_password)
                {
                    $sql2 = "UPDATE tbl_admin SET password = '$new_password' WHERE id = '$id'";
                    $result2 = mysqli_query($conn, $sql2);
                    if ($result2==TRUE)
                    {
                        $_SESSION['password_updated'] = "<div class='success'>password changed Successfully</div>"; 
                        header("Location:".SITEURL."admin/manage-admin.php");
                    }
                    else
                    {
                        $_SESSION['password_updated'] = "<div class='error'>password not changed</div>"; 
                        header("Location:".SITEURL."admin/manage-admin.php");
                    }
                }
                else
                {
                    $_SESSION['password_not_match'] = "<div class='error'>passowrd did not match</div>"; 
                    header("Location:".SITEURL."admin/manage-admin.php");
                }
            }
            else {
                $_SESSION['user_not_found'] = "<div class='error'>User not found</div>"; 
                header("Location:".SITEURL."admin/manage-admin.php");
            }
        }
        

    }
?>






<?php include("partials/footer.php"); ?>
