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
<body class="a bg-light">
<div class="container-fluid ">
      <div class="row bg-dark p-3" style="border-bottom: 3px solid red;">
        <div class="col-md-8 ">
          <h1 class="top_h1 text-light"><a class="head_link text-success" href="dashboard.php"><b>FACULTY OF TECHNOLOGY</b></a></h1>
          <a class="nav-link mb-1 mt-3" style="font-size: 30px; color: silver" href="dashboard.php"><i class="fas fa-home"></i> <b>Home</b></a>
        </div>
      </div>
    </div><!-- Nav Bar End -->
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
<?php
require_once 'connection.php';
  $count=1;
  $viewquery = " SELECT * FROM student_reg join student on student_reg.sid = student.std_id";
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






?>
</body>