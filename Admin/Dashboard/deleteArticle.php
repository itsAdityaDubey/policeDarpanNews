<?php
session_start();
if(!isset($_SESSION['Edit_Access'])){
$_SESSION['Login_code'] = 2;
  header("Location: ../index.php");
}

include '../modules/conn.php';

if($_POST){
    $Id = $_POST['Id'];
    $conn = OpenCon();
    $sql = "DELETE FROM `Articles` WHERE `Id` = '$Id'";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        echo '\n400 ERROR';
    }else{
        echo '200 Ok';
    }
    CloseCon($conn);
}
?>