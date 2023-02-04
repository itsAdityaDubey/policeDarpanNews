<?php
session_start();
if(!isset($_SESSION['Edit_Access'])){
  $_SESSION['Login_code'] = 2;
  header("Location: ../index.php");
}

include '../modules/conn.php';

   if($_POST){

    $articleId = addslashes($_POST['articleId']);
    $youtubeId = addslashes($_POST['youtubeId']);
    $articleTitle = addslashes($_POST['articleTitle']);
    $articleDistrict = addslashes($_POST['articleDistrict']);
    $articleCategory = addslashes($_POST['articleCategory']);
    $youtubeId = addslashes($_POST['youtubeId']);
    $articleData = addslashes($_POST['articleData']);
    $articleStatus = addslashes($_POST['articleStatus']);
    
    
    
    if (isset($_POST['imgCap1'])) {$ImgCap1 = addslashes($_POST['imgCap1']);}else {$ImgCap1 = '';}
    if (isset($_POST['imgCap2'])) {$ImgCap2 = addslashes($_POST['imgCap2']);}else {$ImgCap2 = '';}
    if (isset($_POST['imgCap3'])) {$ImgCap3 = addslashes($_POST['imgCap3']);}else {$ImgCap3 = '';}
    if (isset($_POST['imgCap4'])) {$ImgCap4 = addslashes($_POST['imgCap4']);}else {$ImgCap4 = '';}
    if (isset($_POST['imgCap5'])) {$ImgCap5 = addslashes($_POST['imgCap5']);}else {$ImgCap5 = '';}

    $sortList = trim($_POST['sortList']);
    $sortListArr =  explode(" ", $sortList);
    if ($sortList != '') {
      $noImgs = count($sortListArr);
    }else{
      $noImgs = 0;
    }
    
    // Compress image
    function compressImage($type,$source, $destination, $quality) {

      $info = getimagesize($source);

      if ($type == 'image/jpeg') 
        $image = imagecreatefromjpeg($source);

      elseif ($type == 'image/gif') 
        $image = imagecreatefromgif($source);

      elseif ($type == 'image/png') 
        $image = imagecreatefrompng($source);

      imagejpeg($image, $destination, $quality);

    }

    $imageCheck=1;
    if (isset($_FILES["imagefiles"]["name"])) {
      $imageCheck=0;

      $locations = "../../images/".$articleId.'*.*';
      $thumbnails = "../../images/thumbnail/".$articleId.'*.*';

      if(array_map('unlink', glob($locations))){
          echo 'al';
      };

      if(array_map('unlink', glob($thumbnails))){
          echo 'al';
      };
      
      for($i=0;$i<count($_FILES["imagefiles"]["name"]);$i++)  
      {  
        // $sortindex=();
        $index = ((int)$sortListArr[$i])-1;

        // File name
        $filename = $_FILES['imagefiles']['name'][$index];
    
        // Valid extension
        $valid_ext = array('png','jpeg','jpg');

        // file extension
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        //New Name
        $filename = $articleId."_".$i.".jpg";


        // Location
        $location = "../../images/".$filename;
        $thumbnail_location = "../../images/thumbnail/".$filename;

        // Check extension
        if(in_array($file_extension,$valid_ext)){ 
            
          // Upload file
          if(move_uploaded_file($_FILES['imagefiles']['tmp_name'][$index],$location)){

            
            // Compress Image
            if ($i==0) {
              compressImage($_FILES['imagefiles']['type'][$index],$location,$thumbnail_location,60);
            }
            
            $imageCheck=1;
          }

        }else{
            $imageCheck=0;
        }
      }

      

    }
    $articleCheck=0;

    $conn = OpenCon();
    $sql = "UPDATE `Articles` SET `Title`='$articleTitle', `Article`='$articleData', `District`='$articleDistrict', `Category`='$articleCategory', `Status`='$articleStatus', `ImgListSize`='$noImgs', `ImgCap1`='$ImgCap1', `ImgCap2`='$ImgCap2', `ImgCap3`='$ImgCap3', `ImgCap4`='$ImgCap4', `ImgCap5`='$ImgCap5', `YoutubeId`='$youtubeId', `WriterId`='".$_SESSION["memberId"]."'
    WHERE `Id`= '$articleId'";
        $result = mysqli_query($conn,$sql);
    if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        echo '400 ERROR';
    }else{
      $articleCheck=1;
    }
    if ($articleCheck==1&&$imageCheck==1) {
      echo '200 Ok';
    }

    CloseCon($conn);
  }

   ?>
