<?php include("partials/menu.php"); ?>


<div class="main-content">
    <div class="wrapper">
        <h1>UPDATE ADMIN</h1>
        <br><br>
        <?php
            $id = $_GET['id'];
            $sql = "SELECT * FROM tbl_admin WHERE id = $id";
            $result = mysqli_query($conn, $sql);

            if ($result==TRUE)
            {
                $count = mysqli_num_rows($result);
                
                if ($count==1)
                {   
                    //getting the data from the database
                    // echo "admin found";
                    $row = mysqli_fetch_assoc($result);
                    $full_name = $row['full_name'];
                    $user_name = $row['username'];


                }
                else {
                    header("location:".SITEURL."admin/manage-admin.php");
                }
            }
        
        ?>



        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name</td>
                    <td>
                        <input type="text" name="full_name" value="<?php echo $full_name;?>" >
                    </td>
                </tr>
                <tr>
                    <td>User Name</td>
                    <td>
                        <input type="text" name="user_name" value="<?php echo $user_name;?>">
                    </td>
                </tr>
                <tr>
                    <td colspan = "2">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="update Admin" class="btn-secondary">
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
    $full_name = $_POST['full_name'];
    $user_name = $_POST['user_name'];

    $sql = "UPDATE tbl_admin SET
    full_name = '$full_name',
    username = '$user_name'
    WHERE id = '$id'
    ";
    $result = mysqli_query($conn, $sql);

    if ($result==TRUE)
    {
        $_SESSION['update'] = "<div class='success'>Admin Updated Successfully</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else {
        $_SESSION['update'] = "<div class='error'>Admin Updated error</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }
}
?> 



<?php include("partials/footer.php"); ?>
