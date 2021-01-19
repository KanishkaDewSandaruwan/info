<link rel="stylesheet" type="text/css" href="css/boot.css">
    <link rel="stylesheet" type="text/css" href="css/c.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
     <script type="text/javascript" src="bootstrap/js/bootstrap.js"></script>
     <script type="text/javascript" src="bootstrap/js/npm.js"></script>
<body class="a bg-light text-light">
<div class="container-fluid pb-3">
      <div class="row bg-dark p-3" style="border-bottom: 3px solid red;">
        <div class="col-md-8 ">
          <h1 class="top_h1 text-light"><a class="head_link text-light" href="dashboard.php">FACULTY OF TECHNOLOGY</a></h1>
        </div>
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
</style>

<?php
require_once 'connection.php';


$s = $_REQUEST['search'];

$q1 = "SELECT * FROM student_reg where reg_number ='$s'";
$res1 = mysqli_query($con,$q1);
$row1 = mysqli_fetch_assoc($res1);
$b = $row1['reg_number'];


if($row1 = mysqli_num_rows($res1)>0){
  $viewquery = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id where student_reg.reg_number ='$b'";
  $viewresult = mysqli_query($con,$viewquery);
  $row = mysqli_fetch_assoc($viewresult);
  


  echo '
<div class="container-fluid ml-3">
<div class="row">
<div class="col-md-5 text-dark" style="border-right:3px solid red;">
   <div class="row"><h2 style="font-size : 1.5vw;">Name : '.$row['full_name'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Address : '.$row['address'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Phone Number : '.$row['phone_number'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Email Address : '.$row['email'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Gender : '.$row['gender'].'</h2> </div>


</div><div class="col-md-5 ml-4 text-dark">
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Register Number : '.$row['reg_number'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Batch : '.$row['batch'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Register Date : '.$row['date'].'</h2> </div>
   <div class="row mt-1"><h2 style="font-size : 1.5vw;">Department : '.$row['department'].'</h2> </div>

<div class="row">

</div></div></div></div>

';
$q2 = "SELECT * from sem";
$rest = mysqli_query($con,$q2);

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

      echo '<div class="row ml-5 mt-5" style="font-size : 2vw; color : maroon;"><b>'.$row7['sub_name'].'</b></div>';

      $count=1;
      $sum = 0;



        $viewquery1 = " SELECT * FROM subject where sub_code = '".$sub."'";
        $viewresult1 = mysqli_query($con,$viewquery1); 
        $row5 = mysqli_fetch_assoc($viewresult1);

        $lec = $row5['lec_hours'];

        echo '

        <table style= "margin-top:1%; padding :2%; width:50%; margin-left:0.5%;" class="search_table"> 
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

          echo '<div class="container-fluid">
                  <div class="row">
                    <div class="col-md-3 bg-light text-dark ml-2 mt-2 pb-2" style="border-bottom-left-radius : 10px; border-top-left-radius : 10px;">
                      <div class="row ml-2 text-right mt-2">All Lectures Amount is  </div>
                      <div class="row ml-2 text-right mt-2">Student Attend Hours is  </div>
                      <div class="row ml-2 text-right mt-2">Atendance Presantage is  </div>
                    </div>

                    <div class="col-md-1 bg-light text-dark mt-2 pb-2" style="border-bottom-right-radius : 10px; border-top-right-radius : 10px;">
                      <div class="row mt-2">: '.$lec_sum.'</div>
                      <div class="row mt-2">: '.$sum.'</div>
                      <div class="row mt-2">: '.$avarage.'%</div>
                    </div>

                    <div class="col-md-2 bg-light text-dark ml-2 mt-2" style="border-bottom-left-radius : 10px; border-top-left-radius : 10px;">
                      <div class="row ml-5 text-right mt-2">All Hours For This Subject</div>
                      <div class="row ml-5 text-right mt-2">Remaining Hours </div>
                    </div>

                    <div class="col-md-1 bg-light text-dark mt-2" style="border-bottom-right-radius : 10px; border-top-right-radius : 10px;">
                      <div class="row mt-2">: '.$lec.'</div>
                      <div class="row mt-2">: '.$pendinglec.'</div>
                    </div>
                  </div>
           </div>';

          }

        }
}

}
$q1 = "SELECT * FROM lec_calander where date ='$s'";
$res1 = mysqli_query($con,$q1);
$row1 = mysqli_fetch_assoc($res1);
$b = $row1['date'];

if(!empty($s)){
  if($b==$s){

    $count=1;
    $viewquery = " SELECT * FROM lec_attend join student_reg on lec_attend.reg_number = student_reg.reg_number join lec_calander on lec_attend.cal_date = lec_calander.cal_date  where lec_calander.date ='$b'";
    $viewresult = mysqli_query($con,$viewquery);

    echo '

    <table style= "padding :2%; width:60%; margin-left:0.5%;" class="search_table"> 
    <tr>
      <th style="width : 8%"> Date </th>
      <th style="width : 5%"> Redistration Number </th>
      <th style="width : 5%"> Lecture Time </th>
      <th style="width : 5%"> Subject  </th>
      <th style="width : 5%"> Delete </th>  
    </tr>';

          while($row = mysqli_fetch_assoc($viewresult))
          {
          echo '
          <tr>
          <td>'.$row['date'].'</td>
          <td>'.$row['reg_number'].'</td>
          <td>'.$row['lec_time'].'</td>
          <td>'.$row['subject_code'].'</td>
          <td><a href="delete.php?date='.$row['date'].' & attend_id='.$row['lec_id'].'">Delete</a></td>
          </tr>
          ';
          $count++;
          }
          echo '</table>';
  }
}

$q1 = "SELECT * FROM attend join student_reg on attend.reg_num = student_reg.reg_number where student_reg.department LIKE '%".$s."%'";
$res1 = mysqli_query($con,$q1);
$row1 = mysqli_fetch_assoc($res1);
$b = $row1['department'];


if($b==$s){

  $count=1;
  $viewquery = " SELECT * FROM attend join student_reg on attend.reg_num = student_reg.reg_number where student_reg.department LIKE '%".$s."%'";
  $viewresult = mysqli_query($con,$viewquery);

  echo '

  <table style= "padding :2%; width:60%; margin-left:0.5%;" class="search_table"> 
  <tr>
    <th style="width : 8%"> Date </th>
    <th style="width : 5%"> Redistration Number </th>
    <th style="width : 5%"> Lecture Time </th>

    <th style="width : 5%"> Edit Register </th>  
    <th style="width : 5%"> Delete </th>  
  </tr>';

        while($row = mysqli_fetch_assoc($viewresult))
        {
        echo '
        <tr>
        <td>'.$row['trn_date'].'</td>
        <td>'.$row['reg_num'].'</td>
        <td>'.$row['lec_time'].'</td>
        <td><a href="edit.php?reg_id='.$row['atend_id'].'">Edit</a></td>
        <td><a href="delete.php?std_id='.$row['atend_id'].'">Delete</a></td>
        </tr>
        ';
        $count++;
        }
        echo '</table>';

        $count=1;
  $viewquery = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id where student_reg.department LIKE '%".$s."'";
  $viewresult = mysqli_query($con,$viewquery);

  echo '

  <table style= "margin-top : 3%; padding :2%; width:99%; margin-left:0.5%;" class="search_table"> 
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
    <th style="width : 5%"> Edit </th>  
    <th style="width : 5%"> Edit Register </th>  
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
        <td>'.$row['reg_number'].'</td>
        <td>'.$row['batch'].'</td>
        <td>'.$row['date'].'</td>
        <td>'.$row['department'].'</td>
        <td><a href="edit.php?std_id='.$row['std_id'].'">Edit</a></td>
        <td><a href="edit.php?reg_id='.$row['reg_number'].'">Edit</a></td>
        <td><a href="delete.php?std_id='.$row['std_id'].'">Delete</a></td>
        </tr>
        ';
        $count++;
        }
        echo '</table>';


}

$q1 = "SELECT * FROM lecture where full_name LIKE '%".$s."'";
$res1 = mysqli_query($con,$q1);
$row1 = mysqli_fetch_assoc($res1);
$b = $row1['full_name'];

if($b==$s){


    $q1 = "SELECT * FROM lecture where full_name LIKE '%".$s."'";
    $res1 = mysqli_query($con,$q1);
    $row1 = mysqli_fetch_assoc($res1);
    $b = $row1['full_name'];


    if($row1 = mysqli_num_rows($res1)>0){
      $count=1;
      $viewquery = " SELECT * FROM lecture where full_name LIKE '%".$s."'";
      $viewresult = mysqli_query($con,$viewquery);

       $viewquery = " SELECT * FROM lecture where full_name LIKE '%".$s."'";
      $viewresult = mysqli_query($con,$viewquery);
      $row = mysqli_fetch_assoc($viewresult);

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
    $viewquery = " SELECT * FROM shedule join subject on shedule.subject_code = subject.sub_code where shedule.lec_name LIKE '%".$s."'";
      $viewresult = mysqli_query($con,$viewquery);
      echo '<h2 class="a text-success mt-5 ml-4"><b>Lecture Sheduls</b> </h2>
      <table style= "margin-top : 1%; padding :2%; width:60%; margin-left:0.5%;" class="search_table"> 
      <tr>
        <th style="width : 20%"> Subject </th>
        <th style="width : 10%"> Semester </th>
        <th style="width : 5%"> Credit </th>
        <th style="width : 10%"> Lecture Hours </th>
      </tr>';

            while($row = mysqli_fetch_assoc($viewresult))
            {
            echo '
            <tr>
            <td>'.$row['sub_name'].'</td>
            <td>'.$row['semester'].'</td>
            <td>'.$row['credits'].'</td>
            <td>'.$row['lec_hours'].'</td>
            </tr>
            ';
            $count++;
            }
            echo '</table>';
    }
}
if(empty($s)){ ?>
<div class="row ml-4 text-dark"><h2>Recode Not Found</h2></div>
<?php 
  header('refresh:2 location:dashboard.php');
} ?>
</body>