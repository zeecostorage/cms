<?php 
    include '../../config/header.php'; 
    include '../../config/database.php'; 
    include '../../config/enum.php'; 


    $list_complaints_new = "SELECT 
                            a.id, 
                            a.complaint,
                            date_format(a.complaintDate, '%d-%m-%Y') as complaintDate,
                            b.categoryName, 
                            c.firstname
                        FROM
                            complaints a
                                JOIN
                            category b ON a.category = b.id
                                JOIN
                            customer c ON c.id = a.customer
                        where a.status = 1";

    $result_complaints_new = mysqli_query($con,$list_complaints_new);


    $list_complaints_ip = "SELECT 
                            a.id, 
                            a.complaint,
                            date_format(a.complaintDate, '%d-%m-%Y') as complaintDate,
                            b.categoryName, 
                            a.response,
                            date_format(a.responseDate, '%d-%m-%Y') as responseDate,
                            c.firstname
                        FROM
                            complaints a
                                JOIN
                            category b ON a.category = b.id
                                JOIN
                            customer c ON c.id = a.customer
                        where a.status = 2";

    $result_complaints_ip = mysqli_query($con,$list_complaints_ip);


    $list_complaints_complete = "SELECT 
                                a.id, 
                                a.complaint,
                                date_format(a.complaintDate, '%d-%m-%Y') as complaintDate,
                                b.categoryName, 
                                a.response,
                                date_format(a.responseDate, '%d-%m-%Y') as responseDate,
                                c.firstname
                            FROM
                                complaints a
                                    JOIN
                                category b ON a.category = b.id
                                    JOIN
                                customer c ON c.id = a.customer
                            where a.status = 3";

    $result_complaints_complete = mysqli_query($con,$list_complaints_complete);

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
                                            <h2 class="m-0 font-weight-bold text-success">Complaints : New Status</h2>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($row_complaints_new=mysqli_fetch_array($result_complaints_new)){
                                                        echo '<tr>';
                                                        echo '<td>'.$row_complaints_new['categoryName'].'</td>';
                                                        echo '<td>'.$row_complaints_new['complaint'].'</td>';
                                                        echo '<td>'.$row_complaints_new['complaintDate'].'</td>';
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
                                            <h2 class="m-0 font-weight-bold text-success">Complaints : Pending Status</h2>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($row_complaints_ip=mysqli_fetch_array($result_complaints_ip)){
                                                        echo '<tr>';
                                                        echo '<td>'.$row_complaints_ip['categoryName'].'</td>';
                                                        echo '<td>'.$row_complaints_ip['complaint'].'</td>';
                                                        echo '<td>'.$row_complaints_ip['complaintDate'].'</td>';
                                                        echo '<td>'.$row_complaints_ip['response'].'</td>';
                                                        echo '<td>'.$row_complaints_ip['responseDate'].'</td>';
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
                                            <h2 class="m-0 font-weight-bold text-success">Complaints : Complete Status</h2>
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
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                    while($row_complaints_complete=mysqli_fetch_array($result_complaints_complete)){
                                                        echo '<tr>';
                                                        echo '<td>'.$row_complaints_complete['categoryName'].'</td>';
                                                        echo '<td>'.$row_complaints_complete['complaint'].'</td>';
                                                        echo '<td>'.$row_complaints_complete['complaintDate'].'</td>';
                                                        echo '<td>'.$row_complaints_complete['response'].'</td>';
                                                        echo '<td>'.$row_complaints_complete['responseDate'].'</td>';
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