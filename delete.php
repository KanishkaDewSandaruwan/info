<?php
require_once 'connection.php';

if(isset($_REQUEST['std_id']))
{
          $id = $_REQUEST['std_id'];

          $querygetcode="SELECT  * FROM student where std_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['std_id'];

          $query1="DELETE FROM student WHERE std_id='$a '";
          mysqli_query($con,$query1);

          $query2="SELECT * FROM student_reg WHERE sid='$a '";
          $res = mysqli_query($con,$query2);
          $row = mysqli_fetch_assoc($res);
          $reg = $row['reg_number'];

          $query3="DELETE FROM std_pass WHERE reg_number='$reg'";
          mysqli_query($con,$query3);

          $query3="DELETE FROM lec_attend WHERE reg_number = '$reg'";
          mysqli_query($con,$query3);

           $query1="DELETE FROM student_reg WHERE sid='$a '";
          mysqli_query($con,$query1);

          header('location:view.php');
}

else if(isset($_REQUEST['shed_id']))
{
          $id = $_REQUEST['shed_id'];

          $querygetcode="SELECT  * FROM shedule where shedul_code='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['shedul_code'];

          $query1="DELETE FROM shedule WHERE shedul_code='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=8');
}
else if(isset($_REQUEST['sub_id']))
{
          $id = $_REQUEST['sub_id'];

          $querygetcode="SELECT  * FROM subject where sub_code='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['sub_code'];

          $query1="DELETE FROM subject WHERE sub_code='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=10');

}  else if(isset($_REQUEST['dpt_id'])){
          $id = $_REQUEST['dpt_id'];

          $querygetcode="SELECT  * FROM department where department_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['department_id'];

          $query1="DELETE FROM department WHERE department_id='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=4');
}
  else if(isset($_REQUEST['batch_id'])){
          $id = $_REQUEST['batch_id'];

          $querygetcode="SELECT  * FROM batch where batch_code='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['batch_code'];

          $query1="DELETE FROM batch WHERE batch_code='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=6');
}

else if(isset($_REQUEST['lec_id']))
{
           $id = $_REQUEST['lec_id'];

          $querygetcode="SELECT  * FROM lecture where lecture_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['lecture_id'];

          $query1="DELETE FROM lecture WHERE lecture_id='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=12');
}
else if(isset($_REQUEST['lect_id']))
{
           $id = $_REQUEST['lect_id'];

          $querygetcode="SELECT  * FROM lec_calander where cal_date='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['cal_date'];

          $query1="DELETE FROM lec_calander WHERE cal_date='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=18');
}
else if(isset($_REQUEST['attend_id']))
{
           $id = $_REQUEST['attend_id'];

          $s = $_REQUEST['date'];
          $querygetcode="SELECT  * FROM lec_attend where lec_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['lec_id'];
          $b=$result_row['date'];

          $query1="DELETE FROM lec_attend WHERE lec_id='$a '";
          mysqli_query($con,$query1);
          header('location:search.php?search='.$s.'');
}
else if(isset($_REQUEST['edt_id']))
{
          $id = $_REQUEST['edt_id'];

          $querygetcode="SELECT  * FROM editor where editor_id='".$id."'";
          $catresult=mysqli_query($con,$querygetcode);
          $result_row=mysqli_fetch_assoc($catresult);
          $a=$result_row['editor_id'];

          $query1="DELETE FROM editor WHERE editor_id='$a '";
          mysqli_query($con,$query1);
          header('location:dashboard.php?id=14'); 
}else{
  header('location:dashboard.php'); 
}
?>