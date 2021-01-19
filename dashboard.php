<?php
  require_once 'connection.php'; //insert connection to page
  require_once 'admin.php'; //Check login 

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="jq/jq.js" type="text/javascript"></script>

<!-- load external things -->
    <link rel="stylesheet" type="text/css" href="css/boot.css">
    <link rel="stylesheet" type="text/css" href="css/d.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free-5.7.2-web/css/all.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
     <script src="js/a.js"></script>
  <script src="js/b.js"></script>
  <script src="js/c.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
     <script type="text/javascript" src="bootstrap/js/npm.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SEUSL</title>  
  
  </head>
  <body class="a bg-dark">
    <!-- ********************** Start Nav Bar ************************ -->
    <div class="container-fluid "> 
      <div class="row p-3" style="border-bottom: 3px solid white; background-color: #2d132c">


        <div class="col-md-8 p-1"><!-- Header Box-->
          <h1 class="top_h1 text-light"><a class="head_link" style="color: white;" href="dashboard.php">Student Attendance System</a></h1>
          <?php $a = $_SESSION['username'];
              echo '<h2 style="font-size:20PX;  color:white; margin-top: 1%;"><b>Welcome '.$a.'</b></h2>'; ?>
        </div>

        <div class="col-md-5"> <!-- Search Bar Box-->

          <style type="text/css">
            form.search_bars{
              width: 80%;
              float: left;
            }
            form.search_bars input{
              display: inline-block;
              width: 78.7%;
              background-color: white;;
              font-size: 20px;
              border-bottom-left-radius: 20px;
              border-top-left-radius: 20px;
              padding-left: 10px;
              border: 0;

            }
            form.search_bars button{
              display: inline-block;
              width: 20%;
              cursor: pointer;
              padding-left: 10px;
              background-color: white;
              border: 0;
              margin-left: -10px;
              font-size: 20px;
              border-top-right-radius: 20px;
              border-bottom-right-radius: 20px;
            }
            #log_icon{
              font-size: 40px;
              color: white;
              padding: 1%;
            }
            #section_text{
              font-size: 20px;
              cursor: pointer;
            }
            #section_bar{
            }
            a.head_link{
              text-decoration: none;
            }
          </style>

          <form class="search_bars" action="dashboard.php" method="POST">
            <input type="search" name="se">
            <button type="submit" name="search"><i class="fas fa-search"></i></button>
            <?php
              if(isset($_POST['search'])){
                $search = $_REQUEST['se'];
                 echo '<script>window.location.href="search.php?search='.$search.'"; </script>';
              }
            ?>
          </form>
        </div>

        <!-- Tool Bar Box-->
          <!-- <button id="button" class="btn"><i style="font-size: 60px; margin-right: -20%; cursor: pointer; color: white; float: right;" class="fas fa-cogs ml-2"></i></button>
            <script type="text/javascript">
              $("document").ready(function(){
                $("#button").click(function(){
                  $("#settings").toggle(500);
                });

                $("#container").mouseover(function(){
                  $("#settings").hide(500);
                });
              });
          </script> -->

      </div>
    </div>

<style type="text/css">
    div.settings{
      display: none;
      width: 18%;
      height: 310PX;
      background-color: black;
      position: absolute;
      z-index: 1;
      margin-left: 82%;
      padding: 1%;
      text-align: center;
      border: 3px solid red;
    }
    h2.set_h2{
      font-size: 1.5vw;
      margin-top: 20%;
      cursor: pointer;
      color: white;
      text-decoration: underline;
    }
     h2.set_h2_02{
      font-size: 1.5vw;
      margin-top: 5%;
      cursor: pointer;
      color: white;
      text-decoration: underline;
    }
    #gd_icon{
      font-size: 10vw;
      color: white;
    }
    div.settings a{
      text-decoration: none;
    }
  </style>
<!-- **********************End Nav Bar & Start Setting Pannel ************************ -->


              <div class="settings" id="settings">
                <i class="fas fa-user-graduate" id="gd_icon"></i>
                <?php if($a=='admin'){ ?>

                <a href="admin_pass.php"><h2 class="set_h2">Change Password</h2></a>
                <a href="logout.php"><h2 class="set_h2_02">Logout</h2></a>

                <?php }else{ ?>

                <a href="admin_pass.php"><h2 class="set_h2">Change Password</h2></a>
                <a href="editor_username_change.php"><h2 class="set_h2_02">Change Username</h2></a>
                <a href="logout.php"><h2 class="set_h2_02">Logout</h2></a>
                <?php } ?>

              </div>

<!-- **********************End Setting Pannel ************************ -->
<!-- **********************Start Body Content Pannel ************************ -->

    <div id="container" class="container-fluid">
      <div class="row">
        <div id="section_bar" style="background-color: #01024e" class="col-md-3">
            <ul class="navbar-nav">


<?php 
if($a=='admin'){

?>
<!-- **********************Start Section Pannel ************************ -->
      <li class="nav-item">
          <a class="nav-link mb-1 mt-3" style="font-size: 30px; color: white" href="dashboard.php"><i class="fas fa-home"></i> <b>Home</b></a>
      </li>

      <!-- ................. Register Students .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-1" aria-controls="submenu-1-1"><i class="fas fa-user-graduate mr-3" style="color:yellow; font-size:35px;"></i><b>Student Details</b></a>
          <div id="submenu-1-1" class="collapse submenu" style="">
              <ul class="nav flex-column">
                <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="view.php">Students</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=2">Register Student</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Attendane .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-17" aria-controls="submenu-1-17"><i class="fas fa-file-signature mr-3" style="color:yellow; font-size:35px;"></i><b>Attendane</b></a>
          <div id="submenu-1-17" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light"href="dashboard.php?id=16">Add Attendane</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Lecture Time .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;"  data-target="#submenu-1-10" aria-controls="submenu-1-10"><i class="fas fa-clock mr-3" style="color:yellow; font-size:35px;"></i><b>Lecture Time</b></a>
          <div id="submenu-1-10" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=17">Add Lecture Time</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=18">View Lecture Times</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
       <!-- ................. Shedule .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="dashboard.php" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-5s" aria-controls="submenu-1-5s"><i class="far fa-calendar-check mr-3" style="color:yellow; font-size:35px;"></i><b>Shedule</b></a>
          <div id="submenu-1-5s" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=8">View Shedule</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=9">Add Shedule</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Subject .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-6" aria-controls="submenu-1-6"><i class="fas fa-book mr-3" style="color:yellow; font-size:35px;"></i><b>Subject</b></a>
          <div id="submenu-1-6" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=10">View Subject</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=11">Add Subject</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Lectures.................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-7" aria-controls="submenu-1-7"><i class="fas fa-user mr-3" style="color:yellow; font-size:35px;"></i><b>Lectures</b></a>
          <div id="submenu-1-7" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=12">View Lectures List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=13">Add Lectures</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Departments & Batch .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-3" aria-controls="submenu-1-3"><i class="fas fa-outdent mr-3" style="color:yellow; font-size:35px;"></i><b>Other Details</b></a>
          <div id="submenu-1-3" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=4">View Department List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=5">Add Departments</a>
                  </li>
                  <div class="dropdown"></div>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=6">View Batch List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=7">Add Batch</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Editors .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-8" aria-controls="submenu-1-8"><i class="fas fa-user-edit mr-3" style="color:yellow; font-size:35px;"></i><b>Editors</b></a>
          <div id="submenu-1-8" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=14">View Editors List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=15">Add Editors</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>

     <!--  ................. Reports .................... -->

      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-9" aria-controls="submenu-1-9"><i class="fas fa-file-alt mr-3" style="color:yellow; font-size:35px;"></i><b>Reports</b></a>
          <div id="submenu-1-9" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="student_report.php">Students Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="attend_report_check.php">Attendance Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="subject_report.php">Subjects Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="lecture_report.php">Lectures Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="shedule_report.php">Shedule Report</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-15" aria-controls="submenu-1-15"><i class="fas fa-file-alt mr-3" style="color:yellow; font-size:35px;"></i><b>Atendance Sheet</b></a>
          <div id="submenu-1-15" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=19">Students Atendance Sheet</a>
                  </li>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-15" aria-controls="submenu-1-15"><i class="fas fa-file-alt mr-3" style="color:yellow; font-size:35px;"></i><b>Atendance Sheet</b></a>
          <div id="submenu-1-15" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=19">Students Atendance Sheet</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=19">Students Atendance Sheet</a>
                  </li>
          </div>
      </li>

<!-- **********************End Admin Section Pannel ************************ -->

<?php } else{?>

<!-- **********************Start Editor Section Pannel ************************ -->

      <li class="nav-item">
          <a class="nav-link mb-1 mt-3" style="font-size: 30px; color: silver" href="dashboard.php"><i class="fas fa-home"></i> <b>Home</b></a>
      </li>
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-1" aria-controls="submenu-1-1"><i class="fas fa-user-graduate mr-3" style="color:yellow; font-size:35px;"></i><b>Student Details</b></a>
          <div id="submenu-1-1" class="collapse submenu" style="">
              <ul class="nav flex-column">

                <!-- ................. Register Students .................... -->
                <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="view.php">Students</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=2">Register Student</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Attendane .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-17" aria-controls="submenu-1-17"><i class="fas fa-file-signature mr-3" style="color:yellow; font-size:35px;"></i><b>Attendane</b></a>
          <div id="submenu-1-17" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light"href="dashboard.php?id=16">Add Attendane</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Lecture Time .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;"  data-target="#submenu-1-10" aria-controls="submenu-1-10"><i class="fas fa-clock mr-3" style="color:yellow; font-size:35px;"></i><b>Lecture Time</b></a>
          <div id="submenu-1-10" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=17">Add Lecture Time</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=18">View Lecture Times</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Shedule .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="dashboard.php" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-5s" aria-controls="submenu-1-5s"><i class="far fa-calendar-check mr-3" style="color:yellow; font-size:35px;"></i><b>Shedule</b></a>
          <div id="submenu-1-5s" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=8">View Shedule</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=9">Add Shedule</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <!-- ................. Subject .................... -->
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" aria-expanded="false" style="font-size: 20px;" data-target="#submenu-1-6" aria-controls="submenu-1-6"><i class="fas fa-book mr-3" style="color:yellow; font-size:35px;"></i><b>Subject</b></a>
          <div id="submenu-1-6" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=10">View Subject</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=11">Add Subject</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-7" aria-controls="submenu-1-7"><i class="fas fa-user mr-3" style="color:yellow; font-size:35px;"></i><b>Lectures</b></a>
          <div id="submenu-1-7" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=12">View Lectures List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=13">Add Lectures</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>
      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-3" aria-controls="submenu-1-3"><i class="fas fa-outdent mr-3" style="color:yellow; font-size:35px;"></i><b>Other Details</b></a>
          <div id="submenu-1-3" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=4">View Department List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=5">Add Departments</a>
                  </li>
                  <div class="dropdown"></div>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=6">View Batch List</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=7">Add Batch</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-9" aria-controls="submenu-1-9"><i class="fas fa-file-alt mr-3" style="color:yellow; font-size:35px;"></i><b>Reports</b></a>
          <div id="submenu-1-9" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="student_report.php">Students Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="attend_report_check.php">Attendance Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="subject_report.php">Subjects Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="lecture_report.php">Lectures Report</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="shedule_report.php">Shedule Report</a>
                  </li>
                  <div class="dropdown-divider"></div>
              </ul>
          </div>
      </li>

      <li class="nav-item">
          <a class="nav-link text-light" href="#" data-toggle="collapse" style="font-size: 20px;" aria-expanded="false" data-target="#submenu-1-15" aria-controls="submenu-1-15"><i class="fas fa-file-alt mr-3" style="color:yellow; font-size:35px;"></i><b>Atendance Sheets</b></a>
          <div id="submenu-1-15" class="collapse submenu" style="">
              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="nav-link text-light ml-3" href="dashboard.php?id=19">Students Atendance Sheet</a>
                  </li>
          </div>
      </li>

<!-- **********************End Editor Section Pannel ************************ -->

<?php } ?>
            </ul>
        </div>
        <div class="col-md-9 " style="padding-bottom:2%; padding-top:1%;background-color: white; height: 100%;">
        <div class="col-md-9" style="padding-bottom:2%; padding-top:1%;">
<?php
if(isset($_REQUEST['id']))
{

              $id = $_REQUEST['id'];
               if($id==2)
               {
                echo '<form class="reg_form" action="dashboard.php?id=2" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a ml-3"><b>Full Name</b></label>
                        <input type="text" class="form-control ml-3" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-5">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control ml-3" name="email" placeholder="Email Address">
                      </div>
                    </div>
                    <div class="form-group col-md-10">
                      <label for="address"><b>Address</b></label>
                      <input type="text" class="form-control"  name="address" placeholder="Address">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone"><b>Phone Number</b></label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>

                      <div class="form-group col-md-4">
                        <label for="inputState"><b>Gender</b></label>
                        <select id="inputState" name="gender" class="form-control">
                          <option selected>Male</option>
                          <option>Female</option>
                        </select>
                      </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-dark" style="border-radius:20px;">Register</button>
                  ';

                  if(isset($_POST['submit'])){
                    $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $gender = $_REQUEST['gender'];


                    if(!empty($fname)){
                      if(!empty($emails)){
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                          if(!empty($address)){
                            if(!empty($phone)){
                              if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                if(!empty($gender)){

                                  $query2="SELECT * FROM student WHERE email='$emails'";

                                      $sql2=mysqli_query($con,$query2);

                                      if(mysqli_num_rows($sql2)>0){
                                          echo "Email already Exsisted";
                                      }else{

                                        $q1="INSERT INTO student(full_name,address,phone_number,email,gender) values('$fname','$address','$phone','$emails','$gender')";

                                              $res1=mysqli_query($con,$q1);

                                              if ( $res1) {
                                                $q2 = "SELECT * FROM student WHERE email='$emails'";
                                                $res2 = mysqli_query($con,$q2);

                                                  if($row1 = mysqli_fetch_assoc($res2)){

                                                   echo '<script>alert("Data Saved is Scussessfully. Enter Registration Details");
                                                    window.location.href="student_reg.php?id='.$row1['std_id'].'";
                                                    </script>';
                                                  }
                                              }else{
                                                echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                              }
                                      }

                                }else{ echo "Select Gender";}
                              }else {echo "Enter Valid Phone Number";}
                            }else{ echo "Enter Phone Number";}
                          }else{ echo "Enter Address";}
                        }else {echo "Enter Valid Email Address";}
                      }else{ echo "Enter Email Address";}
                    }else{ echo "Enter Full Name";} 
                }echo '</form>'; //Register Form Validation

            }

            
            
            
                
            $id = $_REQUEST['id'];
              if($id==4)
              {
                $count=1;
                $viewquery = " SELECT * FROM department";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <h1 class="student_h1"> Student Details </h1>


                <table style="width : 40%;" class="student_table"> 
                  <tr>
                    <th style="width : 10%"> Departments </th>
                    <th style="width : 10%"> Edit </th>
                    <th style="width : 5%"> Delete </th>  
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['department'].'</td>

                  <td><a href="edit.php?dpt_id='.$row['department_id'].'">Edit</a></td>
                  <td><a href="delete.php?dpt_id='.$row['department_id'].'">Delete</a></td>
                  </tr>




                  
                  ';
                  $count++;
                }
                echo '</table>';
              }


            $id = $_REQUEST['id'];
                 $cdate = date("Y/m/d");
               if($id==5)
               {
                


                echo '<form class="reg_form" action="dashboard.php?id=5" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                      <div class="form-group col-md-6">
                      <label><b>Add Department</label>
                      <input type="text" class="form-control" name="adddpt" placeholder="Add Department">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';
                  if(isset($_POST['submit'])){
                    $department = $_REQUEST['adddpt'];

                            if(!empty($department))
                            {
                                    $query2="SELECT * FROM department WHERE department='$department'";
                                        $sql2=mysqli_query($con,$query2);

                                    if(mysqli_num_rows($sql2)>0)
                                    {
                                      echo "This Department already in System";

                                    }else{

                                      $q1="INSERT INTO department(department) values('$department')";
                                            $res1=mysqli_query($con,$q1);
                                            if ( $res1)
                                            {

                                                 echo '<script>alert("Data Saved is Scussessfully.");
                                                  </script>';
                                            }else{
                                              echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                            }
                                    }
                            }else{ echo "Enter Department";}
                }echo '</form>'; //Register Form Validation

            }


            $id = $_REQUEST['id'];
              if($id==6)

              {
                $count=1;
                $viewquery = " SELECT * FROM batch";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <h1 class="student_h1"> Batchs Detail </h1>


                <table class="student_table" style="width : 40%;"> 
                  <tr>
                    <th style="width : 15%"> Year </th>
                    <th style="width : 15%"> End </th>
                    <th style="width : 5%"> Edit </th>  
                    <th style="width : 5%"> Delete </th>  
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['start_year'].'</td>
                  <td>'.$row['end_year'].'</td>
                  <td><a href="edit.php?batch_id='.$row['batch_code'].'">Edit</a></td>
                  <td><a href="delete.php?batch_id='.$row['batch_code'].'">Delete</a></td>
                  </tr>




                  
                  ';
                  $count++;
                }
                echo '</table>';
              }


            $id = $_REQUEST['id'];
                 $cdate = date("Y/m/d");
               if($id==7)
               {
                


                echo '<form class="reg_form" action="dashboard.php?id=7" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                      <div class="form-group col-md-6">
                      <label><b>Year</label>
                      <input type="text" class="form-control" name="year" placeholder="Year">
                    </div>

                    <div class="form-group col-md-6">
                      <label><b>Other Year</label>
                      <input type="text" class="form-control" name="oyear" placeholder="Other Year">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';
                  if(isset($_POST['submit'])){
                    $year = $_REQUEST['year'];
                    $oyear = $_REQUEST['oyear'];

                            if(!empty($year))
                            {
                              if(!empty($oyear))
                              {
                                    $query2="SELECT * FROM batch WHERE start_year='$year'";
                                        $sql2=mysqli_query($con,$query2);

                                    if(mysqli_num_rows($sql2)>0)
                                    {
                                      echo "Their already have that batch";

                                    }else{

                                      $q1="INSERT INTO batch(start_year,end_year) values('$year','$oyear')";
                                            $res1=mysqli_query($con,$q1);
                                            if ( $res1)
                                            {

                                                 echo '<script>alert("Data Saved is Scussessfully.");
                                                  </script>';
                                            }else{
                                              echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                            }
                                    }
                              }else{ echo "Enter Year 02";}
                            }else{ echo "Enter Year 01";}
                }echo '</form>'; //Register Form Validation

            }

             $id = $_REQUEST['id'];
              if($id==8)
              {
                $count=1;
                $viewquery = " SELECT * FROM shedule join subject on shedule.subject_code = subject.sub_code";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <h1 class="student_h1"> Shedule Details </h1>


                <table class="student_table"> 
                  <tr>
                    <th style="width : 15%"> Subject </th>
                    <th style="width : 11%"> Semester </th>
                    <th style="width : 10%"> Lecture Name </th>
                    <th style="width : 8%"> Department </th>
                    <th style="width : 5%"> Edit </th>  
                    <th style="width : 5%"> Delete </th>  
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['sub_name'].'</td>
                  <td>'.$row['semester'].'</td>
                  <td>'.$row['lec_name'].'</td>
                  <td>'.$row['department'].'</td>
                  <td><a href="edit.php?shed_id='.$row['shedul_code'].'">Edit</a></td>
                  <td><a href="delete.php?shed_id='.$row['shedul_code'].'">Delete</a></td>
                  </tr>




                  
                  ';
                  $count++;
                }
                echo '</table>';
              
              }

            $id = $_REQUEST['id'];
               if($id==9)
               {
                


                echo '<form class="reg_form" action="dashboard.php?id=9" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                     <div class="form-group col-md-10 ml-3">
                     <label for="inputState"><b>Subject</b></label>
                        <select id="inputState" name="subcode" class="form-control">';
                          $q3 = "SELECT * FROM subject";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['sub_name']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>
                      
                      <div class="form-group col-md-10">'; 
                        $q2 = "SELECT * from sem";
                        $rest = mysqli_query($con,$q2);
 

                        echo '<form class="form mt-1 ml-6" method="POST">
                        <label for="inputState" class="a ml-3"><b>Semester</b></label></br>
                        <select class="custom-select col-6 mr-sm-2 ml-3" name="sem" id="inlineFormCustomSelect" onchange="if(this.value != 0) { this.form.submit(); }">
                                <option selected>Choose... Semester</option>
                                ';
                                while($rows = mysqli_fetch_assoc($rest)){
                                echo '<option> '.$rows['semester'].'</option>';
                              }
                              echo '</select>
                        </form>

                      <div class="form-group col-md-6">
                        <label for="inputState"><b>Department</b></label>
                        <select id="inputState" name="department" class="form-control">';
                          $q3 = "SELECT * FROM department";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['department']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>

                     <div class="form-group col-md-10">
                        <label for="inputState"><b>Lecture Name</b></label>
                        <select id="inputState" name="lecture" class="form-control">';
                          $q3 = "SELECT * FROM lecture";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['full_name']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>


                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';
                  if(isset($_POST['submit'])){
                    $subcode = $_REQUEST['subcode'];
                    $sem = $_REQUEST['sem'];
                    $department = $_REQUEST['department'];
                    $lecture = $_REQUEST['lecture'];


                            if(!empty($subcode))
                            {
                              $query2="SELECT * FROM subject WHERE sub_name='$subcode'";
                                  $sql2=mysqli_query($con,$query2);
                                  $row = mysqli_fetch_assoc($sql2);
                                  $code = $row['sub_code'];

                                  $query3="SELECT * FROM shedule WHERE subject_code='$code'";
                                  $sql3=mysqli_query($con,$query3);

                                  if($row = mysqli_num_rows($sql3)>0){
                                    echo "<script>alert(\"Enterd Alrady Here\");</script>";
                                  }else{


                                    $q5 = "INSERT INTO shedule(subject_code,semester,lec_name,department) values('$code','$sem','$lecture','$department')";
                                          $res1 = mysqli_query($con,$q5);
                                          if ( $res1)
                                          {

                                               echo '<script>alert("Data Saved is Scussessfully.");
                                                </script>';
                                          }else{
                                            echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                          }
                                  }
                            }else{ echo "Enter Subject Code";}
                }echo '</form>'; //Register Form Validation

            }

            $id = $_REQUEST['id'];
              if($id==10)
              {
                $count=1;
                $viewquery = " SELECT * FROM subject";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <h1 class="student_h1"> Subject Details </h1>


                <table class="student_table"> 
                  <tr>
                    <th style="width : 6%"> Subject Code </th>
                    <th style="width : 20%"> Subject Name</th>
                    <th style="width : 5%"> Credits </th>
                    <th style="width : 5%"> Lecture Hours </th>
                    <th style="width : 5%"> Edit </th> 
                    <th style="width : 5%"> Delete </th>   
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['sub_code'].'</td>
                  <td>'.$row['sub_name'].'</td>
                  <td>'.$row['credits'].'</td>
                  <td>'.$row['lec_hours'].'</td>
                  <td><a href="edit.php?sub_id='.$row['sub_code'].'">Edit</a></td>
                  <td><a href="delete.php?sub_id='.$row['sub_code'].'">Delete</a></td>
                  </tr>




                  
                  ';
                  $count++;
                }
                echo '</table>';
              
              }


            $id = $_REQUEST['id'];
               if($id==11)
               {
                


                echo '<form class="reg_form" action="dashboard.php?id=11" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                       <div class="form-group col-md-6">
                      <label for="phone"><b>Subject Code</label>
                      <input type="text" class="form-control" name="subcode" placeholder="Subject Code">
                    </div>

                     <div class="form-group col-md-10">
                      <label for="phone"><b>Subject Name</label>
                      <input type="text" class="form-control" name="subname" placeholder="Subject Name">
                    </div>
                      
                       <div class="form-group col-md-6">
                      <label for="phone"><b>Credit</label>
                      <input type="text" class="form-control" name="credit" placeholder="Credit">
                    </div>

                     <div class="form-group col-md-6">
                      <label for="phone"><b>Lecture Hours</label>
                      <input type="text" class="form-control" name="lhours" placeholder="Lecture Hours">
                    </div>


                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';
                  if(isset($_POST['submit'])){
                    $subcode = $_REQUEST['subcode'];
                    $subname = $_REQUEST['subname'];
                    $credit = $_REQUEST['credit'];
                    $lhours = $_REQUEST['lhours'];


                            if(!empty($subcode)){
                              if(!empty($subname)){
                                if(!empty($credit)){
                                  if(!empty($lhours)){

                                              $query2="SELECT * FROM subject WHERE sub_code='$subcode'";
                                              $sql2=mysqli_query($con,$query2);
                                              $row = mysqli_fetch_assoc($sql2);
                                              
                                              if(mysqli_num_rows($sql2)>0)
                                              {
                                                echo "Their already have that Subject Code";

                                              }else{
                                                    $q1="INSERT INTO subject(sub_code,sub_name,credits,lec_hours) values('$subcode','$subname','$credit','$lhours')";
                                                          $res1=mysqli_query($con,$q1);
                                                          if ( $res1)
                                                          {

                                                               echo '<script>alert("Data Saved is Scussessfully.");
                                                                </script>';
                                                          }else{
                                                            echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                                          }
                                              }
                                  }else{ echo "Enter All Lecture Hours";}
                                }else{ echo "Enter Subject Credits";}
                              }else{ echo "Enter Subject Name";}
                            }else{ echo "Enter Subject Code";}
                }echo '</form>'; //Register Form Validation

            }

             $id = $_REQUEST['id'];
              if($id==12)
              {
                $count=1;
                $viewquery = " SELECT * FROM lecture";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <h1 class="student_h1"> Student Details </h1>


                <table class="student_table"> 
                  <tr>
                    <th style="width : 15%"> Name </th>
                    <th style="width : 15%"> Address </th>
                    <th style="width : 11%"> Phone Number </th>
                    <th style="width : 10%"> Email </th>
                    <th style="width : 8%"> Gender </th>
                    <th style="width : 5%"> Edit </th> 
                    <th style="width : 5%"> Delete </th>   
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['full_name'].'</td>
                  <td>'.$row['address'].'</td>
                  <td>'.$row['phone_number'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['gender'].'</td>
                  <td><a href="edit.php?lec_id='.$row['lecture_id'].'">Edit</a></td>
                  <td><a href="delete.php?lec_id='.$row['lecture_id'].'">Delete</a></td>
                  </tr>
                  ';
                  $count++;
                }
                echo '</table>';
              }


            $id = $_REQUEST['id'];
               if($id==13)
               {


                echo '<form class="reg_form" action="dashboard.php?id=13" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a ml-3"><b>Full Name</b></label>
                        <input type="text" class="form-control ml-3" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-5">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control ml-3" name="email" placeholder="Email Address">
                      </div>
                    </div>
                    <div class="form-group col-md-10">
                      <label for="address"><b>Address</b></label>
                      <input type="text" class="form-control"  name="address" placeholder="Address">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone"><b>Phone Number</b></label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>

                      <div class="form-group col-md-4">
                        <label for="inputState"><b>Gender</b></label>
                        <select id="inputState" name="gender" class="form-control">
                          <option selected>Male</option>
                          <option>Female</option>
                        </select>
                      </div>

                      <div class="form-group col-md-4">
                      <label for="phone"><b>Usename</b></label>
                      <input type="text" style="text-transform: uppercase;" class="form-control" name="uname" placeholder="Password">
                    </div>

                      <div class="form-group col-md-4">
                      <label for="phone"><b>Password</b></label>
                      <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="phone"><b>Confirm Password</b></label>
                      <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-dark" style="border-radius:20px;">Register</button>
                  ';
                  if(isset($_POST['submit'])){
                    $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $gender = $_REQUEST['gender'];
                    $uname = $_REQUEST['uname'];
                    $pass = $_REQUEST['pass'];
                    $conf_pass = $_REQUEST['conf_pass'];


                    if(!empty($fname)){
                      if(!empty($emails)){
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                          if(!empty($address)){
                            if(!empty($phone)){
                              if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                if(!empty($gender)){
                                  if(!empty($pass)){
                                    if(!empty($conf_pass)){
                                       if(!empty($uname)){
                                        if($pass==$conf_pass){

                                              $query2="SELECT * FROM lecture WHERE email='$emails'";
                                                  $sql2=mysqli_query($con,$query2);

                                                  if(mysqli_num_rows($sql2)>0){
                                                      echo "Email already Exsisted";
                                                  }else{
                                                      $query3="SELECT * FROM lecture WHERE username='$uname'";
                                                        $sql3=mysqli_query($con,$query3);

                                                        if(mysqli_num_rows($sql3)>0){
                                                            echo "Username already Exsisted";
                                                        }else{
                                                            $query3="SELECT * FROM editor WHERE username='$uname'";
                                                              $sql3=mysqli_query($con,$query3);

                                                              if(mysqli_num_rows($sql3)>0){
                                                                  echo "Username already Exsisted";
                                                              }else{
                                                                    $q1="INSERT INTO lecture(full_name,address,phone_number,email,gender,password,lec_username) values('$fname','$address','$phone','$emails','$gender','".md5($pass)."','$uname')";
                                                                          $res1=mysqli_query($con,$q1);
                                                                          if ( $res1) {

                                                                               echo '<script>alert("Data Saved is Scussessfully.");
                                                                               window.location.href="dashboard.php";
                                                                                            </script>';
                                                                              
                                                                          }else{
                                                                            echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                                                          }
                                                                    }
                                                              }
                                                      }
                                        }else{echo "Enter Username";}
                                      }else{echo "Password is Not Match";}
                                    }else{ echo "Confirm Password";}
                                  }else{ echo "Enter Password";}
                                }else{ echo "Select Gender";}
                              }else {echo "Enter Valid Phone Number";}
                            }else{ echo "Enter Phone Number";}
                          }else{ echo "Enter Address";}
                        }else {echo "Enter Valid Email Address";}
                      }else{ echo "Enter Email Address";}
                    }else{ echo "Enter Full Name";} 
                }echo '</form>'; //Register Form Validation

            }


            $id = $_REQUEST['id'];
              if($id==14)
              {
                $count=1;
                $viewquery = " SELECT * FROM editor";
                $viewresult = mysqli_query($con,$viewquery);
      

                echo '
                <h1 class="student_h1"> Editors Details </h1>


                <table class="student_table"> 
                  <tr>
                    <th style="width : 15%"> Name </th>
                    <th style="width : 15%"> Address </th>
                    <th style="width : 11%"> Phone Number </th>
                    <th style="width : 10%"> Email </th>
                    <th style="width : 8%"> Gender </th>
                    <th style="width : 5%"> Edit </th>  
                    <th style="width : 5%"> Delete </th>  
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  if(!empty($row['full_name'])){

                  echo '
                  <tr>
                  <td>'.$row['full_name'].'</td>
                  <td>'.$row['address'].'</td>
                  <td>'.$row['phone_number'].'</td>
                  <td>'.$row['email'].'</td>
                  <td>'.$row['gender'].'</td>
                  <td><a href="edit.php?edt_id='.$row['editor_id'].'">Edit</a></td>
                  <td><a href="delete.php?edt_id='.$row['editor_id'].'">Delete</a></td>
                  </tr>
                  ';
                  $count++;
                  }
                }
                echo '</table>';
              }

            $id = $_REQUEST['id'];
               if($id==15)
               {


                echo '<form class="reg_form" action="dashboard.php?id=15" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name" class="a ml-3"><b>Full Name</b></label>
                        <input type="text" class="form-control ml-3" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-5">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control ml-3" name="email" placeholder="Email Address">
                      </div>
                    </div>
                    <div class="form-group col-md-10">
                      <label for="address"><b>Address</b></label>
                      <input type="text" class="form-control"  name="address" placeholder="Address">
                    </div>
                    <div class="form-group col-md-4">
                      <label for="phone"><b>Phone Number</b></label>
                      <input type="text" class="form-control" name="phone" placeholder="Phone Number">
                    </div>

                      <div class="form-group col-md-4">
                        <label for="inputState"><b>Gender</b></label>
                        <select id="inputState" name="gender" class="form-control">
                          <option selected>Male</option>
                          <option>Female</option>
                        </select>
                      </div>

                       <div class="form-group col-md-4">
                      <label for="phone"><b>Usename</b></label>
                      <input type="text" style="text-transform: uppercase;" class="form-control" name="uname" placeholder="Password">
                    </div>

                      <div class="form-group col-md-4">
                      <label for="phone"><b>Password</b></label>
                      <input type="password" class="form-control" name="pass" placeholder="Password">
                    </div>

                    <div class="form-group col-md-4">
                      <label for="phone"><b>Confirm Password</b></label>
                      <input type="password" class="form-control" name="conf_pass" placeholder="Confirm Password">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-dark" style="border-radius:20px;">Register</button>
                  ';
                  if(isset($_POST['submit'])){
                    $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $gender = $_REQUEST['gender'];
                    $uname = $_REQUEST['uname'];
                    $pass = $_REQUEST['pass'];
                    $conf_pass = $_REQUEST['conf_pass'];


                    if(!empty($fname)){
                      if(!empty($emails)){
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){
                          if(!empty($address)){
                            if(!empty($phone)){
                              if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                                if(!empty($gender)){
                                  if(!empty($uname)){
                                        if(!empty($pass)){
                                          if(!empty($conf_pass)){
                                            if($pass==$conf_pass){
                                                $query2="SELECT * FROM editor WHERE email='$emails'";
                                                    $sql2=mysqli_query($con,$query2);

                                                    if(mysqli_num_rows($sql2)>0){
                                                        echo "Email already Exsisted";
                                                    }else{
                                                        $query3="SELECT * FROM editor WHERE username='$uname'";
                                                        $sql3=mysqli_query($con,$query3);

                                                        if(mysqli_num_rows($sql3)>0){
                                                            echo "Username already Exsisted";
                                                        }else{
                                                              $query3="SELECT * FROM lecture WHERE username='$uname'";
                                                              $sql3=mysqli_query($con,$query3);

                                                              if(mysqli_num_rows($sql3)>0){
                                                                  echo "Username already Exsisted";
                                                              }else{
                                                                    $q1="INSERT INTO editor(full_name,address,phone_number,email,gender,password,username) values('$fname','$address','$phone','$emails','$gender','".md5($pass)."','$uname')";
                                                                          $res1=mysqli_query($con,$q1);
                                                                          if ( $res1) {

                                                                               echo '<script>alert("Data Saved is Scussessfully.");
                                                                               window.location.href="dashboard.php";
                                                                                            </script>';
                                                                              
                                                                          }else{
                                                                            echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                                                          }
                                                                    }
                                                              }
                                                          }
                                            }else{echo "Password is Not Match";}
                                          }else{ echo "Confirm Password";}
                                        }else{ echo "Enter Password";}
                                  }else{ echo "Enter Username";}
                                }else{ echo "Select Gender";}
                              }else {echo "Enter Valid Phone Number";}
                            }else{ echo "Enter Phone Number";}
                          }else{ echo "Enter Address";}
                        }else {echo "Enter Valid Email Address";}
                      }else{ echo "Enter Email Address";}
                    }else{ echo "Enter Full Name";} 
                }echo '</form>'; //Register Form Validation

            }




             $id = $_REQUEST['id'];
                 $cdate = date("Y/m/d");
               if($id==16)
               {
                


                echo '
                <div class="col-md-12">
                <form style="width : 100%;" action="dashboard.php?id=16" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                      <div class="form-group col-md-9">
                        <label for="inputState"><b>Subject</b></label>
                        <select id="inputState" name="cal_date" class="form-control">';
                          $q3 = "SELECT * FROM lec_calander";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['cal_date']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>


                      </br>
                      <label class="a text-light ml-2" for="inputState">Registration Number</label>
                    <div class="form-row ml-2">
                      <div class="form-group col-md-3">
                        <label for="inputState"><b>Batch</b></label>
                        <select id="inputState" name="batch" class="form-control">';
                          $q3 = "SELECT * FROM batch";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['start_year']."</option>";
                              $c++;
                            }
                        echo '</select>
                        </div>
                      <div class="form-group col-md-3">
                        <label for="inputState"><b>Department</b></label>
                        <select id="inputState" name="department" class="form-control">';
                          $q3 = "SELECT * FROM department";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['department']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>

                        <div class="form-group col-md-5">
                        <label for="phone"><b>Number</label>
                        <input type="text" class="form-control" name="number" placeholder="Number">
                      </div>
                    </div>


                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';

                 
                  if(isset($_POST['submit'])){
                    $cal_date = $_REQUEST['cal_date'];
                    $batch = $_REQUEST['batch'];
                    $department = $_REQUEST['department'];
                    $number = $_REQUEST['number'];
                    $reg = "SEU/IS/";

                    $q4 = "SELECT * FROM lec_calander WHERE cal_date='$cal_date'";
                    $res4 = mysqli_query($con,$q4);
                    $row2 = mysqli_fetch_assoc($res4);
                    $subjectcode = $row2['subject_code'];

                          if(!empty($number)){


                                $q4 = "SELECT * FROM shedule WHERE subject_code='$subjectcode'";
                                $res4 = mysqli_query($con,$q4);
                                $row2 = mysqli_fetch_assoc($res4);
                                $check = $row2['department'];

                                if($check==$department){
                                  $a =  $reg.$batch."/".$department."/".$number;

                                  $query2="SELECT * FROM student_reg WHERE reg_number='$a'";
                                      $sql2=mysqli_query($con,$query2);

                                      if(mysqli_num_rows($sql2)>0)
                                      {
                                            $query3="SELECT * FROM lec_attend WHERE reg_number='$a' AND cal_date='$cal_date'";
                                            $sql3=mysqli_query($con,$query3);

                                            if(mysqli_num_rows($sql3)>0)
                                            {
                                              echo '<script>alert("Data is Alrady Here.");</script>';
                                            }else{

                                                $q1="INSERT INTO lec_attend(reg_number,cal_date) values('$a','$cal_date')";
                                                $res1=mysqli_query($con,$q1);
                                                if ( $res1)
                                                  {
                                                       echo '<script>alert("Data Saved is Scussessfully.");
                                                        </script>';
                                                  }else{
                                                    echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                                  }
                                            }

                                            
                                      }else{
                                        echo "Register Number is not in System";
                                      }
                                }else{
                                  echo "Register Number not Match with Sheduled Department";
                                }
                              }else{ echo "Enter Number";}
                        
            }echo '</form> </div><div class="col-md-12">';
             $count=1;
                $viewquery = " SELECT * FROM lec_calander JOIN subject ON lec_calander.subject_code = subject.sub_code";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <table class="student_table" style="width : 100%;"> 
                  <tr>
                    <th style="width : 15%"> Time Code </th>
                    <th style="width : 15%"> Date </th>
                    <th style="width : 15%"> Subject Name </th>
                    <th style="width : 5%"> Batch </th>  
                    <th style="width : 5%"> Lecture Time </th>   
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['cal_date'].'</td>
                  <td>'.$row['date'].'</td>
                  <td>'.$row['sub_name'].'</td>
                  <td>'.$row['batch_code'].'</td>
                  <td>'.$row['lec_time'].'</td>
                  </tr>
                  ';
                  $count++;
                }
                echo '</table></div>';
             //Register Form Validation

            }


              $id = $_REQUEST['id'];
              $nowdate = date("Y/m/d");
               if($id==17)
               {
                


                echo '<form class="reg_form" action="dashboard.php?id=17" method="POST">
                      <div class="form-group col-md-6">


                      <div class="form-group col-md-6">
                      <label for="phone"><b>Date</label>
                      <input type="text" class="form-control" value="'.$nowdate.'" name="cdate" placeholder="Date">
                    </div>

                      <div class="form-group col-md-9">
                        <label for="inputState"><b>Subject</b></label>
                        <select id="inputState" name="subcode" class="form-control">';
                          $q3 = "SELECT * FROM subject";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['sub_name']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>

                    <div class="form-row ml-2">
                      <div class="form-group col-md-3">
                        <label for="inputState"><b>Batch</b></label>
                        <select id="inputState" name="batch" class="form-control">';
                          $q3 = "SELECT * FROM batch";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['start_year']."</option>";
                              $c++;
                            }
                        echo '</select>
                        </div></div>

                          <div class="form-group col-md-6">
                      <label for="phone"><b>Lecture Time</label>
                      <input type="text" class="form-control" name="ltime" placeholder="Lecture Time">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-5 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';
                  if(isset($_POST['submit'])){
                    $subcode = $_REQUEST['subcode'];
                    $batch = $_REQUEST['batch'];
                    $cdate = $_REQUEST['cdate'];
                    $ltime = $_REQUEST['ltime'];

                    $q4 = "SELECT * FROM subject WHERE sub_name='$subcode'";
                    $res4 = mysqli_query($con,$q4);
                    $row2 = mysqli_fetch_assoc($res4);
                    $subjectcode = $row2['sub_code'];

                    $id = ($cdate."_".$subjectcode);
                    


                            if(!empty($cdate)){
                                $q1="INSERT INTO lec_calander(cal_date,date,subject_code,batch_code,lec_time) values('$id','$cdate','$subjectcode','$batch','$ltime')";
                                      $res1=mysqli_query($con,$q1);
                                      if ( $res1)
                                      {

                                           echo '<script>alert("Data Saved is Scussessfully.");
                                            </script>';
                                      }else{
                                        echo "<script>alert(\"Data Save is Not Scussess\");</script>";
                                      }
                            }else{ echo "Please Enter Date";}
                }echo '</form>'; //Register Form Validation

            }


            $id = $_REQUEST['id'];
              if($id==18)

              {
                $count=1;
                $viewquery = " SELECT * FROM lec_calander JOIN subject ON lec_calander.subject_code = subject.sub_code";
                $viewresult = mysqli_query($con,$viewquery);

                echo '
                <h1 class="student_h1"> Lecture Detail </h1>


                <table class="student_table" style="width : 80%;"> 
                  <tr>
                    <th style="width : 15%"> Time Code </th>
                    <th style="width : 15%"> Date </th>
                    <th style="width : 15%"> Subject Name </th>
                    <th style="width : 5%"> Batch </th>  
                    <th style="width : 5%"> Lecture Time </th>  
                    <th style="width : 5%"> Edit </th>  
                    <th style="width : 5%"> Delete </th>  
                  </tr>';

                while($row = mysqli_fetch_assoc($viewresult))
                {
                  echo '
                  <tr>
                  <td>'.$row['cal_date'].'</td>
                  <td>'.$row['date'].'</td>
                  <td>'.$row['sub_name'].'</td>
                  <td>'.$row['batch_code'].'</td>
                  <td>'.$row['lec_time'].'</td>
                  <td><a href="edit.php?lect_id='.$row['cal_date'].'">Edit</a></td>
                  <td><a href="delete.php?lect_id='.$row['cal_date'].'">Delete</a></td>
                  </tr>




                  
                  ';
                  $count++;
                }
                echo '</table>';
              }

              $id = $_REQUEST['id'];
               if($id==19)
               {
                


                echo '<form class="reg_form" action="dashboard.php?id=19" method="POST">
                      <div class="form-group col-md-6">

                    <div class="form-row ml-2">
                      <div class="form-group col-md-3">
                        <label for="inputState"><b>Batch</b></label>
                        <select id="inputState" name="batch" class="form-control">';
                          $q3 = "SELECT * FROM batch";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['start_year']."</option>";
                              $c++;
                            }
                        echo '</select>
                        </div></div>

                        <div class="form-group col-md-3">
                        <label for="inputState"><b>Department</b></label>
                        <select id="inputState" name="department" class="form-control">';
                          $q3 = "SELECT * FROM department";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['department']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-5 btn-dark" style="border-radius:20px;">Add Recode</button></br>
                  ';
                  if(isset($_POST['submit'])){
                    $batch = $_REQUEST['batch'];
                    $department = $_REQUEST['department'];
                    
                            if(!empty($batch) && !empty($department)){
                              echo '<script> window.location.href="attendasheet.php?batch='.$batch.'&dpt='.$department.'"; </script>';
                            }else{ echo "Please File Data";}
                }echo '</form>'; //Register Form Validation

            }

       
}else{ 

  $viewquery1 = "SELECT * FROM department";
  $viewresult1 = mysqli_query($con,$viewquery1);

 

  ?>
  <h4>Student Registration Summery</h4>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'],

<?php while($row = mysqli_fetch_assoc($viewresult1)){
       $viewquery = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id where department = '".$row['department']."'";
      $viewresult = mysqli_query($con,$viewquery);
      $stddata = mysqli_num_rows($viewresult);

        echo "
          ['".$row['department']."',  ".$stddata."],
"; } ?>
        ]);

        var options = {
          title: 'Faculty Student Details'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>
<div class="col-md-6" id="piechart" style=" height: 30vw; float: left;"></div>

<?php
$viewquery2 = "SELECT * FROM batch";
  $viewresult2 = mysqli_query($con,$viewquery2);

 

  ?>
    <h4 style="margin-top: -34px; margin-left: 55%;">Student Batches Summery</h4>
 <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
           ['Task', 'Hours per Day'],

<?php while($rows = mysqli_fetch_assoc($viewresult2)){
       $viewquery3 = " SELECT * FROM student_reg where batch = '".$rows['start_year']."'";
      $viewresult3 = mysqli_query($con,$viewquery3);
      $btddata = mysqli_num_rows($viewresult3);

        echo "
          ['".$rows['start_year']."/".$rows['end_year']." Batch',  ".$btddata."],
"; } ?>
        ]);

        var options = {
          title: 'Faculty Student Details'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }
    </script>
<div class="col-md-6" id="piechart2" style=" height: 30vw; float: right;"></div>
  

<?php 
  $viewquery3 = "SELECT * FROM sem";
  $viewresult3 = mysqli_query($con,$viewquery3);
  ?>
  <script language = "JavaScript">
         function drawChart() {

            var data = google.visualization.arrayToDataTable([
               ['Smester', 'Subject'],
<?php while($rows = mysqli_fetch_assoc($viewresult3)){
       $viewquery4 = " SELECT * FROM lec_attend join lec_calander on lec_attend.cal_date = lec_calander.cal_date  join shedule on shedule.subject_code = lec_calander.subject_code where shedule.semester = '".$rows['semester']."'";
      $viewresult4 = mysqli_query($con,$viewquery4);
      $shddata = mysqli_num_rows($viewresult4); 
      $a = $shddata;?>

               ['<?php echo $rows['semester'] ?>',  <?php echo $a; ?>],
<?php } ?>
            ]);

            var options = {title: 'Number of Subject'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
<div class="col-md-12" id="chart_div" style=" margin-top: 50%; height: 30vw;"></div>

<?php 
$viewquery6 = "SELECT * FROM subject";
  $viewresult6 = mysqli_query($con,$viewquery6);
  ?>
  <script language = "JavaScript">
         function drawChart() {

            var data = google.visualization.arrayToDataTable([
               ['Subject', 'Atendance',{ role: 'style' }],
<?php while($rows1 = mysqli_fetch_assoc($viewresult6)){
       $viewquery4 = " SELECT * FROM lec_attend join lec_calander on lec_attend.cal_date = lec_calander.cal_date where lec_calander.subject_code = '".$rows1['sub_code']."'";
      $viewresult4 = mysqli_query($con,$viewquery4);
      $shddata = mysqli_num_rows($viewresult4); 
      $a = $shddata;?>

               ['<?php echo $rows1['sub_name'] ?>',  <?php echo $a; ?>,'color:maroon'],
<?php } ?>
            ]);

            var options = {title: 'Student Atendance for Subject'}; 

            // Instantiate and draw the chart.
            var chart = new google.visualization.ColumnChart(document.getElementById('chart_sub'));
            chart.draw(data, options);
         }
         google.charts.setOnLoadCallback(drawChart);
      </script>
<div class="col-md-12" id="chart_sub" style=" margin-top: 2%; height: 30vw;"></div>
<?php } ?>

<style type="text/css">
  form.reg_form{
    width: 100%;
    margin-top: 2%;
    background-color: gray;
    border-radius: 30px;
    padding: 30px;
  }
  form.reg_form label{
    font-size: 20px;

  }
  form.reg_form input{
    font-size: 20px;
  }


</style>

        </div>
      </div>
    </div>
 </div>
<!-- **********************End Body Content Pannel ************************ -->
  </body>
</html>