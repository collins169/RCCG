<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

//..... Database Connection Configuration Start................................................................
include 'db.php';

//.................................. Start---------Reseting the attendances table after 2 days
$sql=mysqli_query($connect, "SELECT * FROM attendances WHERE marked=1") or die("Unable to process request attend");
$check=mysqli_fetch_array($sql);

    $time=time();
    if($check['created'] <= date("Y-m-d H:i:s", $time)){

        $modified=date ("Y-m-d H:i:s", $time);
        $sql=mysqli_query($connect, "UPDATE attendances SET marked=0, modified='$modified'")or die('Unable to proess request');
    }
//.................................. Stop---------Reseting the attendances table after 2 days

//.................................. Start---------Selecting members birthday that is today

$date=date("m-d", $time);
$bday=mysqli_query($connect, "SELECT * FROM members")or die('Unable to process request');
$db=mysqli_fetch_array($bday);
$dob=date ("m-d", strtotime($db['dob']));
// if($dob==$date){

// }

//---------------------------------- Counting all members in the database -------------------------------------------------//
$sql1=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM members WHERE deleted=0")or die("Unable to process request memebr");
$result=mysqli_fetch_array($sql1);
$totalmember=$result[0];

//.................................. Start---------Counting all members in the database that are male
$sql2=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM members WHERE deleted=0 AND gender='male'")or die("Unable to process request memebr");
$result2=mysqli_fetch_array($sql2);
$totalmale=$result2[0];
//.................................. Stop---------Counting all members in the database that are male

//.................................. Start---------Counting all members in the database that are female
$sql3=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM members WHERE deleted=0 AND gender='female'")or die("Unable to process reques");
$result3=mysqli_fetch_array($sql3);
$totalfemale=$result3[0];
//.................................. Stop---------Counting all members in the database that are female

//.................................. Start---------Counting all members in the database that are student
$sql4=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM members WHERE deleted=0 AND occupation='student'")or die("Unable to process reques");
$result4=mysqli_fetch_array($sql4);
$totalstudent=$result4[0];
//.................................. Stop---------Counting all members in the database that are student

//.................................. Start---------Counting all members in the database that are workers
$sql5=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM workers WHERE deleted=0")or die("Unable to process reques");
$result5=mysqli_fetch_array($sql5);
$totalworkers=$result5[0];
//.................................. Stop---------Counting all members in the database that are workers
$attendance_time = date ("Y-m-d", time());
$sql6=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM attendances WHERE marked=1 AND attendance_date='".$attendance_time."' ")or die("Unable to process reque");
$result6=mysqli_fetch_array($sql6);
$present = $result6[0];

//$sql7=mysqli_query($connect, "SELECT * FROM attendances WHERE marked=1 AND attendance_date='$attendance_time'")or die("Unable to process request");
//$total7=mysqli_fetch_array($sql7);

//if(mysqli_num_rows($sql7)>0){
//    $sql8=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM members WHERE id!=".$total7[members_id]." ")or die("Unable to process requ");
//    $total8=mysqli_fetch_array($sql8);
//    $absent = $total8[0];
//}else {
//    $absent=0;
//}

$sql7 = mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM attendances WHERE marked=1  AND attendance='Early rain' AND attendance_date='".$attendance_time."' ")or die("Unable to process earlyrain");
$result7 = mysqli_fetch_array($sql7);
$early_rain = $result7[0];


$sql8 = mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM attendances WHERE marked=1 AND attendance='Latter rain' AND attendance_date='".$attendance_time."' ")or die("Unable to process latterrain");
$result8 = mysqli_fetch_array($sql8);
$latter_rain = $result8[0];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>The Ambassador CMS | Dashboard</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.min.css" rel="stylesheet" type="text/css">
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/fullcalendar/fullcalendar.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <link href="assets/layouts/layout3/css/layout.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/layouts/layout3/css/themes/default.min.css" rel="stylesheet" type="text/css" id="style_color" />
        <link href="assets/layouts/layout3/css/custom.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME LAYOUT STYLES -->
        <link rel="apple-touch-icon" sizes="57x57" href="assets/favicon/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="assets/favicon/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="assets/favicon/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="assets/favicon/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="assets/favicon/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="assets/favicon/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="assets/favicon/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="assets/favicon/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="assets/favicon/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="assets/favicon/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="assets/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="assets/favicon/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png">
        <link rel="manifest" href="assets/favicon/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
<!--
    </head>
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
                                    <a href="index.php">
                                        <img src="assets/layouts/layout3/img/logo-default.png" alt="logo" class="logo-default">
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
                                                <img alt="" class="img-circle" src="assets/layouts/layout3/img/avatar9.jpg">
                                                <span class="username username-hide-mobile"><?php echo $username ?></span> <i class="glyphicon glyphicon-menu-down"></i>
                                            </a>
                                            <ul class="dropdown-menu dropdown-menu-default">
                                                <li>
                                                    <a href="profile.php">
                                                        <i class="icon-user"></i> My Profile </a>
                                                </li>
                                                <li>
                                                    <a href="functions/logout.php">
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
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown  active ">
                                            <a href="index.php"> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown">
                                            <a href="members/members.php"> Members
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
                                            <a href="groups/groups.php"> Groups
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="families/families.php"> Families
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="departments/departments.php"> Departments
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="schools/schools.php"> Schools
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="javascript:;"> Workers
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" active">
                                                    <a href="workers/allworkers.php" class="nav-link">
                                                        <i class="icon-users"></i> All Workers
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="workers/ambworkers.php" class="nav-link  ">
                                                        <i class="icon-users"></i> Ambassador Workers</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="messaging/messaging.php"> Messaging
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="search/search.php"> Search
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
                                        <h1>Dashboard
                                            <small>dashboard & statistics</small>
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
                                            <a href="index.php">Home</a>
                                            <i class="fa fa-circle"></i>
                                        </li>
                                        <li>
                                            <span>Dashboard</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <div class="row widget-row">
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Members</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-blue-steel icon-people"></i>
                                                    <div class="widget-thumb-body">
<!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $totalmember?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Female Member</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-blue-sharp icon-user-female"></i>
                                                    <div class="widget-thumb-body">
<!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $totalfemale ?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Male Member</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-blue icon-user"></i>
                                                    <div class="widget-thumb-body">
<!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $totalmale ?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Church Workers</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-blue icon-briefcase"></i>
                                                    <div class="widget-thumb-body">
<!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $totalworkers ?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                    </div>
                                    <div class="row widget-row">
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Students</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-yellow-gold icon-graduation"></i>
                                                    <div class="widget-thumb-body">
                                                        <!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $totalstudent?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Present Today</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-green icon-bar-chart"></i>
                                                    <div class="widget-thumb-body">
                                                        <!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $present ?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Early Rain Service</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-purple icon-bar-chart"></i>
                                                    <div class="widget-thumb-body">
                                                        <!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $early_rain ?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                        <div class="col-md-3">
                                            <!-- BEGIN WIDGET THUMB -->
                                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 ">
                                                <h4 class="widget-thumb-heading">Total Latter Rain Service</h4>
                                                <div class="widget-thumb-wrap">
                                                    <i class="widget-thumb-icon bg-purple-seance icon-bar-chart"></i>
                                                    <div class="widget-thumb-body">
                                                        <!--                                                        <span class="widget-thumb-subtitle">USD</span>-->
                                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="<?php echo $latter_rain ?>">0</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END WIDGET THUMB -->
                                        </div>
                                    </div>
                                    <!-- BEGIN PAGE CONTENT INNER -->
<!--                                    <div class="page-content-inner">-->
<!--                                        <div class="mt-content-body">-->
<!--                                            <div class="portlet box blue">-->
<!--                                                    <div class="portlet-title">-->
<!--                                                        <div class="caption">-->
<!--                                                            <i class="fa fa-sitemap"></i>Members statics</div>-->
<!--                                                        <div class="tools"> </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="portlet-body">-->
<!--                                                        <div class="stat-left">-->
<!--                                                                        <div id="chartContainer" style="height: 300px; width: 100%;"></div>-->
<!--                                                                    </div>-->
<!--                                                    </div>-->
<!--                                                    <div class="portlet-body">-->
<!--                                                        <div class="stat-left">-->
<!--                                                                        <div id="chartContainer2" style="height: 300px; width: 100%;"></div>-->
<!--                                                                    </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                        </div>-->
<!--                                    </div>-->
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
        <!-- END QUICK NAV -->
        <!--[if lt IE 9]>
<script src="assets/global/plugins/respond.min.js"></script>
<script src="assets/global/plugins/excanvas.min.js"></script>
<script src="assets/global/plugins/ie8.fix.min.js"></script>
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/moment.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.waypoints.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/counterup/jquery.counterup.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <script src="assets/global/scripts/canvasjs.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>