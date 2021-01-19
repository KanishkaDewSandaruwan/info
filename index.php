<?php
	require_once 'connection.php';
	require_once 'student.php';
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


<body class="a bg-light text-light">
<div class="container-fluid pb-3">
      <div class="row bg-dark p-3" style="border-bottom: 3px solid red;">
        <div class="col-md-8 ">
          <h1 class="top_h1 text-light"><a class="head_link" style="color: silver;" href="dashboard.php"><b>ATTENDANCE SYSTEM - Faculty of Technology</b></a></h1>
          <?php $b = $_SESSION['reg_number'];

          		$viewquery1 = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id where student_reg.reg_number ='$b'";
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
  font-size: 15PX;
  background-color: white;
}
table.search_table td{ border: 1px solid black;
  background-color: white;
  font-size: 15PX;
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
  font-size: 15PX;
  background-color: white;
}
table.search_table_02 td{ border: 1px solid black;
  background-color: white;
  font-size: 15PX;
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
  font-size: 20PX;
  margin-top: 20%;
  cursor: pointer;
  color: white;
  text-decoration: underline;
}
 h2.set_h2_02{
  font-size: 20PX;
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
        <a href="student_pass.php"><h2 class="set_h2">Change Password</h2></a>
        <a href="logout.php"><h2 class="set_h2_02">Logout</h2></a>

      </div>
<div class="container-fluid"><img src="img/Logo-drone-1500x300.jpg" class="img"></div>
<div class="container-fluid mt-5">
<?php

  $viewquery = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id where student_reg.reg_number ='$b'";
  $viewresult = mysqli_query($con,$viewquery);
  $row = mysqli_fetch_assoc($viewresult);
  


  echo '
<div class="container-fluid">
<div class="row" style ="background-color : silver; padding : 2%; border-radius : 20px; border : 1px solid red;">

<div class="col-md-5" style="border-right:3px solid black; color : black;">

   <div class="row"><h2 style="font-size : 25px;">Name : '.$row['full_name'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Address : '.$row['address'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Phone Number : '.$row['phone_number'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Email Address : '.$row['email'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Gender : '.$row['gender'].'</h2> </div>


</div><div class="col-md-5 ml-4" style="color : black;">
   <div class="row mt-1"><h2 style="font-size : 25px;">Register Number : '.$row['reg_number'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Batch : '.$row['batch'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Register Date : '.$row['date'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 25px;">Department : '.$row['department'].'</h2> </div>

<div class="row">

</div></div></div></div>

';
$q2 = "SELECT * from sem";
$rest = mysqli_query($con,$q2);

 $viewquery = " SELECT * FROM lec_attend JOIN lec_calander on lec_attend.cal_date = lec_calander.cal_date where reg_number ='$b' AND lec_calander.subject_code = '".$sub."'";
$viewresult = mysqli_query($con,$viewquery);  

echo '<form class="form mt-2 ml-3" method="POST">
<select class="custom-select col-3 mr-sm-2" name="sem" id="inlineFormCustomSelect" onchange="if(this.value != 0) { this.form.submit(); }">
        <option selected>Choose... Semester</option>
        ';
        while($rows = mysqli_fetch_assoc($rest)){
        echo '<option> '.$rows['semester'].'</option>';
      }
      echo '</select>
</form>
';
if(isset($_POST['sem'])){


      $query = "SELECT * FROM shedule where semester = '".$_POST['sem']."'";
      $res2 = mysqli_query($con,$query);

      while($row6 = mysqli_fetch_assoc($res2)){
      $sub = $row6['subject_code'];
        $viewquery = " SELECT * FROM lec_attend JOIN lec_calander on lec_attend.cal_date = lec_calander.cal_date where reg_number ='$b' AND lec_calander.subject_code = '".$sub."'";
        $viewresult = mysqli_query($con,$viewquery);  

        if(mysqli_num_rows($viewresult)>0)
      {

      $query1 = "SELECT * FROM subject where sub_code = '".$sub."'";
      $res3 = mysqli_query($con,$query1);
      $row7 = mysqli_fetch_assoc($res3);

      echo '<div class="row ml-5 mt-5" style="font-size : 30PX;; color : maroon;"><b>'.$row7['sub_name'].'</b></div>';

      $count=1;
      $sum = 0;



        $viewquery1 = " SELECT * FROM subject where sub_code = '".$sub."'";
        $viewresult1 = mysqli_query($con,$viewquery1); 
        $row5 = mysqli_fetch_assoc($viewresult1);

        $lec = $row5['lec_hours'];

        echo '
<div>
        <table style= "margin-top:1%; padding :2%; width:80%; margin-left:0.5%;" class="search_table"> 
        <tr>
          <th style="width : 8%"> Date </th>
          <th style="width : 5%"> Registration Number </th>
          <th style="width : 5%"> Lecture Time </th>

        </tr>';

              while($row = mysqli_fetch_assoc($viewresult))
              {
              echo '
              <tr>
              <td>'.$row['date'].'</td>
              <td>'.$row['reg_number'].'</td>
              <td>'.$row['lec_time'].'</td>
              </tr>
              ';
              $sum = $sum+$row['lec_time'];
              $count++;
              }
               echo '
              </table>

      ';

           $viewquery2 = " SELECT * FROM student_reg where reg_number = '$b'";
            $viewresult2 = mysqli_query($con,$viewquery2);
            $row3 = mysqli_fetch_assoc($viewresult2);
            $batch = $row3['batch'];

            $viewquery = " SELECT * FROM lec_calander where batch_code ='$batch' AND subject_code = '".$sub."'";
            $viewresult = mysqli_query($con,$viewquery);
            $lec_sum = 0;

            while($row4 = mysqli_fetch_assoc($viewresult)){
              $lec_sum = $lec_sum + $row4['lec_time'];
            }
            $avarage = ($sum/$lec_sum)*100;

            $pendinglec = $lec - $lec_sum;

          echo '<div class="container-fluid ">
                  <div class="row" style = "border-bottom : 2px solid red; padding-bottom : 20px;">
                    <div class="col-md-3 bg-light text-dark ml-2 mt-2 pb-2" style="border-bottom-left-radius : 10px; border-top-left-radius : 10px;">
                      <div class="row ml-2 text-right mt-2">All Lectures Amount is :  '.$lec_sum.' </div>
                      <div class="row ml-2 text-right mt-2">Student Attend Hours is : '.$sum.' </div>
                      <div class="row ml-2 text-right mt-2">Atendance Presantage is : '.$avarage.'% </div>
                    </div>

                    <div class="col-md-2 bg-light text-dark ml-2 mt-2" style="border-bottom-left-radius : 10px; border-top-left-radius : 10px;">
                      <div class="row ml-6 text-right mt-2">All Hours For This Subject : '.$lec.'</div>
                      <div class="row ml-5 text-right mt-2">Remaining Hours : '.$pendinglec.' </div>
                    </div>
                  </div>
           </div>
           ';

          }

        }
}

?>
</div>
</body>