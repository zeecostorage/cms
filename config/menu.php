<?php 
    include '../../config/enum.php';
    include '../../config/user.php';

    $user_type = $_SESSION['user_type'];
?>

<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?php echo $app_shortform;?></div>
    </a>

    <?php if($user_type == 2){ ?>
        
        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="../../cms/complaints/dashboard.php">
                <i class="far fa-clipboard"></i>
                <span>Complaints</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            COMPLAINTS
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="../../cms/complaints/complaints.php">
                <i class="fas fa-pencil-alt"></i>
                <span>Complaints</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    <?php }elseif($user_type == 1){ ?>

        <hr class="sidebar-divider d-none d-md-block">

        <li class="nav-item">
            <a class="nav-link" href="../../cms/complaints/dashboardStaff.php">
                <i class="far fa-calendar-check"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    <?php }elseif($user_type == 0){ ?>
        <hr class="sidebar-divider my-0">
        
        <li class="nav-item">
            <a class="nav-link" href="../../cms/complaints/dashboardAdmin.php">
                <i class="far fa-clipboard"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            MANAGEMANT
        </div>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="../../cms/staff/register.php">
                <i class="fas fa-pencil-alt"></i>
                <span>Staff</span></a>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="../../cms/lookup/category.php">
                <i class="fas fa-cogs"></i>
                <span>Category</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>
    <?php }?>

</ul>
<!-- End of Sidebar -->