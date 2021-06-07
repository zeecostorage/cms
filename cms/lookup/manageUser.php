<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 

    $id = $_GET['id'];

    $list_staff = "SELECT * FROM `staff` where status = 1 and id not in (select staff_id from category_staff)";
    $result_staff = mysqli_query($con,$list_staff);

    $list_category = "SELECT category.categoryName, staff.name, staff.id FROM category_staff 
                        join staff on staff.id = category_staff.staff_id 
                        join category on category.id = category_staff.category_id 
                        where category_id = $id";
    $result_category = mysqli_query($con,$list_category);

    if(isset($_POST['submit'])){
        $staff = $_POST['staff'];

        $sql = "select count(id) as exist from category_staff where staff_id = '$staff' and category_id = '$id'";

        $result = mysqli_query($con,$sql);
        $row=mysqli_fetch_array($result);
        
        if($row["exist"] == 0){

            $sql = "INSERT INTO `cms`.`category_staff`
                    (`staff_id`,
                    `category_id`)
                    VALUES
                    ('$staff','$id')";

            $result = mysqli_query($con,$sql);
            if($result > 0){

                echo "<script>alert ('Assign successfully');</script>";
                echo "<script>window.location.href='manageUser.php?id=".$id."'; </script>";
            }
            else{
                echo "<script>alert ('Failed to add');</script>";
            }
        }
    }
    if(isset($_GET['del'])){
        $staff = $_GET['staffid'];

        $sql = "DELETE FROM `cms`.`category_staff` WHERE staff_id = '$staff' and category_id = '$id'";
        $result = mysqli_query($con,$sql);
        echo "<script>window.location.href='manageUser.php?id=".$id."'; </script>";
    }
?>
    
    <style type="text/css">

    </style>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include '../../config/menu.php'; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                
                <?php include '../../config/toolbar.php'; ?>

                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <!-- <h1 class="h3 mb-2 text-gray-800">Staff</h1> -->

                    <!-- DataTales Example -->

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h2 class="m-0 font-weight-bold text-success">Category</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form id="formEvent" name="category" method="POST">
                                        <div class="form-group">
                                            <label for="status">Staff Name</label>
                                            <select class="form-control  form-control-user" id="staff" name="staff" aria-label="Default select example" required>
                                                <?php
                                                    while($row_staff=mysqli_fetch_array($result_staff)){   
                                                        if($row_category['status'] == $row_staff['id']){
                                                            echo '<option value="'.$row_staff['id'].'" selected>'.$row_staff['name'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$row_staff['id'].'">'.$row_staff['name'].'</option>';
                                                        }
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <br>
                                        <div id="buttonSave">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Assign">
                                            <a href="category.php" class="btn btn-primary">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 mb-4"></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-body">
                                    <h4>Assigned List</h4>
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Staff Name</th>
                                                <th>&nbsp;</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                                while($row_category = mysqli_fetch_array($result_category)){
                                                    echo '<tr>';
                                                    echo '<td>'.$row_category['name'].'</td>';
                                                    echo '<td style="text-align: center"><a href="manageUser.php?id='.$id.'&staffid='.$row_category['id'].'&del=delete"  onClick="return confirm(\'Are you sure you want to delete?\')" >Delete <i class="fas fa-user-slash"></i></a></td>';
                                                    echo '</tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 mb-4"></div>
                        </div>
                    </div>
                </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span><?php echo $footer;?></span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


</body>

<?php include '../../config/footer.php'; ?>

<script type="text/javascript">
    $( document ).ready(function() {
    });
</script>