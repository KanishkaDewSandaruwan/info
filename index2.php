<?php
	require_once 'connection.php';
	require_once 'lec.php';
?>
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
<body class="a bg-light text-light pb-5">
<div class="container-fluid pb-3">
      <div class="row bg-dark p-3" style="border-bottom: 3px solid red;">
        <div class="col-md-8 ">
          <h1 class="top_h1 text-light"><a class="head_link" style="color: silver;" href="dashboard.php"><b>ATTENDANCE SYSTEM - Faculty of Technology</b></a></h1>
          <?php $b = $_SESSION['lec_username'];

          		$viewquery1 = "SELECT * FROM lecture where lec_username = '$b'";
			  	$viewresult1 = mysqli_query($con,$viewquery1);
			  	$row9 = mysqli_fetch_assoc($viewresult1);

              	echo '<h2 style="font-size:1.2vw; text-transform:uppercase; color:white; margin-top: 1%;"><b>HELLO '.$row9['full_name'].'</b></h2>'; ?>
        </div>
        <button id="button" style="margin-left:26%; " class="btn"><i style="font-size: 60px; cursor: pointer; color: white; float: right;" class="fas fa-cogs ml-2"></i></button>

         <script type="text/javascript">
              $("document").ready(function(){
                $("#button").click(function(){
                  $("#settings").toggle(500);
                });

                $("#container").mouseover(function(){
                  $("#settings").hide(500);
                });

                $("#containers").mouseover(function(){
                  $("#settings").hide(500);
                });
              });
          </script>
      </div>
    </div><!-- Nav Bar End -->

<style type="text/css">
  table.search_table{
  text-align: center;
  margin-top: -5px;

}
table.search_table th{
  border: 2px solid black;
  text-align: center;
  color: green;
  font-size: 1vw;
  background-color: white;
}
table.search_table td{ border: 1px solid black;
  background-color: white;
  font-size: 1vw;
  height : 10px;
  color: black;
}

  table.search_table_02{
  text-align: center;
  margin-top: -5px;
  

}
table.search_table_02 th{
  border: 2px solid black;
  text-align: center;
  color: green;
  font-size: 1vw;
  background-color: white;
}
table.search_table_02 td{ border: 1px solid black;
  background-color: white;
  font-size: 1vw;
  height : 10px;
  color: black;
}
img.img{
	margin-left: -15px;
	width: 101.65%;
	margin-top: -20px;
}

div.settings{
  margin-top: -25px;
  display: none;
  width: 18%;
  height: 25vw;
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
      <div class="settings" id="settings">
        <i class="fas fa-user-graduate" id="gd_icon"></i>
        <a href="lec_pass.php"><h2 class="set_h2">Change Password</h2></a>
        <a href="username_change.php"><h2 class="set_h2_02">Change Username</h2></a>
        <a href="logout.php"><h2 class="set_h2_02">Logout</h2></a>

      </div>
<div id="container" class="container-fluid"><img src="img/Logo-drone-1500x300.jpg" class="img"></div>
<div id="containers" class="container-fluid mt-5 ">
<?php
  

$q1 = "SELECT * FROM lecture where lec_username = '$b'";
$res1 = mysqli_query($con,$q1);
$row1 = mysqli_fetch_assoc($res1);
$b = $row1['lec_username'];



    $q1 = "SELECT * FROM lecture where lec_username = '$b'";
    $res1 = mysqli_query($con,$q1);
    $row1 = mysqli_fetch_assoc($res1);
    $b = $row1['lec_username'];


    if($row1 = mysqli_num_rows($res1)>0){
      $count=1;
      $viewquery = " SELECT * FROM lecture where lec_username = '$b'";
      $viewresult = mysqli_query($con,$viewquery);

       $viewquery = " SELECT * FROM lecture where lec_username = '$b'";
      $viewresult = mysqli_query($con,$viewquery);
      $row = mysqli_fetch_assoc($viewresult);

      $lname = $row['full_name'];

    echo '
      <div class="container-fluid ml-3">
      <div class="row">
      <div class="col-md-5 text-danger" ">
       <div class="row"><h2 style="font-size : 1.5vw;">Name : '.$row['full_name'].'</h2> </div>
       <div class="row mt-1"><h2 style="font-size : 1.5vw;">Address : '.$row['address'].'</h2> </div>
       <div class="row mt-1"><h2 style="font-size : 1.5vw;">Phone Number : '.$row['phone_number'].'</h2> </div>
       <div class="row mt-1"><h2 style="font-size : 1.5vw;">Email Address : '.$row['email'].'</h2> </div>
       <div class="row mt-1"><h2 style="font-size : 1.5vw;">Gender : '.$row['gender'].'</h2> </div>

    </div></div></div></div>
    ';
    $viewquery = " SELECT * FROM shedule join subject on shedule.subject_code = subject.sub_code where shedule.lec_name = '$lname'";
      $viewresult = mysqli_query($con,$viewquery);
      echo '<h2 class="a text-success mt-5 ml-4"><b>Lecture Sheduls</b> </h2>
      <table style= "margin-top : 1%; padding :2%; width:60%; margin-left:0.5%;" class="search_table"> 
      <tr>
        <th style="width : 20%"> Subject </th>
        <th style="width : 10%"> Semester </th>
        <th style="width : 5%"> Credit </th>
        <th style="width : 10%"> Lecture Hours </th>
      </tr>';

            while($row6 = mysqli_fetch_assoc($viewresult))
            {
            echo '
            <tr>
            <td>'.$row6['sub_name'].'</td>
            <td>'.$row6['semester'].'</td>
            <td>'.$row6['credits'].'</td>
            <td>'.$row6['lec_hours'].'</td>
            </tr>
            ';
            $count++;
            }
            echo '</table>';
    }

$viewquery = " SELECT * FROM lecture where lec_username = '$b'";
$viewresult = mysqli_query($con,$viewquery);
$row = mysqli_fetch_assoc($viewresult);

$lname = $row['full_name'];

$viewquery = " SELECT * FROM shedule join subject on shedule.subject_code = subject.sub_code where shedule.lec_name = '$lname'";
$viewresult = mysqli_query($con,$viewquery);
$row6 = mysqli_fetch_assoc($viewresult);
$dpt = $row6['department'];

$count=1;
  $viewquery = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id where department = '$dpt'";
  $viewresult = mysqli_query($con,$viewquery);

  echo '
  
  <h1 style= "padding :1%; color:maroon; font-size:3vw; "> <b>All Student Details</b> </h1>


  <table style= "padding :2%; width:99%; margin-left:0.5%;" class="student_table_03"> 
  <tr>
    <th style="width : 15%"> Name </th>
    <th style="width : 15%"> Address </th>
    <th style="width : 8%"> Phone Number </th>
    <th style="width : 10%"> Email </th>
    <th style="width : 5%"> Gender </th>

    <th style="width : 10%"> Register Number </th>
    <th style="width : 3%"> Batch </th>
    <th style="width : 11%"> Register Date</th>
    <th style="width : 5%"> Department </th>
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
  <td>'.$row['reg_number'].'</td>
  <td>'.$row['batch'].'</td>
  <td>'.$row['date'].'</td>
  <td>'.$row['department'].'</td>
  </tr>
  ';
  $count++;
  }
  echo '</table>';

?>
</div>
<style type="text/css">
    table.student_table_03{
  text-align: center;
  margin-top: -5px;

}
table.student_table_03 th{
  border: 2px solid black;
  text-align: center;
  color: white;
  font-size: 1vw;
  background-color: maroon;
}
table.student_table_03 td{ border: 1px solid black;
  background-color: white;
  font-size: 1vw;
  height : 10px;
  color: black;
}

</style>
</body>