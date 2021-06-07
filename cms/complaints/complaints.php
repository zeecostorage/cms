<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 

    $staff_id = $_SESSION['id'];

    $list_category = "SELECT * FROM category where status = 1";
    $result_category = mysqli_query($con,$list_category);

    if(isset($_POST['submit'])){
        $category = $_POST['category'];
        $complaints = $_POST['complaints'];

        $sql = "INSERT INTO complaints(category,complaint,status,customer)
                VALUES ('$category','$complaints','1','$staff_id')";

        $result = mysqli_query($con,$sql);
        if($result > 0){

            echo "<script>alert ('Add successfully');</script>";
            echo "<script>window.location.href='dasboard.php'; </script>";
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
                                            <h2 class="m-0 font-weight-bold text-primary">Complaints</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    
                                    <form id="formEvent" name="complaints" method="POST">
                                        <div class="form-group">
                                            <label for="status">Category</label>
                                            <select class="form-control  form-control-user" id="category" name="category" aria-label="Default select example" required>
                                                <option value="">Please Select</option>;
                                                <?php
                                                    while($row_category=mysqli_fetch_array($result_category)){   
                                                        echo '<option value="'.$row_category['id'].'">'.$row_category['categoryName'].'</option>';
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Complaints</label>
                                            <textarea class="form-control form-control-user" id="complaints" name="complaints" required></textarea>
                                        </div>
                                        <br>
                                        <div id="buttonSave">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">
                                        </div>
                                    </form>
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