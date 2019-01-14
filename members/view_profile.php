<?php include 'functions/db.php'; 
if(isset($_GET['view'])){
    $id=$_GET['view'];
//-----------------------------------------Getting member details ........................................

    $check=mysqli_query($connect, "SELECT * FROM members WHERE id=$id") or die("Unable to process request");
    $members=mysqli_fetch_assoc($check);

    $image=$members['image'];
    $surname=$members['surname'];
    $middle_name=$members['middle_name'];
    $first_name=$members['first_name'];
    $phone=$members['phone'];
    $other_phone=$members['other_phone'];
    $gender=$members['gender'];
    $dob=$members['dob'];
    $join_date=$members['date_joined'];
    $email=$members['email'];
    $occupation=$members['occupation'];
    $address=$members['address'];
    $martial_status=$members['martial_status'];
    $family_id=$members['families_id'];
    $dept_id=$members['departments_id'];
    $group_id=$members['groups_id'];
    $school_id=$members['schools_id'];
    $country_id=$members['countries_id'];
    if ($members['deleted']==0) {
        $status="<strong style='color:green'>Active</strong>";
    }else{
         $status="<strong style='color:red'>Inactive</strong>";
    }

//-----------------------------------------Getting family name ........................................
    $fam=mysqli_query($connect, "SELECT * FROM families WHERE id=$family_id") or die("Unable to process request");
    $s=mysqli_fetch_assoc($fam);
    $family=$s['name'];

//-----------------------------------------Getting department name ........................................
    $fam1=mysqli_query($connect, "SELECT * FROM departments WHERE id=$dept_id") or die("Unable to process request");
    $s1=mysqli_fetch_assoc($fam1);
    $dept=$s1['name'];

//-----------------------------------------Getting group name ........................................
    $fam2=mysqli_query($connect, "SELECT * FROM groups WHERE id=$group_id") or die("Unable to process request");
    $s2=mysqli_fetch_assoc($fam2);
    $group=$s2['name'];

//-----------------------------------------Getting School name ........................................
    $fam3=mysqli_query($connect, "SELECT * FROM schools WHERE id=$school_id") or die("Unable to process request");
    $s3=mysqli_fetch_assoc($fam3);
    $school=$s2['name'];

//-----------------------------------------Getting country name ........................................
    $fam3=mysqli_query($connect, "SELECT * FROM countries WHERE id=$country_id") or die("Unable to process request");
    $s3=mysqli_fetch_assoc($fam3);
    $country=$s3['name'];

//---------------------------Getting Total number of been present ........................................
$count=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM attendances WHERE members_id=$id AND status='present'") or die("Unable to process request");
    $s4=mysqli_fetch_assoc($count);
    $present=$s4['COUNT'];

//---------------------------Getting Total number of been present ........................................
$sql5=mysqli_query($connect, "SELECT * FROM attendances WHERE marked=1 OR marked=0 ")or die("Unable to process request");
$total5=mysqli_fetch_array($sql5);

$sql6=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM members WHERE id!=$total5[members_id]")or die("Unable to process request");
$total6=mysqli_fetch_array($sql6);
$absent=$total6['COUNT'];

}else{
                                                echo "<script>alert('Member does not exist')
                                                window.location.href='members.php'</script>
                                                        ";
                                            }
?>
<!DOCTYPE html>
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>The Ambassador CMS | View Member</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for user account page" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
         <link href="assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
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
                        <div class="page-header-menu ">
                            <div class="container">
                                <!-- BEGIN MEGA MENU -->
                                <!-- DOC: Apply "hor-menu-light" class after the "hor-menu" class below to have a horizontal menu with white background -->
                                <!-- DOC: Remove data-hover="dropdown" and data-close-others="true" attributes below to disable the dropdown opening on mouse hover -->
                                <div class="hor-menu  ">
                                    <ul class="nav navbar-nav">
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="index.php"> Dashboard
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown  active">
                                            <a href="members.php"> Members
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="attendances.php"> Attendances
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown  mega-menu-full" >
                                            <a href="groups.php"> Groups
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="families.php"> Families
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="departments.php"> Departments
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="schools.php"> Schools
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown">
                                            <a href="javascript:;"> Workers
                                                <span class="arrow"></span>
                                            </a>
                                            <ul class="dropdown-menu pull-left">
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="allworkers.php" class="nav-link">
                                                        <i class="icon-users"></i> All Workers
                                                    </a>
                                                </li>
                                                <li aria-haspopup="true" class=" ">
                                                    <a href="ambworkers.php" class="nav-link">
                                                        <i class="icon-users"></i> Ambassador Workers</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="messaging.php"> Messaging
                                                <span class="arrow"></span>
                                            </a>
                                        </li>
                                        <li aria-haspopup="true" class="menu-dropdown classic-menu-dropdown ">
                                            <a href="search.php"> Search
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
                                        <h1><?php echo "".$surname." ". $first_name."" ?>
                                            <small>user account page</small>
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
                                            <span>User</span>
                                        </li>
                                    </ul>
                                    <!-- END PAGE BREADCRUMBS -->
                                    <!-- BEGIN PAGE CONTENT INNER -->
                                    <div class="page-content-inner">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <!-- BEGIN PROFILE SIDEBAR -->
                                                <div class="profile-sidebar">
                                                    <!-- PORTLET MAIN -->
                                                    <div class="portlet light profile-sidebar-portlet ">
                                                        <!-- SIDEBAR USERPIC -->
                                                        <div class="profile-userpic">
                                                            <?php if(!empty($image)){ ?>
                                                            <img src="<?php echo $image ?>" class="img-responsive" style="width:200px; height:200px" alt="">
                                                        <?php }else{ ?>
                                                            <?php if($gender=='male'){ ?>
                                                            <img src="assets/images/male.png" class="img-responsive" alt="">
                                                            <?php }else{ ?> 
                                                            <img src="assets/images/female.ico" class="img-responsive" alt="">
                                                            <?php } ?>
                                                            <?php } ?>
                                                        </div>
                                                        <!-- END SIDEBAR USERPIC -->
                                                        <!-- SIDEBAR USER TITLE -->
                                                        <div class="profile-usertitle">
                                                            <div class="profile-usertitle-name"> <?php echo "".$surname." ". $first_name."" ?> </div>
                                                            <div class="profile-usertitle-job"> <?php echo $status ?> </div>
                                                        </div>
                                                        <!-- END SIDEBAR USER TITLE -->
                                                        <!-- SIDEBAR BUTTONS -->
                                                        <div class="profile-userbuttons">
                                                            <button type="button" value="edit_member.php?edit=<?php echo $id ?>" class="btn btn-circle green btn-sm" id='edit'>Edit</button>
                                                            <?php if($members['deleted']==0){ ?>
                                                            <button type="button" class="btn btn-circle red btn-sm" id='activate' value="members.php?deactivate=<?php echo $id ?>">Deactivate</button>
                                                            <?php }else{ ?>
                                                            <button type="button" class="btn btn-circle green btn-sm" id='activate' value="members.php?activate=<?php echo $id ?>">Activate</button>
                                                            <?php } ?>
                                                        </div>
                                                        <!-- END SIDEBAR BUTTONS -->
                                                        <!-- SIDEBAR MENU -->
                                                        <div class="profile-usermenu">
                                                            <ul class="nav">
                                                            </ul>
                                                        </div>
                                                        <!-- END MENU -->
                                                    </div>
                                                    <!-- END PORTLET MAIN -->
                                                    <!-- PORTLET MAIN -->
                                                    <div class="portlet light ">
                                                        <!-- STAT -->
                                                        <div class="row list-separated profile-stat">
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <div class="uppercase profile-stat-title"> <?php echo $present ?> </div>
                                                                <div class="uppercase profile-stat-text"> Presences </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-6 col-xs-6">
                                                                <div class="uppercase profile-stat-title"> <?php echo $absent ?> </div>
                                                                <div class="uppercase profile-stat-text"> Absences </div>
                                                            </div>
                                                        </div>
                                                        <!-- END STAT -->
                                                        <div>
                                                            <h4 class="profile-desc-title">Details</h4>
                                                            <div class="margin-top-20 profile-desc-link"><span><strong>Family:</strong></span> <?php echo $family ?>
                                                            </div>
                                                            <div class="margin-top-20 profile-desc-link">
                                                                <span><strong>Group:</strong></span> <?php echo $group ?>
                                                            </div>
                                                            <div class="margin-top-20 profile-desc-link">
                                                                <span><strong>Department:</strong></span> <?php echo $dept ?>
                                                            </div>
                                                            <br>
                                                        </div>
                                                    </div>
                                                    <!-- END PORTLET MAIN -->
                                                </div>
                                                <!-- END BEGIN PROFILE SIDEBAR -->
                                                <!-- BEGIN PROFILE CONTENT -->
                                                <div class="profile-content">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="portlet light ">
                                                                <div class="portlet-title tabbable-line">
                                                                    <div class="caption caption-md">
                                                                        <i class="icon-globe theme-font hide"></i>
                                                                        <span class="caption-subject font-blue-madison bold uppercase">The Ambassador Member Details</span>
                                                                    </div>
                                                                    <ul class="nav nav-tabs">
                                                                        <li class="active">
                                                                            <a href="#tab_1_1" data-toggle="tab">Member Info</a>
                                                                        </li><!-- 
                                                                        <li>
                                                                            <a href="#tab_1_2" data-toggle="tab">Change Avatar</a>
                                                                        </li> -->
                                                                    </ul>
                                                                </div>
                    <div class="portlet-body">
                        <div class="tab-content">
                            <!-- PERSONAL INFO TAB -->
                    <div class="tab-pane active" id="tab_1_1">
                        <form role="form" action="#" method="POST">
                            <div class="message"></div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Surname</label>
                                        <input type="text" value='<?php echo $surname ?>'  class="form-control" disabled />
                                    </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Middle Name</label>
                                        <input type="text" value='<?php echo $middle_name ?>' class="form-control" disabled />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input type="text" value='<?php echo $first_name ?>' class="form-control" disabled /> 
                                    </div>
                                </div>
                            </div>
                            <!--Second Row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="tel" value='<?php echo $phone ?>' class="form-control" disabled /> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Other Phone</label>
                                        <input type="tel" value='<?php echo $other_phone ?>' class="form-control" disabled /> 
                                    </div>
                                </div>
                            </div>
                            <!--Third Row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <input class="form-control" value='<?php echo $gender ?>' disabled />
                                           
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Date of Birth</label>
                                        <div class="input-group input-medium date date-picker" data-date-format="dd/mm/yyyy">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control" value='<?php echo $dob ?>' disabled >
                                        </div>
                                        <span class="help-block"> DD/MM/YYYY </span> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Join Date</label>
                                        <input class="form-control input-medium date-picker" size="16" type="text" value='<?php echo $join_date ?>' data-date-format="dd/mm/yyyy" disabled />
                                        <span class="help-block"> DD/MM/YYYY </span> 
                                    </div>
                                </div>
                            </div>
                            <!--fourth Row-->
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                            <input type="text" value='<?php echo $email ?>' class="form-control" disabled /> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                            <input class="form-control" value='<?php echo $country ?>' disabled />
                                        </div>
                                    </div>
                                    <?php if($occupation=='worker'){ ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Occupation</label>
                                            <input type="text" value='<?php echo $occupation ?>' class="form-control" disabled /> 
                                    </div>
                                </div>
                                <?php }else{ ?>
                                    <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">School</label>
                                            <input type="text" value='<?php echo $school ?>' class="form-control" disabled /> 
                                    </div>
                                </div>
                                <?php } ?>
                            </div>
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                        <textarea class="form-control" rows="5" placeholder="Enter Home Address" style="resize: none;" disabled > <?php echo $address ?></textarea>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Martial status</label>
                                            <input class="form-control" value='<?php echo $martial_status ?>' disabled />
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Family</label>
                                            <input class="form-control" value='<?php echo $family ?>' disabled />
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Department</label>
                                            <input class="form-control" value='<?php echo $dept ?>' disabled />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Group</label>
                                            <input class="form-control" value='<?php echo $group ?>' disabled />
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
                                                                        <!-- END PERSONAL INFO TAB -->
                                                                        <!-- CHANGE AVATAR TAB -->
                                                                        <!-- <div class="tab-pane" id="tab_1_2">
                                                                            <p> Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa
                                                                                nesciunt laborum eiusmod. </p>
                                                                            <form action="#" role="form">
                                                                                <div class="form-group">
                                                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                                        <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                                            <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                                                        <div>
                                                                                            <span class="btn default btn-file">
                                                                                                <span class="fileinput-new"> Select image </span>
                                                                                                <span class="fileinput-exists"> Change </span>
                                                                                                <input type="file" name="..."> </span>
                                                                                            <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="clearfix margin-top-10">
                                                                                        <span class="label label-danger">NOTE! </span>
                                                                                        <span>Attached image thumbnail is supported in Latest Firefox, Chrome, Opera, Safari and Internet Explorer 10 only </span>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="margin-top-10">
                                                                                    <a href="javascript:;" class="btn green"> Submit </a>
                                                                                    <a href="javascript:;" class="btn default"> Cancel </a>
                                                                                </div>
                                                                            </form>
                                                                        </div> -->
                                                                        <!-- END CHANGE AVATAR TAB -->
                                    </div>
                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- END PROFILE CONTENT -->
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
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<script src="../assets/global/plugins/ie8.fix.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $("#edit").click(function(){
                    url=$(this).val();
                    document.location.href=url;
                });
                $("#activate").click(function(){
                    url=$(this).val();
                    document.location.href=url;
                });
                $("#deactivate").click(function(){
                    url=$(this).val();
                    document.location.href=url;
                });
            });
        </script>
        <script src="assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>