<?php
  session_start();
  if(!isset($_SESSION['lec_username'])){
    header('location:login.php');
  }
?>