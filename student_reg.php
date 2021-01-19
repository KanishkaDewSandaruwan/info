<?php 
  require_once 'connection.php'; //insert connection to page
  require_once 'admin.php'; //Check login ?>

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


<style type="text/css">
  .reg_form{
    width: 100%;
    height: 100%;
    margin-left: 5%;

  }


</style>



<?php
$id = $_REQUEST['id'];

            $q2 = "SELECT * FROM student WHERE std_id='$id '";
            $res2 = mysqli_query($con,$q2);

              $row1 = mysqli_fetch_assoc($res2);

             if($id == $row1['std_id'])
             {
               echo '<form class="reg_form" action="student_reg.php" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                  <label class="a text-light ml-2" for="inputState">Lettes Must be Capitale</label>
                  <div class="form-group col-md-8">
                      <label for="phone" ><b>Registration Number</b></label>
                      <input type="text"  style="text-transform: uppercase;" class="form-control" value="SEU/IS/" name="rnum" placeholder="Registration Number">
                    </div>

                  <div class="form-group col-md-6">
                        <label for="inputState"><b>Department</b></label>
                        <select id="inputState" name="dpt" class="form-control">';
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
                        <label for="inputState"><b>Batch</b></label>
                        <select id="inputState" name="batch" class="form-control">';
                          $q3 = "SELECT * FROM batch";
                            $res3 = mysqli_query($con,$q3);
                            $c=1;
                            while($row=mysqli_fetch_assoc($res3)){
                              echo "<option>".$row['start_year']."/".$row['end_year']."</option>";
                              $c++;
                            }
                        echo '</select>
                        </div>

                  <div class="dropdown-divider"></div>
                   <button type="submit" name="submit" class="btn col-md-2 btn-dark" style="border-radius:20px;">Register</button>
                  ';
                  if(isset($_POST['submit'])){
                    $regnum = $_REQUEST['rnum'];
                    $department = $_REQUEST['dpt'];
                    $batch = $_REQUEST['batch'];
                    $trn_date=date("Y-m-d H:i:s");


                    if(!empty($regnum)){
                      if(!empty($department)){
                        if(!empty($batch)){
                          $query3="SELECT * FROM student_reg WHERE reg_number='$regnum'";
                              $sql2=mysqli_query($con,$query3);

                              if(mysqli_num_rows($sql2)>0)
                              {
                                echo "<script>alert(\"Registration Number is already Exsisted\");
                                      </script>";
                              }else{
                                $q1="INSERT INTO student_reg(reg_number,sid,department,batch,date) values('$regnum','".$row1['std_id']."','$department','$batch','$trn_date')";
                                    $res1=mysqli_query($con,$q1);
                                    if( $res1) {
                                      echo "<script>alert(\"Registation is Scussessfully\");

                                      window.location.href=\"dashboard.php?id=2\";
                                      </script>";
                                    }else{
                                      echo "<script>alert(\"it is Not Scussess\");</script>";
                                    }
                              }

                        }else{ echo "Enter Batch";}
                      }else{ echo "Enter Department";}
                    }else{ echo "Enter Registration Number";} 
                }echo '</form>'; //Register Form Validation
              }
 ?>