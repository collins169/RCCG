<?php include '../functions/db.php'; 
$time=time();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>The Ambassador CMS | Wokers Attendances</title>
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
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown ">
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
                                                <li aria-haspopup="true" class=" active">
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
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="javascript:;"> Workers
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="../workers/allworkers.php" class="nav-link">
                                                        <i class="icon-users"></i> All Workers
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="../workers/ambworkers.php" class="nav-link">
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
                                        <h1>Attendances
                                            <small>View Total Attendances</small>
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
                                            <span>Attendances</span>
                                        </li>
                                    </ul>
                                     <div class="btn-group">
                                        <a href='workers_attendances_record.php' id="sample_editable_1_new" class="btn sbold blue"> <i class="icon icon-eye"></i> View Records
                                        </a>
                                      </div><br><br>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="mt-content-body">
                                            <div class="portlet box blue">
                                                    <div class="portlet-title">
                                                        <div class="caption">
                                                            <i class="fa fa-bar-chart"></i> New Attendances for <?php echo date('d M, Y', time()); ?></div>
                                                        <div class="tools"> </div>
                                                    </div>
                                                    <div class="portlet-body">
                                                        <table class="table table-striped table-bordered table-hover" id="sample_2">
                                                            <thead>
                                                                <tr>
                                                                    <th> No </th>
                                                                    <th> Full Name </th>
<!--                                                                    <th> First name </th>-->
                                                                    <th> Phone </th>
                                                                    <th> Early Rain Service </th>
                                                                    <th> Latter Rain Service </th>
                                                                    <th> Both Service </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
            <?php  $sql=mysqli_query($connect, "SELECT * FROM amb_worker_table WHERE deleted=0") or die("Unable to Process request member");
                     if(!empty($sql)){
                        $j=0;
                        foreach($sql as $data){
                            $j++;
            ?>
                                                                <tr>
                                                                    <td> <?php echo $j ?> </td>
                                                                    <td> <?php echo $data['Full_Name']; ?> </td>
                                                                    <td> <?php echo $data['Phone_Number']; ?> </td>
<!--                                                                    <td> --><?php //echo $data['phone']; ?><!-- </td>-->
                                                                    <td> 
                                <?php 
                                $sql=mysqli_query($connect, "SELECT * FROM workers_attendances WHERE members_id='$data[id]' AND attendance='Early rain' AND marked=1") or die("Unable to process request");
                                    $check=mysqli_fetch_assoc($sql);
                                    $mark=$check['marked'];
                                    if(mysqli_num_rows($sql)==1){
                                 ?>
                                                                        <div class="btn-group">
                                                                                    <a class="btn btn-xs red"
                                                                                        <i class="icon-check" disabled="disabled"></i> Marked</a>
                                                                        </div> 
                                    <?php }elseif(!empty($sql)){?>
                                                                <div class="btn-group">
                                                                                    <a class="btn btn-xs blue" id="earlyrain<?php echo $data['id'] ?>"  onclick='earlyRain(<?php echo $data['id'] ?>)'>
                                                                                        <i class="icon-check" ></i> PRESENT</a>
                                                                        </div> 
                                        <?php }else{echo "Marked";} ?>

                                                                    </td>
                                                                     <td> 
                                <?php 
                                $sql2=mysqli_query($connect, "SELECT * FROM workers_attendances WHERE members_id='$data[id]' AND attendance='Latter rain' AND marked=1") or die("Unable to process request");
                                    $check2=mysqli_fetch_assoc($sql2);
                                    $mark=$check2['marked'];
                                    if(mysqli_num_rows($sql2)==1){
                                 ?>
                                                                        <div class="btn-group">
                                                                                    <a class="btn btn-xs red"
                                                                                        <i class="icon-check" disabled="disabled"></i> Marked</a>
                                                                        </div> 
                                    <?php }elseif(!empty($sql2)){?>
                                                                <div class="btn-group">
                                                                                    <a class="btn btn-xs blue" id="latterrain<?php echo $data['id'] ?>"  onclick='latterRain(<?php echo $data['id'] ?>)'>
                                                                                        <i class="icon-check"></i> PRESENT</a>
                                                                        </div> 
                                        <?php }else{echo "Marked";} ?>

                                                                    </td>
                                        <?php if(mysqli_num_rows($sql)==1 && mysqli_num_rows($sql2)==1){ ?>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a class="btn btn-xs red"
                                                                            <i class="icon-check" disabled="disabled"></i> Marked</a>
                                                                        </div>
                                                                    </td>
                                        <?php }elseif(!empty($sql) && !empty($sql2)){ ?>

                                            <td>
                                                <div class="btn-group">
                                                    <a class="btn btn-xs blue" id="bothservice<?php echo $data['id'] ?>"  onclick='bothService(<?php echo $data['id'] ?>)'>
                                                        <i class="icon-check"></i> PRESENT</a>
                                                </div>
                                            </td>
                                        <?php } ?>
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
        <script>
            function earlyRain(id) {
                $.ajax({
                    url: 'workers_earlyrain.php?id='+id,
                    method: 'GET',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    async: false,
                    success: function (data) {
                        if(data.code === 0 || data.message === 'SUCCESS'){
                            // swal({
                            //     title: "Success",
                            //     text: "Marked Successfully",
                            //     type: "success",
                            //     confirmButtonClass: "btn-success",
                            //     confirmButtonText: "ok",
                            // });
                            $('#earlyrain'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                            console.log(data);
                        }
                    },
                    error: function (error) {
                        console.log('Error: ');
                        console.log(error);
                    }
                });
            }
            function latterRain(id) {
                $.ajax({
                    url: 'workers_latterrain.php?id='+id,
                    method: 'GET',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    async: false,
                    success: function (data) {
                        if(data.code === 0 || data.message === 'SUCCESS'){
                            // swal({
                            //     title: "Success",
                            //     text: "Marked Successfully",
                            //     type: "success",
                            //     confirmButtonClass: "btn-success",
                            //     confirmButtonText: "ok",
                            // });
                            $('#latterrain'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                            console.log(data);
                        }
                    },
                    error: function (error) {
                        console.log('Error: ');
                        console.log(error);
                    }
                });
            }

            function bothService(id) {
                $.ajax({
                    url: 'workers_bothService.php?id='+id,
                    method: 'GET',
                    dataType: 'json',
                    contentType: false,
                    cache: false,
                    processData:false,
                    async: false,
                    success: function (data) {
                        if(data.code === 0 || data.message === 'SUCCESS'){
                            // swal({
                            //     title: "Success",
                            //     text: "Marked Successfully",
                            //     type: "success",
                            //     confirmButtonClass: "btn-success",
                            //     confirmButtonText: "ok",
                            // });
                            $('#earlyrain'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                            $('#latterrain'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                            $('#bothservice'+id).html('Marked').removeClass('blue').addClass('red','disabled').attr("disabled", "disabled");
                            console.log(data);
                        }
                    },
                    error: function (error) {
                        console.log('Error: ');
                        console.log(error);
                    }
                });
            }
        </script>
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