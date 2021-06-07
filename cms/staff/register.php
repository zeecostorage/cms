<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php';  
    include '../../config/lkp.php'; 

    $list_staff = "SELECT staff.*, lkp_status.name as status_name FROM `staff` join lkp_status on status = lkp_status.id";
    $result_staff = mysqli_query($con,$list_staff);

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $mobileNo = $_POST['mobileNo'];
        $ic = $_POST['ic'];
        $bod = $_POST['bod'];
        $address = $_POST['address'];
        $state = $_POST['state'];
        $country = $_POST['country'];
        $status = "1";
        $role = "1";

        $sql = "INSERT INTO staff(name,email,password,mobileNo,ic,bod,address,state,country,status,role)
                VALUES ('$name','$email','$password','$mobileNo','$ic','$bod','$address','$state','$country','$status','$role')";

        $result = mysqli_query($con,$sql);
        if($result > 0){

            echo "<script>alert ('Register successfully');</script>";
            echo "<script>window.location.href='register.php'; </script>";
        }
        else{
            echo "<script>alert ('Failed to Register');</script>";
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
                                            <h2 class="m-0 font-weight-bold text-primary">Staff</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <form class="user" id="register" name="register" method="POST">
                                        <input type="hidden" name="password" value="asd123">
                                        <div class="form-group ">
                                            <input type="text" class="form-control" id="name" name="name"
                                                    placeholder="Name" required>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control" id="ic" name="ic"
                                                    placeholder="No IC" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="date" class="form-control" id="bod" name="bod"
                                                    placeholder="Date of Birth" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="email" class="form-control" id="email" name="email"
                                                    placeholder="Email Address" required>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control" id="mobileNo" name="mobileNo"
                                                placeholder="Contact Number" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="address" name="address"
                                                    placeholder="Address" rows="1" required></textarea>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <select class="form-control" id="state" name="state" aria-label="Default select example" required>
                                                  <option selected>State *</option>

                                                    <?php
                                                        
                                                        $lkpState = getLkpState($con);

                                                        foreach($lkpState as $value) {
                                                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <select class="form-control" id="country" name="country" aria-label="Default select example" required>
                                                  <option selected>Country *</option>
                                                  
                                                    <?php
                                                        
                                                        $lkpCountry = getLkpCountry($con);

                                                        foreach($lkpCountry as $value) {
                                                            echo '<option value="'.$value['id'].'">'.$value['name'].'</option>';
                                                        }

                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary" name="submit" value="Register Staff">
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
                                            <h2 class="m-0 font-weight-bold text-primary">Manage Staff</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Mobile No.</th>
                                                    <th>Status</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($row_staff=mysqli_fetch_array($result_staff)){
                                                        echo '<tr>';
                                                        echo '<td>'.$row_staff['name'].'</td>';
                                                        echo '<td>'.$row_staff['email'].'</td>';
                                                        echo '<td>'.$row_staff['mobileNo'].'</td>';
                                                        echo '<td>'.$row_staff['status_name'].'</td>';
                                                        echo '<td><a href="view.php?id='.$row_staff['id'].'" ><i class="far fa-eye"></i></a>&nbsp;&nbsp;&nbsp;<a href="edit.php?id='.$row_staff['id'].'" ><i class="far fa-edit"></i></a></td>';
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