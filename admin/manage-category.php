<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
    <h1>MANAGE CATEGORY</h1>
    <br><br>

    <?php
        if (isset($_SESSION['add_category'])) 
        {
            echo $_SESSION['add_category'];
            unset($_SESSION['add_category']);
        }
    ?>
    <br><br>

<!-- button to add admin -->
<a href="<?php echo SITEURL; ?>admin/add-category.php" class='btn-primary'>Add Category</a>

<br><br><br> 

<table class="tbl-full">
    <tr>
        <th>S.No</th>
        <th>Title</th>
        <th>Image</th>
        <th>Featured</th>
        <th>Active</th>
        <th>Actions</th>
    </tr>

    <?php 
        $sql = "SELECT * FROM tbl_category";
        $result = mysqli_query($conn,$sql);
        $count = mysqli_num_rows($result);
        $sn = 1;
        
        if ($count>0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
                ?>
                <tr> 
                    <td><?php echo $sn++ ?></td>
                    <td><?php echo $title ?></td>
                    <td>
                    <?php 
                        if($image_name!=""){
                            ?>
                            <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" width="100px">
                            <?php
                        }
                    ?>
                    </td>
                    <td><?php echo $featured?></td>
                    <td><?php echo $active?></td>
                    <td>
                        <a href="" class="btn-secondary">Update category</a>
                        <a href="" class="btn-danger">Delete category</a>
                    </td>
                </tr>

                <?php

            }

        }
        else{

        ?>
        <tr>
            <td colspan="6"><div class="error">No categories Added</div></td>
        </tr>
        <?php

        }

    ?>   
    
    
</table>

    </div>
</div>


<?php include('partials/footer.php'); ?> 