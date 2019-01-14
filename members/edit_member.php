<?php include '../functions/db.php';
if(isset($_GET['edit'])){
    $id=$_GET['edit'];
//-----------------------------------------Getting member details ........................................

    $check=mysqli_query($connect, "SELECT * FROM members WHERE id=$id") or die("Unable to process request members");
    $members=mysqli_fetch_assoc($check);

    $user_id=$members['id'];
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
    $school_id=$members['schools_id'];
    $dept_id=$members['departments_id'];
    $group_id=$members['groups_id'];
    $country_id=$members['countries_id'];

//-----------------------------------------Getting family name ........................................
    $fam=mysqli_query($connect, "SELECT * FROM families WHERE id=$family_id") or die("Unable to process request family");
    $s=mysqli_fetch_assoc($fam);
    $family=$s['name'];
    $family_id=$s['id'];

//-----------------------------------------Getting department name ........................................
    $fam1=mysqli_query($connect, "SELECT * FROM departments WHERE id=$dept_id") or die("Unable to process request departments");
    $s1=mysqli_fetch_assoc($fam1);
    $dept=$s1['name'];
    $dept_id=$s1['id'];

//-----------------------------------------Getting group name ........................................
    $fam2=mysqli_query($connect, "SELECT * FROM groups WHERE id=$group_id") or die("Unable to process request groups");
    $s2=mysqli_fetch_assoc($fam2);
    $group=$s2['name'];
    $group_id=$s2['id'];

//-----------------------------------------Getting country name ........................................
    $fam3=mysqli_query($connect, "SELECT * FROM countries WHERE id=$country_id") or die("Unable to process request country");
    $s3=mysqli_fetch_assoc($fam3);
    $country=$s3['name'];
    $country_id=$s3['id'];

//-----------------------------------------Getting country name ........................................
    $fam3=mysqli_query($connect, "SELECT * FROM schools WHERE id=$school_id") or die("Unable to process request School");
    $s3=mysqli_fetch_assoc($fam3);
    $school=$s3['name'];
    $school_id=$s3['id'];

//---------------------------Getting Total number of been present ........................................
$count=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM attendances WHERE members_id=$id AND status='present'") or die("Unable to process request ");
    $s4=mysqli_fetch_assoc($count);
    $present=$s4['COUNT'];

//---------------------------Getting Total number of been present ........................................
// $count1=mysqli_query($connect, "SELECT COUNT(*) AS COUNT FROM attendances WHERE members_id=$id AND status!='present") or die("Unable to process request");
//     $s5=mysqli_fetch_assoc($count1);
//     $absent=$s5['COUNT'];

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
        <title>The Ambassador CMS | Edit Member</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #3 for user account page" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
         <link href="../assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
        <link href="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="../assets/global/css/components.min.css" rel="stylesheet" id="style_components" type="text/css" />
        <link href="../assets/global/css/plugins.min.css" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="../assets/pages/css/profile.min.css" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
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
                    <div class="page-header-menu ">
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
                                        <li aria-haspopup="true" class="menu-dropdown mega-menu-dropdown active ">
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
                                    <h1>Edit Member | Account
                                        <small>Edit member</small>
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
                                        <span>Member</span>
                                    </li>
                                </ul>
                                <!-- END PAGE BREADCRUMBS -->
<!-- BEGIN PAGE CONTENT INNER -->
<div class="page-content-inner">
    <div class="row">
        <div class="col-md-12">
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
                        <form role="form"  method="POST" enctype="multipart/form-data" novalidate>
                            <div class="message"></div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php if(!empty($image)){ echo $image;}else{ echo'user-add.png';} ?>" alt="" /> </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                            <div>
                                                <span class="btn default btn-file">
                                                    <span class="fileinput-new"> Select image </span>
                                                    <span class="fileinput-exists"> Change </span>
                                                    <input type="file" name="image" id="image" accept="image/jpg, image/jpeg, image/png"> </span>
                                                <a href="javascript:;" class="btn default fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Surname</label>
                                        <input type="text" value="<?php echo $surname ?>" name='surname' id='surname' class="form-control"/>
                                        <input type="hidden" name="id" id="id" value="<?php echo $user_id ?>">
                                    </div>
                                 </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Middle Name</label>
                                        <input type="text" value="<?php echo $middle_name ?>" name='middle_name' id='middle_name' class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">First Name</label>
                                        <input type="text" value="<?php echo $first_name ?>" name="first_name" id='first_name' class="form-control"/> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Gender</label>
                                        <select class="form-control" name="gender" id='gender'>
                                            <?php if($gender=='male'){ ?>
                                            <option value="">----  Select Gender ----</option>
                                            <option value="male" selected>Male</option>
                                            <option value="female">Female</option>
                                            <?php }elseif($gender=='female'){ ?>
                                            <option value="">----  Select Gender ----</option>
                                            <option value="male">Male</option>
                                            <option value="female" selected>Female</option>
                                            <?php }else{ ?>
                                             <option value="">----  Select Option ----</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <?php } ?>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Mobile Number</label>
                                        <input type="tel" value="<?php echo $phone ?>" name='phone' id="phone" class="form-control" required/> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Other Phone</label>
                                        <input type="tel" value="<?php echo $other_phone ?>" name='other_phone' id='other_phone' class="form-control" /> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                            <input type="text" value="<?php echo $email ?>" name="email" id='email' class="form-control"/> 
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
                                            <input type="text" class="form-control" value="<?php echo $dob ?>" name="dob" id="dob">
                                        </div>
                                        <span class="help-block">  YYYY-MM-DD </span> 
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Join Date</label>
                                        <div class="input-group input-medium date date-picker" data-date-format="dd/mm/yyyy">
                                            <span class="input-group-btn">
                                                <button class="btn default" type="button">
                                                    <i class="fa fa-calendar"></i>
                                                </button>
                                            </span>
                                            <input type="text" class="form-control" value="<?php echo $join_date ?>" name="join_date" id="join_date">
                                        </div>
                                        <span class="help-block"> DD/MM/YYYY </span> 
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
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Country</label>
                                            <select class="form-control" name="country" id="country">
                                                 <option value="">----  Select Country ----</option><?php 
                                $check=mysqli_query($connect, "SELECT * FROM countries ORDER BY name ASC");
                                foreach($check as $get){
                            ?> 
                            
                            <?php if($get['name']==$country){ ?>
                                <option value="<?php echo $country_id ?>" selected><?php echo $country ?></option>
                                <?php }else { ?>
                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" for='occupation'>Occupation</label>
                                        <select class="form-control" onchange="select(this)" name="occupation" id='occupation'>
                                            <?php if($occupation=='worker'){ ?>
                                            <option value="">----  Select Occupation ----</option>
                                            <option value="worker" selected>Worker</option>
                                            <option value="student">Student</option>
                                            <?php }elseif($occupation=='student'){ ?>
                                            <option value="">----  Select Occupation ----</option>
                                            <option value="worker">Worker</option>
                                            <option value="student" selected>Student</option>
                                            <?php }else{ ?>
                                             <option value="">----  Select Occupation ----</option>
                                            <option value="worker">Worker</option>
                                            <option value="student">Student</option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <?php if($occupation=='student'){ ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" id='school2' name='school2' style="display: block;">Select School</label>
                                            <select class="form-control" name="school" id="school" style="display: block;">
                                                <option value="">----  Select School ----</option>
                                                <?php 
                                $check=mysqli_query($connect, "SELECT * FROM schools ORDER BY name ASC");
                                foreach($check as $get){
                            ?> 
                            
                            <?php if($get['name']==$school){ ?>
                                <option value="<?php echo $school_id ?>" selected><?php echo $school ?></option>
                                <?php }else { ?>
                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <?php }else{ ?>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label" id='school2' name='school2' style="display: none;">Select School</label>
                                            <select class="form-control" name="school" id="school" style="display: none;">
                                                <option value="">----  Select School ----</option>
                                                <?php 
                                $check=mysqli_query($connect, "SELECT * FROM schools ORDER BY name ASC");
                                foreach($check as $get){
                            ?>
                                    <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                <?php } ?>
                                            </select>
                                        </div>
                                </div> <?php } ?>
                            </div>
                            </div>
                                <div class="form-group">
                                    <label class="control-label">Address</label>
                                        <textarea class="form-control" rows="5" name="address" id="address" value='<?php echo $address ?>' style="resize: none;"><?php echo $address ?></textarea>
                                </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Martial status</label>
                                            <select class="form-control" name="martial_status" id="martial_status">
                                                <?php if($martial_status=='married'){ ?>
                                                <option value="">----  Select Option ----</option>
                                                <option value="married" selected>Married</option>
                                                <option value="single">Single</option>
                                                <option value="divorce">Divorce</option>
                                                <?php }elseif($martial_status=='single'){ ?>
                                                 <option value="">----  Select Option ----</option>
                                                <option value="married">Married</option>
                                                <option value="single" selected>Single</option>
                                                <option value="divorce">Divorce</option>
                                                <?php }elseif($martial_status=='divorce'){ ?>
                                                 <option value="">----  Select Option ----</option>
                                                <option value="married">Married</option>
                                                <option value="single">Single</option>
                                                <option value="divorce" selected>Divorce</option>
                                                <?php }else{ ?>
                                                 <option value="">----  Select Option ----</option>
                                                <option value="married">Married</option>
                                                <option value="single">Single</option>
                                                <option value="divorce">Divorce</option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Family</label>
                                            <select class="form-control" name="family" id="family">
                                                <option value="">----  Select Family ----</option>
                                                <?php 
                                $check=mysqli_query($connect, "SELECT * FROM families ORDER BY name ASC");
                                foreach($check as $get){
                            ?> 
                            
                            <?php if($get['name']==$family){ ?>
                                <option value="<?php echo $family_id ?>" selected><?php echo $family ?></option>
                                <?php }else { ?>
                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Department</label>
                                            <select class="form-control" name="dept" id="dept">
                                                <option value="">----  Select Department ----</option>
                                                <?php 
                                $check=mysqli_query($connect, "SELECT * FROM departments ORDER BY name ASC");
                                foreach($check as $get){
                            ?> 
                            
                            <?php if($get['name']==$dept){ ?>
                                <option value="<?php echo $dept_id ?>" selected><?php echo $dept ?></option>
                                <?php }else { ?>
                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                <?php } ?>
                            <?php } ?>
                                            </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Group</label>
                                            <select class="form-control" name="group" id="group">
                                                <option value="">----  Select Group ----</option>
                                                <?php 
                                $check=mysqli_query($connect, "SELECT * FROM groups ORDER BY name ASC");
                                foreach($check as $get){
                            ?> 
                           
                            <?php if($get['name']==$group){ ?>
                                <option value="<?php echo $group_id ?>" selected><?php echo $group ?></option>
                                <?php }else { ?>
                                <option value="<?php echo $get['id'] ?>"><?php echo $get['name'] ?></option>
                                <?php } ?>
                            <?php } ?> 
                                            </select>
                                    </div>
                                </div>
                            </div>
                            <div class="margiv-top-10">
                                <button type="submit" name="update" id="update" class="btn green"> Save Changes </button>
                                <a href="members.php" class="btn default"> Cancel </a>
                        </div>
                    </form>
                </div>
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
        <script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            function select(occupation) {
               if ( occupation.options[occupation.selectedIndex].value == "student" ) {
                  document.getElementById("school").style.display = "block";
                  document.getElementById("school2").style.display = "block";
               } else {
                  document.getElementById("school").style.display = "none";
                  document.getElementById("school2").style.display = "none";
               }
            }
        </script>
        <script type="text/javascript">
            $(document).ready(function(){
               $("form").submit(function(event){
                    // Stop form from submitting normally
                    event.preventDefault();
                    
                    // Get action URL

                    /* Serialize the submitted form control values to be sent to the web server with the request */
                    // var id = $("#id").val();
                    // var image = $("#image").val();
                    // var surname = $("#surname").val();
                    // var middle_name = $("#middle_name").val();
                    // var first_name = $("#first_name").val();
                    // var phone = $("#phone").val();
                    // var other_phone = $("#other_phone").val();
                    // var gender = $("#gender").val();
                    // var dob = $("#dob").val();
                    // var join_date = $("#join_date").val();
                    // var email = $("#email").val();
                    // var country = $("#country").val();
                    // var occupation = $("#occupation").val();
                    // var school = $("#school").val();
                    // var address = $("#address").val();
                    // var martial_status = $("#martial_status").val();
                    // var family = $("#family").val();
                    // var dept = $("#dept").val();
                    // var group = $("#group").val();
                    
                    // Send the form data using post
                    $.ajax({ 
                      
                        url: "ajax_edit_member.php",
                        type: "POST",
                        mimeType:"multipart/form-data",
                        contentType: false,
                        cache: false,
                        processData:false,
                        async: false,
                        data: new FormData(this),
                      //   {
                      //  "id": id,
                      //  "image": image,
                      //  "surname": surname,
                      //   "middle_name": middle_name,
                      //   "first_name": first_name,
                      //   "phone": phone,
                      //   "other_phone": other_phone,
                      //   "gender": gender,
                      //   "dob": dob,
                      //   "join_date": join_date,
                      //   "email": email,
                      //   "country": country,
                      //   "occupation": occupation,
                      //   "school": school,
                      //   "address": address,
                      //   "martial_status": martial_status,
                      //   "family": family,
                      //   "dept": dept,
                      //   "group": group
                      // }
                       success: function(data){
                        // Display the returned data in browser
                        $(".message").html(data);
                        // window.location='members.php';
                    },
                    complete:function(){
                    $('body, html').animate({scrollTop:$('.message').offset().top}, 'slow');
                    window.location='members.php';
                    }
                });
               });
            });
        </script>
        <script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/js.cookie.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-date-time-pickers.min.js" type="text/javascript"></script>
        <script src="../assets/pages/scripts/profile.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout3/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout3/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-nav.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>