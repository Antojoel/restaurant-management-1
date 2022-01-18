<?php
    include("../config/constants.php");

    // get the id of the admin
    echo $id = $_GET['id'];
    // delete the admin
    $sql = "DELETE FROM tbl_admin WHERE id = $id";
    // execute the query
    $result = mysqli_query($conn, $sql);
    // check if the query is executed
    if($result==TRUE)
    {
        $_SESSION['delete'] = "<div class='success'>Admin Deleted Successfully</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }
    else
    {
        $_SESSION['delete'] = "<div class='error'>Admin Not Deleted</div>";
        header("location:".SITEURL."admin/manage-admin.php");
    }

?>