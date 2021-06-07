<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 

    $list_staff = "SELECT * FROM `staff` where status = 1";
    $result_staff = mysqli_query($con,$list_staff);

    $list_status = "SELECT * FROM lkp_status";
    $result_status = mysqli_query($con,$list_status);

    $list_category = "SELECT category.*, lkp_status.name as status_name FROM category join lkp_status on status = lkp_status.id";
    $result_category = mysqli_query($con,$list_category);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $description = $_POST['description'];
        $statusEdit = $_POST['statusEdit'];

        $sql = "INSERT INTO category(categoryName,categoryDescription,status)
                VALUES ('$name','$description','$statusEdit')";

        $result = mysqli_query($con,$sql);
        if($result > 0){

            echo "<script>alert ('Add successfully');</script>";
            echo "<script>window.location.href='category.php'; </script>";
        }
        else{
            echo "<script>alert ('Failed to add');</script>";
        }
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
                                        <input type="hidden" name="action" id="action">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control form-control-user" id="name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control form-control-user" id="description" name="description" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control  form-control-user" id="statusEdit" name="statusEdit" aria-label="Default select example" required>
                                                <option value="">Please Select</option>;
                                                <?php
                                                    while($row_status=mysqli_fetch_array($result_status)){   
                                                        echo '<option value="'.$row_status['id'].'">'.$row_status['name'].'</option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <br>
                                        <div id="buttonSave">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal" id="cancel">Cancel</button>
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
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h2 class="m-0 font-weight-bold text-success">Manage Category</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Status</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($row_category=mysqli_fetch_array($result_category)){
                                                        echo '<tr>';
                                                        echo '<td>'.$row_category['categoryName'].'</td>';
                                                        echo '<td>'.$row_category['status_name'].'</td>';
                                                        echo '<td style="text-align: center"><a href="viewCategory.php?id='.$row_category['id'].'" >View <i class="far fa-eye"></i></a><br><a href="editCategory.php?id='.$row_category['id'].'" >Edit <i class="far fa-edit"></i></a><br><a href="manageUser.php?id='.$row_category['id'].'">Manage User <i class="fas fa-user-edit"></i></a></td>';
                                                        echo '</tr>';
                                                    }
                                                ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-12 col-md-12 mb-4">
                        </div>
                    </div>
                    <!-- /.container-fluid -->

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
    
</script>