<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 

    $staff_id = $_SESSION['staff_id'];

    $list_complaints_new = "SELECT 
                                a.id,
                                a.complaint,
                                DATE_FORMAT(a.complaintDate, '%d-%m-%Y') AS complaintDate,
                                b.categoryName,
                                a.response,
                                DATE_FORMAT(a.responseDate, '%d-%m-%Y') AS responseDate,
                                c.firstname
                            FROM
                                complaints a
                                    JOIN
                                category b ON a.category = b.id
                                    JOIN
                                customer c ON c.id = a.customer
                                    join
                                category_staff d on b.id = d.category_id
                            WHERE
                                a.status = 1 and d.staff_id = $staff_id";

    $result_complaints_new = mysqli_query($con,$list_complaints_new);

    $list_complaints_ip = "SELECT 
                                a.id,
                                a.complaint,
                                DATE_FORMAT(a.complaintDate, '%d-%m-%Y') AS complaintDate,
                                b.categoryName,
                                a.response,
                                DATE_FORMAT(a.responseDate, '%d-%m-%Y') AS responseDate,
                                c.firstname
                            FROM
                                complaints a
                                    JOIN
                                category b ON a.category = b.id
                                    JOIN
                                customer c ON c.id = a.customer
                                    join
                                category_staff d on b.id = d.category_id
                            WHERE
                                a.status = 2 and d.staff_id = $staff_id";

    $result_complaints_ip = mysqli_query($con,$list_complaints_ip);
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
                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h2 class="m-0 font-weight-bold text-primary">Complaints : New Status</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Complaint</th>
                                                    <th>Complaint Date</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($row_complaints_new=mysqli_fetch_array($result_complaints_new)){
                                                        echo '<tr>';
                                                        echo '<td>'.$row_complaints_new['categoryName'].'</td>';
                                                        echo '<td>'.$row_complaints_new['complaint'].'</td>';
                                                        echo '<td>'.$row_complaints_new['complaintDate'].'</td>';
                                                        echo '<td style="text-align: center"><a href="response.php?id='.$row_complaints_new['id'].'" >Response <i class="fas fa-clipboard-list"></i></a></td>';
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
                    </div>

                    <div class="row">
                        <div class="col-xl-12 col-md-12 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <h2 class="m-0 font-weight-bold text-primary">Complaints : Pending Status</h2>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Category</th>
                                                    <th>Complaint</th>
                                                    <th>Complaint Date</th>
                                                    <th>Response</th>
                                                    <th>Response Date</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($list_complaints_ip=mysqli_fetch_array($result_complaints_ip)){
                                                        echo '<tr>';
                                                        echo '<td>'.$list_complaints_ip['categoryName'].'</td>';
                                                        echo '<td>'.$list_complaints_ip['complaint'].'</td>';
                                                        echo '<td>'.$list_complaints_ip['complaintDate'].'</td>';
                                                        echo '<td>'.$list_complaints_ip['response'].'</td>';
                                                        echo '<td>'.$list_complaints_ip['responseDate'].'</td>';
                                                        echo '<td style="text-align: center"><a href="response.php?id='.$list_complaints_ip['id'].'" >Response <i class="fas fa-clipboard-list"></i></a></td>';
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