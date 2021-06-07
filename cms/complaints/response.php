<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 

    $id = $_GET['id'];

    $list_complaints = "SELECT 
                            `complaints`.`id`,
                            `complaints`.`category`,
                            `complaints`.`complaint`,
                            DATE_FORMAT(complaintDate, '%d-%m-%Y') AS complaintDate,
                            `complaints`.`response`,
                            DATE_FORMAT(responseDate, '%d-%m-%Y') AS responseDate,
                            `complaints`.`status`,
                            `complaints`.`customer` 
                        FROM complaints where id = $id";

    $result_complaints = mysqli_query($con,$list_complaints);
    $row_complaints = mysqli_fetch_array($result_complaints);

    $list_category = "SELECT * FROM category where status = 1";
    $result_category = mysqli_query($con,$list_category);

    $list_status = "SELECT * FROM lkp_status_complaint";
    $result_status = mysqli_query($con,$list_status);

    if(isset($_POST['submit'])){
        $response = $_POST['response'];
        $status = $_POST['status'];

        $sql = "UPDATE `cms`.`complaints`
                SET
                `response` = '$response',
                `responseDate` = '".date("Y-m-d")."',
                `status` = $status
                WHERE `id` = $id";

        $result = mysqli_query($con,$sql);
        if($result > 0){

            echo "<script>alert ('Response successfully added');</script>";
            echo "<script>window.location.href='dashboardStaff.php'; </script>";
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
                                            <select class="form-control  form-control-user" id="category" name="category" aria-label="Default select example" disabled>
                                                <option value="">Please Select</option>;
                                                <?php
                                                    while($row_category=mysqli_fetch_array($result_category)){   
                                                        if($row_complaints['category'] == $row_category['id']){
                                                            echo '<option value="'.$row_category['id'].'" selected>'.$row_category['categoryName'].'</option>';
                                                        }else{
                                                            echo '<option value="'.$row_category['id'].'">'.$row_category['categoryName'].'</option>';
                                                        }
                                                    }
                                                ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Complaints</label>
                                            <textarea class="form-control form-control-user" id="complaints" name="complaints" readonly><?php echo $row_complaints['complaint'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Complaints Date</label>
                                            <input type="text" class="form-control form-control-user" id="complaintDate" name="complaintDate" value="<?php echo $row_complaints['complaintDate']?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Response</label>
                                            <textarea class="form-control form-control-user" id="response" name="response"><?php echo $row_complaints['response'];?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select class="form-control  form-control-user" id="status" name="status" aria-label="Default select example">
                                                <option value="">Please Select</option>;
                                                <?php
                                                    while($row_status=mysqli_fetch_array($result_status)){   
                                                        if($row_complaints['status'] == $row_status['id']){
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
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Save">

                                            <a href="dashboardStaff.php" class="btn btn-primary">Back</a>
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