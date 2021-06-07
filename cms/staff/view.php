<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php';  
    include '../../config/lkp.php'; 

    $id = $_GET['id'];
    $list_staff = "SELECT * FROM `staff` where id = $id";
    $result_staff = mysqli_query($con,$list_staff);
    $row_staff=mysqli_fetch_array($result_staff);
    
    $list_status = "SELECT * from lkp_status";
    $result_status = mysqli_query($con,$list_status);
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
                                            <h2 class="m-0 font-weight-bold text-success">Staff</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <!-- <form class="user" id="register" name="register" method="POST"> -->
                                        <input type="hidden" name="password" value="asd123">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" id="name" name="name"
                                                    value="<?php echo $row_staff['name'];?>" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control" id="ic" name="ic"
                                                    value="<?php echo $row_staff['ic'];?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="bod" name="bod"
                                                    value="<?php echo $row_staff['bod'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    value="<?php echo $row_staff['email'];?>" readonly>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="mobileNo" name="mobileNo"
                                                value="<?php echo $row_staff['mobileNo'];?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="address" name="address"
                                                    rows="1"  readonly><?php echo $row_staff['address'];?></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control" id="state" name="state" aria-label="Default select example" disabled>
                                                  <option selected>State *</option>

                                                    <?php
                                                        
                                                        $lkpState = getLkpState($con);

                                                        foreach($lkpState as $value) {
                                                            if($row_staff['state'] == $value['id']){
                                                                echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                                                            }else{
                                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                            }
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="country" name="country" aria-label="Default select example" disabled>
                                                  <option selected>Country *</option>
                                                  
                                                    <?php
                                                        
                                                        $lkpCountry = getLkpCountry($con);

                                                        foreach($lkpCountry as $value) {
                                                            if($row_staff['country'] == $value['id']){
                                                                echo '<option value="'.$value['id'].'" selected>'.$value['name'].'</option>';
                                                            }else{
                                                                echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                            }
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <select class="form-control" id="status" name="status" aria-label="Default select example" disabled>
                                                  <option selected>Status *</option>
                                                  
                                                    <?php
                                                        
                                                        while($row_status=mysqli_fetch_array($result_status)){
                                                            if($row_staff['status'] == $row_status['id']){
                                                                echo '<option value="'.$row_status['id'].'" selected>'.$row_status['name'].'</option>';
                                                            }else{
                                                                echo '<option value="'.$row_status['id'].'">'.$row_status['name'].'</option>';
                                                            }
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <button class="btn btn-primary" onclick="window.location.href='register.php'">Back</button>
                                    <!-- </form> -->
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