<?php
  require_once 'connection.php';

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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

    <title>SEUSL</title>
  </head>
  <body class="a bg-secondary">
    <div class="container-fluid ">
      <div class="row bg-dark p-3" style="border-bottom: 3px solid red;">
        <div class="col-md-8 ">
          <h1 class="top_h1 text-light"><a class="head_link text-light" href="dashboard.php">FACULTY OF TECHNOLOGY</a></h1>
        </div>
        <div class="col-md-4">
          <form class="search_bar">
            <input type="search" name="search">
            <button type="submit" name="submit"><i class="fas fa-search"></i></button>
          </form>
        </div>
      </div>
    </div><!-- Nav Bar End -->


    <div class="container-fluid">
      <div class="row">
        <div class="col-md-10 bg-secondary" style="padding-bottom: 2%;">
<?php
if(isset($_REQUEST['std_id']))
{
            $id = $_REQUEST['std_id'];
            $q2 = "SELECT * FROM student WHERE std_id='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['std_id'];

              $q4 = "SELECT * FROM student_reg";
             $res3 = mysqli_query($con,$q4);
             $row3 = mysqli_fetch_assoc($res3);

              if($id==$row1['std_id'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?std_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name"><b>Full Name</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
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
                      <label for="phone"><b>Enter Gender</b></label>
                      <input type="text" class="form-control" name="gender" placeholder="Enter Gender">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-success" style="border-radius:20px;">Save Details</button>
                   <button type="button" name="submit" class="btn col-md-2 btn-success"  onclick="window.location.href=\'view.php\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit']))
                  {
                    $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $gender = $_REQUEST['gender'];


                    if(!empty($fname))
                      {
                        $query3="UPDATE student SET full_name='$fname' WHERE std_id='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboardview.php=1\";</script>";
                      }
                      if(!empty($emails))
                      {
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){

                          $query1="SELECT * FROM student WHERE email='$emails'";
                          $sql1=mysqli_query($con,$query1);


                            if(mysqli_num_rows($sql1)>0)
                            {
                              echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                            }
                            else
                              {
                                $query3="UPDATE student SET email='$emails' WHERE std_id='".$id."'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='view.php';</script>";
                              }
                        }
                      }
                      if(!empty($address))
                      {
                        $query3="UPDATE student SET address='$address' WHERE std_id='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"view.php\";</script>";
                      }
                      if(!empty($phone))
                      {
                        if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                            $query3="UPDATE student SET phone_number='$phone' WHERE std_id='".$id."'";
                            $sql3=mysqli_query($con,$query3);
                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"view.php\";</script>";

                          }else{echo "Enter Valid Phone Number";}
                      }
                      if(!empty($gender))
                      {
                        $loginsql="SELECT * FROM student WHERE std_id='".$id."'";
                          $result=mysqli_query($con,$loginsql);
                          $rows=mysqli_fetch_assoc($result);
                          $a = $rows['gender'];

                          if($a==$gender)
                          {
                              echo "<script type=\"text/javascript\"> alert(\"Gender already Here\");</script>";
                            }else{ 
                              $query3="UPDATE student SET gender='$gender' WHERE std_id='".$id."'";
                              $sql3=mysqli_query($con,$query3);
                              echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"view.php\";</script>";
                        }
                      }

                }echo '</form>'; //Register Form Validation

            }   
}else if(isset($_REQUEST['reg_id']))
{
            $id = $_REQUEST['reg_id'];
            $q2 = "SELECT * FROM student_reg WHERE reg_number='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['reg_number'];

              if($id==$row1['reg_number'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?reg_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <div class="form-group col-md-6">
                      <label for="phone"><b>Registration Number </label>
                      <input type="text" class="form-control" style="text-transform: uppercase;" value="'.$row1['reg_number'].'" name="regnum" placeholder="Registration Number  Registration Number ">
                    </div>

                     <div class="form-group col-md-6">
                      <label for="phone"><b>Enter Batch Enter Batch</label>
                      <input type="text" class="form-control" name="batch" placeholder="Enter Batch Enter Batch">
                    </div>

                      <div class="form-group col-md-3">
                        <label for="inputState"><b>Department</b></label>
                        <select id="inputState" name="department" class="form-control"> <option></option>';
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
                   <button type="submit" name="submit" class="btn col-md-3 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-4 btn-success"  onclick="window.location.href=\'view.php\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit'])){
                    $regnum = $_REQUEST['regnum'];
                    $batch = $_REQUEST['batch'];
                    $department = $_REQUEST['department'];


                      if(!empty($regnum))
                        {
                          $loginsql="SELECT * FROM student_reg WHERE reg_number='".$id."'";
                            $result=mysqli_query($con,$loginsql);
                            $rows=mysqli_fetch_assoc($result);
                            $a = $rows['reg_number'];

                            if($a==$regnum)
                            {
                                echo "<script type=\"text/javascript\"> alert(\"Shedile Code already Here\");</script>";
                              }else{ 

                                      $query3="UPDATE student_reg SET reg_number ='$regnum' WHERE reg_number='".$id."'";
                                      $sql3=mysqli_query($con,$query3);
                                      echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"view.php\";</script>";
                                  
                          }
                      }
                      if(!empty($batch))
                      {
                        $query3="UPDATE student_reg SET batch='$batch' WHERE reg_number='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"view.php\";</script>";
                      }

                      if(!empty($department))
                      {
                        $query3="UPDATE student_reg SET department='$department' WHERE reg_number='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"view.php\";</script>";
                      }
                }echo '</form>'; //Register Form Validation

            }   
}
else if(isset($_REQUEST['lect_id']))
{
            $id = $_REQUEST['lect_id'];
            $q2 = "SELECT * FROM lec_calander WHERE cal_date='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['cal_date'];

              if($id==$row1['cal_date'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?lect_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">


                     <div class="form-group col-md-10">
                     <label for="inputState"><b>Subject</b></label>
                        <select id="inputState" name="subcode" class="form-control">
                        <option></option>';
                          $q3 = "SELECT * FROM subject";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['sub_name']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>
                      
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

                        '; $loginsql="SELECT * FROM lec_calander WHERE cal_date='".$id."'";
                            $result=mysqli_query($con,$loginsql);
                            $rows=mysqli_fetch_assoc($result);
                            $a = $rows['date'];
                      echo '

                        <div class="form-group col-md-6">
                      <label for="phone"><b>Enter Date Batch</label>
                      <input type="text" class="form-control" name="date" value="'.$a.'" placeholder="Enter Batch Enter Batch">
                    </div>

                      <div class="form-group col-md-6">
                      <label for="phone"><b>Lecture Time</label>
                      <input type="text" class="form-control" name="ltime" placeholder="Lecture Time">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-3 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-4 btn-success"  onclick="window.location.href=\'dashboard.php?id=18\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit'])){
                    $subcode = $_REQUEST['subcode'];
                    $batch = $_REQUEST['batch'];
                    $date = $_REQUEST['date'];
                    $ltime = $_REQUEST['ltime'];

                    if(!empty($subcode))
                      {
                        $query2="SELECT * FROM subject WHERE sub_name='$subcode'";
                          $sql2=mysqli_query($con,$query2);
                          $row = mysqli_fetch_assoc($sql2);
                          $code = $row['sub_code'];

                        $query3="UPDATE lec_calander SET subject_code='$code' WHERE cal_date='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=18\";</script>";
                      }
                      if(!empty($batch))
                      {
                        $query3="UPDATE lec_calander SET batch_code='$batch' WHERE cal_date='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=18\";</script>";
                      }
                      if(!empty($ltime))
                      {
                        $query3="UPDATE lec_calander SET lec_time='$ltime' WHERE cal_date='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=18\";</script>";
                      }
                      if(!empty($date))
                        {
                          $loginsql="SELECT * FROM lec_calander WHERE cal_date='".$id."'";
                            $result=mysqli_query($con,$loginsql);
                            $rows=mysqli_fetch_assoc($result);
                            $a = $rows['date'];

                            if($a==$date)
                            {
                                echo "<script type=\"text/javascript\"> alert(\"Subject Code already Here\");</script>";
                              }else{ 
                                $query3="UPDATE lec_calander SET date ='$date' WHERE cal_date='".$id."'";
                                $sql3=mysqli_query($con,$query3);


                                $query3="UPDATE lec_attend SET trn_date ='$date' WHERE trn_date='".$id."'";
                                $sql3=mysqli_query($con,$query3);

                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=18\";</script>";
                         }
                      }
                }echo '</form>'; //Register Form Validation

            }   
}else if(isset($_REQUEST['shed_id']))
{
            $id = $_REQUEST['shed_id'];
            $q2 = "SELECT * FROM shedule WHERE shedul_code='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['shedul_code'];

              if($id==$row1['shedul_code'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?shed_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">


                     <div class="form-group col-md-10">
                     <label for="inputState"><b>Subject</b></label>
                        <select id="inputState" name="subcode" class="form-control">
                        <option></option>';
                          $q3 = "SELECT * FROM subject";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['sub_name']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>
                      
                      <div class="form-group col-md-10">
                     <label for="inputState"><b>Semester</b></label>
                        <select id="inputState" name="sem" class="form-control">
                          <option></option>s
                          <option> 1st Year 1st Sem</option>
                          <option> 1st Year 2nd Sem</option>
                          <option> 2nd Year 1st Sem</option>
                          <option> 2nd Year 2nd Sem</option>
                          <option> 3rd Year 1st Sem</option>
                          <option> 3rd Year 2nd Sem</option>
                          <option> 4th Year 1st Sem</option>
                          <option> 4th Year 2nd Sem</option>
                             </select>
                      </div>

                      <div class="form-group col-md-3">
                        <label for="inputState"><b>Department</b></label>
                        <select id="inputState" name="department" class="form-control"> <option></option>';
                          $q3 = "SELECT * FROM department";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['department']."</option>";
                              $c++;
                            }
                        echo '</select>
                      </div>

                     <div class="form-group col-md-6">
                        <label for="inputState"><b>Lecture Name</b></label>
                        <select id="inputState" name="lecture" class="form-control"><option></option>';
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
                   <button type="submit" name="submit" class="btn col-md-3 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-4 btn-success"  onclick="window.location.href=\'dashboard.php?id=8\'" style="border-radius:20px;">Goto Back</button>
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

                        $query3="UPDATE shedule SET subject_code='$code' WHERE shedul_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=8\";</script>";
                      }
                      if(!empty($sem))
                      {
                        $query3="UPDATE shedule SET semester='$sem' WHERE shedul_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=8\";</script>";
                      }
                      if(!empty($department))
                      {
                        $query3="UPDATE shedule SET department='$department' WHERE shedul_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=8\";</script>";
                      }
                      if(!empty($lecture))
                      {
                        $query3="UPDATE shedule SET lec_name='$lecture' WHERE shedul_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=8\";</script>";
                      }
                }echo '</form>'; //Register Form Validation

            }   
}
else if(isset($_REQUEST['sub_id']))
{
            $id = $_REQUEST['sub_id'];
            $q2 = "SELECT * FROM subject WHERE sub_code='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['sub_code'];

              if($id==$row1['sub_code'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?sub_id='.$id.'" method="POST">
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
                   <button type="submit" name="submit" class="btn col-md-3 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-4 btn-success"  onclick="window.location.href=\'dashboard.php?id=10\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit']))
                  {
                    $subcod = $_REQUEST['subcode'];
                    $subname = $_REQUEST['subname'];
                    $credit = $_REQUEST['credit'];
                    $lhours = $_REQUEST['lhours'];


                      if(!empty($subcod))
                        {
                          $loginsql="SELECT * FROM subject WHERE sub_code='".$id."'";
                            $result=mysqli_query($con,$loginsql);
                            $rows=mysqli_fetch_assoc($result);
                            $a = $rows['sub_code'];

                            if($a==$subcod)
                            {
                                echo "<script type=\"text/javascript\"> alert(\"Subject Code already Here\");</script>";
                              }else{ 
                                $query3="UPDATE subject SET sub_code ='$subcod' WHERE sub_code='".$id."'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=10\";</script>";
                          }
                      }

                      if(!empty($subname))
                      {
                        $query3="UPDATE subject SET sub_name='$subname' WHERE sub_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=10\";</script>";
                      }
                      if(!empty($credit))
                      {
                        $query3="UPDATE subject SET credits='$credit' WHERE sub_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=10\";</script>";
                      }
                      if(!empty($lhours))
                      {
                        $query3="UPDATE subject SET lec_hours='$lhours' WHERE sub_code='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=10\";</script>";
                      }
                    }

                }echo '</form>'; //Register Form Validation

}  else if(isset($_REQUEST['dpt_id'])){

        $id = $_REQUEST['dpt_id'];
            $q2 = "SELECT * FROM department WHERE department_id='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['department_id'];

              if($id==$row1['department_id'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?dpt_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <div class="form-group col-md-10">
                      <label for="address"><b>Enter Department</b></label>
                      <input type="text" class="form-control"  name="dpt" placeholder="Enter Department">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-success" style="border-radius:20px;">Save Details</button>
                   <button type="button" name="submit" class="btn col-md-4 btn-success"  onclick="window.location.href=\'dashboard.php?id=4\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit'])){
                    $dpt = $_REQUEST['dpt'];

                      if(!empty($dpt))
                      {
                        $loginsql="SELECT * FROM department WHERE department_id='".$id."'";
                          $result=mysqli_query($con,$loginsql);
                          $rows=mysqli_fetch_assoc($result);
                          $a = $rows['department'];

                          if($a==$dpt)
                          {
                              echo "<script type=\"text/javascript\"> alert(\"Department Name is already Here\");</script>";
                            }else{ 
                              $query3="UPDATE department SET department='$dpt' WHERE department_id='".$id."'";
                              $sql3=mysqli_query($con,$query3);
                              echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=4\";</script>";
                        }
                      }
                }echo '</form>'; //Register Form Validation

            }
}
  else if(isset($_REQUEST['batch_id'])){

        $id = $_REQUEST['batch_id'];
            $q2 = "SELECT * FROM batch WHERE batch_code='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['batch_code'];

              if($id==$row1['batch_code'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?batch_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <div class="form-group col-md-10">
                      <label for="address"><b>Enter Start Year</b></label>
                      <input type="text" class="form-control"  name="syear" placeholder="Enter Department">
                    </div>

                     <div class="form-group col-md-10">
                      <label for="address"><b>Enter Department</b></label>
                      <input type="text" class="form-control"  name="eyear" placeholder="Enter End Year">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-4 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-4 btn-success"  onclick="window.location.href=\'dashboard.php?id=6\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit'])){
                    $syear = $_REQUEST['syear'];
                    $eyear = $_REQUEST['eyear'];

                      if(!empty($syear))
                      {
                        $loginsql="SELECT * FROM batch WHERE batch_code='".$id."'";
                          $result=mysqli_query($con,$loginsql);
                          $rows=mysqli_fetch_assoc($result);
                          $a = $rows['start_year'];

                          if($a==$syear)
                          {
                              echo "<script type=\"text/javascript\"> alert(\"Start Date is already Here\");</script>";
                            }else{ 
                              $query3="UPDATE batch SET start_year='$syear' WHERE batch_code='".$id."'";
                              $sql3=mysqli_query($con,$query3);
                              echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=6\";</script>";
                        }
                      }

                      if(!empty($eyear))
                      {
                        $loginsql="SELECT * FROM batch WHERE batch_code='".$id."'";
                          $result=mysqli_query($con,$loginsql);
                          $rows=mysqli_fetch_assoc($result);
                          $a = $rows['end_year'];

                          if($a==$eyear)
                          {
                              echo "<script type=\"text/javascript\"> alert(\"End Date is already Here\");</script>";
                            }else{ 
                              $query3="UPDATE batch SET end_year='$eyear' WHERE batch_code='".$id."'";
                              $sql3=mysqli_query($con,$query3);
                              echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=6\";</script>";
                        }
                      }
                }echo '</form>'; //Register Form Validation

            }
}

else if(isset($_REQUEST['lec_id']))
{
            $id = $_REQUEST['lec_id'];
            $q2 = "SELECT * FROM lecture WHERE lecture_id='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['lecture_id'];

              if($id==$row1['lecture_id'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?lec_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name"><b>Full Name</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
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
                      <label for="phone"><b>Enter Gender</b></label>
                      <input type="text" class="form-control" name="gender" placeholder="Enter Gender">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-3 btn-success"  onclick="window.location.href=\'dashboard.php?id=12\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit'])){
                    $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $gender = $_REQUEST['gender'];


                    if(!empty($fname))
                      {
                        $query3="UPDATE lecture SET full_name='$fname' WHERE lecture_id='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=12\";</script>";
                      }
                      if(!empty($emails))
                      {
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){

                          $query1="SELECT * FROM lecture WHERE email='$emails'";
                          $sql1=mysqli_query($con,$query1);


                            if(mysqli_num_rows($sql1)>0)
                            {
                              echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                            }
                            else
                              {
                                $query3="UPDATE lecture SET email='$emails' WHERE lecture_id='".$id."'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='dashboard.php?id=12';</script>";
                              }
                        }
                      }
                      if(!empty($address))
                      {
                        $query3="UPDATE lecture SET address='$address' WHERE lecture_id='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=12\";</script>";
                      }
                      if(!empty($phone))
                      {
                        if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                            $query3="UPDATE lecture SET phone_number='$phone' WHERE lecture_id='".$id."'";
                            $sql3=mysqli_query($con,$query3);
                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=12\";</script>";

                          }else{echo "Enter Valid Phone Number";}
                      }
                      if(!empty($gender))
                      {
                        $loginsql="SELECT * FROM lecture WHERE lecture_id='".$id."'";
                          $result=mysqli_query($con,$loginsql);
                          $rows=mysqli_fetch_assoc($result);
                          $a = $rows['gender'];

                          if($a==$gender)
                          {
                              echo "<script type=\"text/javascript\"> alert(\"Gender already Here\");</script>";
                            }else{ 
                              $query3="UPDATE lecture SET gender='$gender' WHERE lecture_id='".$id."'";
                              $sql3=mysqli_query($con,$query3);
                              echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=12\";</script>";
                        }
                      }
                }echo '</form>'; //Register Form Validation

            }   
}
else if(isset($_REQUEST['edt_id']))
{
            $id = $_REQUEST['edt_id'];
            $q2 = "SELECT * FROM editor WHERE editor_id='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);
              $id = $row1['editor_id'];

              if($id==$row1['editor_id'])
               {
                echo '<form class="reg_form bg-dark text-light" action="edit.php?edt_id='.$id.'" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">

                        <label for="name"><b>Full Name</b></label>
                        <input type="text" class="form-control" name="name" placeholder="Full Name">
                      </div>
                      <div class="form-group col-md-6">
                        <label><b>Email</b></label>
                        <input type="text" class="form-control" name="email" placeholder="Email Address">
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
                      <label for="phone"><b>Enter Gender</b></label>
                      <input type="text" class="form-control" name="gender" placeholder="Enter Gender">
                    </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-success" style="border-radius:20px;">Save Details</button>

                   <button type="button" name="submit" class="btn col-md-3 btn-success"  onclick="window.location.href=\'dashboard.php?id=14\'" style="border-radius:20px;">Goto Back</button>
                  ';

                  if(isset($_POST['submit'])){
                    $fname = $_REQUEST['name'];
                    $emails = $_REQUEST['email'];
                    $address = $_REQUEST['address'];
                    $phone = $_REQUEST['phone'];
                    $gender = $_REQUEST['gender'];


                    if(!empty($fname))
                      {
                        $query3="UPDATE editor SET full_name='$fname' WHERE editor_id='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=14\";</script>";
                      }
                      if(!empty($emails))
                      {
                        if(filter_var($emails, FILTER_VALIDATE_EMAIL)){

                          $query1="SELECT * FROM editor WHERE email='$emails'";
                          $sql1=mysqli_query($con,$query1);


                            if(mysqli_num_rows($sql1)>0)
                            {
                              echo "<script type=\"text/javascript\"> alert(\"Email is already Exsisted\");</script>";
                            }
                            else
                              {
                                $query3="UPDATE editor SET email='$emails' WHERE editor_id='".$id."'";
                                $sql3=mysqli_query($con,$query3);
                                echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location.href='dashboard.php?id=14';</script>";
                              }
                        }
                      }
                      if(!empty($address))
                      {
                        $query3="UPDATE editor SET address='$address' WHERE editor_id='".$id."'";
                        $sql3=mysqli_query($con,$query3);
                        echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=14\";</script>";
                      }
                      if(!empty($phone))
                      {
                        if(preg_match("/^([0]([7189])([071628])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9])([0-9]))$/", $phone)){
                            $query3="UPDATE editor SET phone_number='$phone' WHERE editor_id='".$id."'";
                            $sql3=mysqli_query($con,$query3);
                            echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=14\";</script>";

                          }else{echo "Enter Valid Phone Number";}
                      }
                      if(!empty($gender))
                      {
                        $loginsql="SELECT * FROM editor WHERE editor_id='".$id."'";
                          $result=mysqli_query($con,$loginsql);
                          $rows=mysqli_fetch_assoc($result);
                          $a = $rows['gender'];

                          if($a==$gender)
                          {
                              echo "<script type=\"text/javascript\"> alert(\"Gender already Here\");</script>";
                            }else{ 
                              $query3="UPDATE editor SET gender='$gender' WHERE editor_id='".$id."'";
                              $sql3=mysqli_query($con,$query3);
                              echo "<script type=\"text/javascript\"> alert(\"Updated Succussfully\"); window.location= \"dashboard.php?id=14\";</script>";
                        }
                      }
                }echo '</form>'; //Register Form Validation

            }   
}else{
  echo "Hi";
}
?>

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

  </body>
</html>