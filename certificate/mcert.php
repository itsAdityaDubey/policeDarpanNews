<?php
session_start();
if(isset($_SESSION['Edit_Access'])){
  if($_SESSION['Edit_Access'] != "Allow"){
    header("Location: ../index.php");
    }
}else {
$_SESSION['Login_code'] = 2;
  header("Location: ../index.php");
}

include 'createMC.php';
if (file_exists("Membership/".$_SESSION['Login_ID']."_Certificate.jpg")) {
    echo '200 Ok';
}else {
    createCertificate($_SESSION['Login_ID']);
}
?>