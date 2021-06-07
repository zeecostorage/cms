<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 

    $id = $_GET['id'];

    $list_staff = "SELECT * FROM `staff` where status = 1";
    $result_staff = mysqli_query($con,$list_staff);

    $list_status = "SELECT * FROM lkp_status";
    $result_status = mysqli_query($con,$list_status);

    $list_category = "SELECT * FROM category where id = $id";
    $result_category = mysqli_query($con,$list_category);
    $row_category=mysqli_fetch_array($result_category);

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
                                            <h2 class="m-0 font-weight-bold text-primary">Category</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    
                                        <input type="hidden" name="action" id="action">
                                        <div class="form-group">
                                            <label for="name">Category Name</label>
                                            <input type="text" class="form-control form-control-user" id="name" name="name" value="<?php echo $row_category['categoryName'];?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea class="form-control form-control-user" id="description" name="description"  readonly><?php echo $row_category['categoryDescription'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control  form-control-user" id="statusEdit" name="statusEdit" aria-label="Default select example" disabled>
                                                <option value="">Please Select</option>;
                                                <?php
                                                    while($row_status=mysqli_fetch_array($result_status)){   
                                                        if($row_category['status'] == $row_status['id']){
                                                            echo '<option value="'.$row_status['id'].'" selected>'.$row_status['name'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$row_status['id'].'">'.$row_status['name'].'</option>';
                                                        }
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <br>
                                        <div id="buttonSave">
                                            <button class="btn btn-primary" onclick="window.location.href='category.php'">Back</button>
                                        </div>
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
    
</script>