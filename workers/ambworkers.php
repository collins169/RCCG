<?php include '../functions/db.php';
if (isset($_GET['deactivate'])) {
    $id=$_GET['deactivate'];

    $check=mysqli_query($connect, "SELECT * FROM members WHERE id=$id")or die("Unable to process request");
    $info=mysqli_fetch_array($check);
    $delete=mysqli_query($connect, "UPDATE members SET deleted=1 WHERE id=$id")or die("Unable to process request");
    if($delete==TRUE || $delete==1){
        echo "<script>alert('$info[surname]".' '. "$info[first_name] has been deactivated!' )
                window.location.href='members.php'</script>";
    }else{
        echo "<script>alert('Unable to deactivate $info[surname]".' '. "$info[first_name] !')
                       window.location.href='members.php'</script>";
    }
}

if (isset($_GET['activate'])) {
    $id=$_GET['activate'];

    $check=mysqli_query($connect, "SELECT * FROM members WHERE id=$id")or die("Unable to process request");
    $info=mysqli_fetch_array($check);
    $delete=mysqli_query($connect, "UPDATE members SET deleted=0 WHERE id=$id")or die("Unable to process request");
    if($delete==TRUE || $delete==1){
        echo "<script>alert('$info[surname]".' '. "$info[first_name] has been activated!' )
                window.location.href='members.php'</script>";
    }else{
        echo "<script>alert('Unable to activate $info[surname]".' '. "$info[first_name]!')
                       window.location.href='members.php'</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title>The Ambassador CMS | Ambassadors Workers</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="../assets/global/plugins/datatables/datatables.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
    <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <link href="../assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
    <link href="../assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
    <link href="../assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
    <!-- END THEME LAYOUT STYLES -->
    <link rel="apple-touch-icon" sizes="57x57" href="../assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="../assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="../assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="../assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="../assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="../assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="../assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="../assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="../assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="../assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="../assets/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="../assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff"> </head>
<!-- END HEAD -->

<body class="page-container-bg-solid">
<div class="page-wrapper">
    <div class="page-wrapper-row">
        <div class="page-wrapper-top">
            <!-- BEGIN HEADER -->
            <div class="page-header">
                <!-- BEGIN HEADER TOP -->
                <div class="page-header-top">
                    <div class="container">
                        <!-- BEGIN LOGO -->
                        <div class="page-logo">
                            <a href="../index.php">
                                <img src="../assets/layouts/layout3/img/logo-default.png" alt="logo" class="logo-default">
                            </a>
                        </div>
                        <!-- END LOGO -->
                        <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                        <a href="javascript:;" class="menu-toggler"></a>
                        <!-- END RESPONSIVE MENU TOGGLER -->
                        <!-- BEGIN TOP NAVIGATION MENU -->
                        <div class="top-menu" >
                            <ul class="nav navbar-nav pull-right">
                                <!-- BEGIN USER LOGIN DROPDOWN -->
                                <li class="dropdown dropdown-user dropdown-dark">
                                    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                                        <img alt="" class="img-circle" src="../assets/layouts/layout3/img/avatar9.jpg">
                                        <span class="username username-hide-mobile"><?php echo $username ?></span> <i class="glyphicon glyphicon-menu-down"></i>
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-default">
                                        <li>
                                            <a href="../profile.php">
                                                <i class="icon-user"></i> My Profile </a>
                                        </li>
                                        <li>
                                            <a href="../functions/logout.php">
                                                <i class="icon-key"></i> Log Out </a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- END USER LOGIN DROPDOWN -->
                            </ul>
                        </div>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
                <!-- END HEADER TOP -->
                <!-- BEGIN HEADER MENU -->
                <div class="page-header-menu">
                    <div class="container">
                        <!-- BEGIN MEGA MENU -->
                        <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                        <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                        <div class="hor-menu  ">
                            <ul class="nav navbar-nav">
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                    <a href="../index.php"> Dashboard
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                    <a href="../members/members.php"> Members
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                    <a href="javascript:;"> Attendances
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li aria-haspopup="true" class=" ">
                                            <a href="../attendances/attendances.php" class="nav-link">
                                                <i class="icon-users"></i> Members Attendances
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="">
                                            <a href="../attendances/workers_attendances.php" class="nav-link">
                                                <i class="icon-briefcase"></i> Workers Attendances</a>
                                        </li>
                                    </ul>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown  mega-menu-full">
                                    <a href="../groups/groups.php"> Groups
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                    <a href="../families/families.php"> Families
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                    <a href="../departments/departments.php"> Departments
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                    <a href="../schools/schools.php"> Schools
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown active">
                                    <a href="javascript:;"> Workers
                                        <span class="arrow"></span>
                                    </a>
                                    <ul class="dropdown-menu pull-left">
                                        <li aria-haspopup="true" class=" ">
                                            <a href="allworkers.php" class="nav-link">
                                                <i class="icon-users"></i> All Workers
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class=" active">
                                            <a href="ambworkers.php" class="nav-link active">
                                                <i class="icon-users"></i> Ambassador Workers</a>
                                        </li>
                                    </ul>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                    <a href="../messaging/messaging.php"> Messaging
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                                <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                    <a href="../search/search.php"> Search
                                        <span class="arrow"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- END MEGA MENU -->
                    </div>
                </div>
                <!-- END HEADER MENU -->
            </div>
            <!-- END HEADER -->
        </div>
    </div>
    <div class="page-wrapper-row full-height">
        <div class="page-wrapper-middle">
            <!-- BEGIN CONTAINER -->
            <div class="page-container">
                <!-- BEGIN CONTENT -->
                <div class="page-content-wrapper">
                    <!-- BEGIN CONTENT BODY -->
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <div class="container">
                            <!-- BEGIN PAGE TITLE -->
                            <div class="page-title">
                                <h1>Ambassador Workers
                                    <small>View Total Ambassador Workers</small>
                                </h1>
                            </div>
                            <!-- END PAGE TITLE -->
                        </div>
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE CONTENT BODY -->
                    <div class="page-content">
                        <div class="container">
                            <!-- BEGIN PAGE BREADCRUMBS -->
                            <ul class="page-breadcrumb breadcrumb">
                                <li>
                                    <a href="../index.php">Home</a>
                                    <i class="fa fa-circle"></i>
                                </li>
                                <li>
                                    <span>Ambassador Workers</span>
                                </li>
                            </ul>
                            <div class="btn-group">
<!--                                <a href='add_member.php' id="sample_editable_1_new" class="btn sbold blue"> Add New-->
<!--                                    <i class="fa fa-plus"></i>-->
<!--                                </a> -->
                                <button type="button" data-toggle="modal" data-target="#add_gallery_modal" class="btn sbold blue" style="color:#ffffff; margin-left: 20px">
                                    <i class="fa fa-plus"></i> Add New
                                </button>

                            </div><br><br>
                            <!-- END PAGE BREADCRUMBS -->
                            <!-- BEGIN PAGE CONTENT INNER -->
                            <div class="page-content-inner">
                                <div class="mt-content-body">
                                    <div class="portlet box blue">
                                        <div class="portlet-title">
                                            <div class="caption">
                                                <i class="fa fa-users"></i>Ambassador Workers</div>
                                            <div class="tools"> </div>
                                        </div>
                                        <div class="portlet-body">
                                            <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                <thead>
                                                <tr>
                                                    <th> <strong>S/N</strong> </th>
                                                    <th> <strong>Full Name</strong> </th>
                                                    <th> <strong>Phone Number </strong></th>
                                                    <th> <strong>Home Address </strong></th>
                                                    <th> <strong>Department</strong> </th>
                                                    <th> <strong>Occupation</strong> </th>
                                                    <th><strong>Parish</strong></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php  $sql=mysqli_query($connect, "SELECT * FROM amb_worker_table WHERE deleted=0") or die("Unable to Process request for workers");
                                                if(!empty($sql)){
                                                    $j=0;
                                                    foreach($sql as $data){
                                                        $j++;
                                                        ?>
                                                        <tr>
                                                            <td> <?php echo $j ?> </td>
                                                            <td> <?php echo $data['Full_Name'] ; ?> </td>
                                                            <td> <?php echo $data['Phone_Number']; ?> </td>
                                                            <td> <?php echo $data['Home_Address']; ?> </td>
                                                            <td> <?php echo $data['Department']; ?> </td>
                                                            <td> <?php echo $data['Occupation']; ?> </td>
                                                            <td> <?php echo $data['Parish']; ?> </td>
                                                        </tr>
                                                    <?php }} ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- END PAGE CONTENT INNER -->
                        </div>
                    </div>
                    <!-- END PAGE CONTENT BODY -->
                    <!-- END CONTENT BODY -->
                </div>
                <!-- END CONTENT -->
            </div>
            <!-- END CONTAINER -->
        </div>
        <div class="modal fade" id="add_gallery_modal" tabindex="-1" role="dialog"
             aria-labelledby="gallerymodalTitle"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="max-width: 1000px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addgallerymodalTitle"> Add Worker</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="#" method="POST"  enctype="multipart/form-data" novalidate>
                            <div class="message"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Surname</label>
                                        <input type="text" placeholder="John" name='surname' id='surname' class="form-control" required/>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input type="text" placeholder="Doe" name="first_name" id='first_name' class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <select class="form-control" name="gender" id='gender'>
                                            <option value="">----  Select Option ----</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="tel" placeholder="+233 (0)6767 767 333" name='phone' id="phone" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <input type="text" placeholder="E.g rccg@ghana.com" name="email" id='email' class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <div class="input-group input-medium date date-picker" data-date-format="yyyy-mm-dd">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control" name="dob" id="dob">
                                        </div>
                                        <span class="help-block">  YYYY-MM-DD </span>
                                    </div>
                                </div>
                            </div>
                            <!--Second Row-->
                            <div class="row">
                            </div>
                            <!--Third Row-->
                            <div class="row">
                            </div>
                            <!--fourth Row-->
                            <div class="row">
                                <div class="col-md-4"><div class="form-group">
                                        <label class="control-label">Country</label>
                                        <select class="form-control" name="country" id="country">
                                            <option value="">----  Select Option ----</option>
                                            <?php
                                            $check=mysqli_query($connect, "SELECT * FROM countries ORDER BY name ASC");
                                            foreach($check as $get){
                                                ?>
                                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div></div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for='occupation'>Occupation</label>
                                        <select class="form-control" onchange="select(this)" name="occupation" id='occupation'>
                                            <option value="">----  Select Option ----</option>
                                            <option value="worker">Worker</option>
                                            <option value="student">Student</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" id='school2' name='school2' style="display: none;">Select School</label>
                                        <select class="form-control" name="school" id="school"  style="display: none;">
                                            <option value="">----  Select School ----</option>
                                            <?php
                                            $check=mysqli_query($connect, "SELECT * FROM schools ORDER BY name ASC");
                                            foreach($check as $get){
                                                ?>
                                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <textarea class="form-control" rows="5" name="address" id="address" placeholder="Enter Home Address" style="resize: none;" required></textarea>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Martial status</label>
                                        <select class="form-control" name="martial_status" id="martial_status">
                                            <option value="">----  Select Option ----</option>
                                            <option value="married">Married</option>
                                            <option value="single">Single</option>
                                            <option value="divorce">Divorce</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Family</label>
                                        <select class="form-control" name="family" id="family">
                                            <option value="">----  Select Option ----</option>
                                            <?php
                                            $check=mysqli_query($connect, "SELECT * FROM families ORDER BY name ASC");
                                            foreach($check as $get){
                                                ?>
                                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--                            <div class="row">-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label class="control-label">Department</label>-->
                            <!--                                            <select class="form-control" name="dept" id="dept">-->
                            <!--                                                <option value="">----  Select Option ----</option>-->
                            <!--                                                --><?php //
                            //                                $check=mysqli_query($connect, "SELECT * FROM departments ORDER BY name ASC");
                            //                                foreach($check as $get){
                            //                            ?>
                            <!--                                    <option value="--><?php //echo $get['id'] ?><!--">--><?php //echo $get['name'] ?><!--</option>-->
                            <!--                                --><?php //} ?>
                            <!--                                            </select>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                                <div class="col-md-6">-->
                            <!--                                    <div class="form-group">-->
                            <!--                                        <label class="control-label">Group</label>-->
                            <!--                                            <select class="form-control" name="group" id="group">-->
                            <!--                                                <option value="">----  Select Option ----</option>-->
                            <!--                                                 --><?php //
                            //                                $check=mysqli_query($connect, "SELECT * FROM groups ORDER BY name ASC");
                            //                                foreach($check as $get){
                            //                            ?>
                            <!--                                    <option value="--><?php //echo $get['id'] ?><!--">--><?php //echo $get['name'] ?><!--</option>-->
                            <!--                                --><?php //} ?>
                            <!--                                            </select>-->
                            <!--                                    </div>-->
                            <!--                                </div>-->
                            <!--                            </div>-->
                            <div class="margiv-top-10">
                                <button type="submit" name="submit" id="submit" class="btn green"> Add member </button>
                                <a href="members.php" class="btn default"> Cancel </a>
                            </div>
                        </form>
                    </div>
                    <!--<div class="modal-footer">-->
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <!--<button type="submit" class="btn btn-primary" onclick="addGallery()" id="addGallery"  name="editGallery">Add</button>-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="page-wrapper-row">
        <div class="page-wrapper-bottom">
            <!-- BEGIN FOOTER -->
            <!-- BEGIN INNER FOOTER -->
            <div class="page-footer">
                <div class="container"> <script>var currentYear = new Date().getFullYear();document.write(currentYear);</script> &copy; RCCG CMS By
                    <a target="_blank" href="https://facebook.com/kosicollins">KED System</a> &nbsp;|&nbsp;
                    <a href="http://rccgambghana.org" title="The Redeem Christian Church, The Ambassador" target="_blank">The Ambassador</a>
                </div>
            </div>
            <div class="scroll-to-top">
                <i class="icon-arrow-up"></i>
            </div>
            <!-- END INNER FOOTER -->
            <!-- END FOOTER -->
        </div>
    </div>
</div>
<div class="quick-nav-overlay"></div>
<!-- END QUICK NAV -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script>
<script src="../assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
<!-- BEGIN CORE PLUGINS -->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/scripts/datatable.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/datatables.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN THEME GLOBAL SCRIPTS -->
<script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
<!-- END THEME GLOBAL SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/pages/scripts/table-datatables-buttons.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME LAYOUT SCRIPTS -->
<script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
<script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
<script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
<!-- END THEME LAYOUT SCRIPTS -->
</body>

</html>