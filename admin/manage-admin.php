<?php include("partials/menu.php"); ?>

        <!--content section start-->
        <div class="main-content">
            <div class="wrapper">
                <h1>MANAGE ADMIN</h1>
                <br><br>
                <?php
                if(isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }
                if(isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if (isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
                if (isset($_SESSION['user_not_found']))
                {
                    echo $_SESSION['user_not_found'];
                    unset($_SESSION['user_not_found']);
                }
                if (isset($_SESSION['password_not_match']))
                {
                    echo $_SESSION['password_not_match'];
                    unset($_SESSION['password_not_match']);
                }
                if (isset($_SESSION['password_updated']))
                {
                    echo $_SESSION['password_updated'];
                    unset($_SESSION['password_updated']);
                }
                
                ?>
                <br><br><br>

                <!-- button to add admin -->
                <a href="add-admin.php" class='btn-primary'>Add Admin</a>

                <br><br><br> 

                <table class="tbl-full">
                    <tr>
                        <th>S.No</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>Actions</th>
                    </tr>
                    
                    <?php
                    //query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    //execution of query
                    $result = mysqli_query($conn, $sql);
                    
                    //check if there is any admin
                    if($result==TRUE)
                    {   
                        //conting the rows
                        $count = mysqli_num_rows($result);
                        $sn = 1;

                        if($count>0)
                        {
                            //we have data
                            while ($row= mysqli_fetch_assoc($result))
                            {
                             //using while loop to get data
                             //while loop will run till we have data 
                             
                             //getting the data from the database

                                $id = $row['id'];
                                $full_name = $row['full_name'];
                                $user_name = $row['username'];
                                
                                // display values
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $user_name; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-password.php?id=<?php echo $id ?>" class='btn-primary'>change password</a>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id ?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id ?>" class="btn-danger">Delete Admin</a>
                                    </td>
                                </tr>


                                <?php

                            }
                        }
                        else
                        {
                            //we have no data;
                        }
                    }

                    
                    ?>
            </table>


            </div>
        </div>
        <!---content section end-->

<?php include("partials/footer.php"); ?>