<?php
session_start();
if(!isset($_SESSION['Edit_Access'])){
  $_SESSION['Login_code'] = 2;
  header("Location: ../index.php");
}

include '../modules/conn.php';

   if($_POST){
    $profilePicture = $_POST['profilePicture'];
    $profileAddress = addslashes($_POST['profileAddress']);
    $profileCity = addslashes($_POST['profileCity']);
    $profileState = addslashes($_POST['profileState']);
    $profilePinCode = addslashes($_POST['profilePinCode']);
    

    
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
      for($i=0;$i<count($_FILES["imagefiles"]["name"]);$i++)  
      {  
      $locations = "../../images/".$_SESSION['Login_ID'].'_0.*';
      $thumbnails = "../../images/thumbnail/".$_SESSION['Login_ID'].'_0.*';
      
      if(array_map('unlink', glob($locations))){
      };

      if(array_map('unlink', glob($thumbnails))){
      };
      
        // $sortindex=();
        $index = $i;

        // File name
        $filename = $_FILES['imagefiles']['name'][$index];
    
        // Valid extension
        $valid_ext = array('png','jpeg','jpg');

        // file extension
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        $file_extension = strtolower($file_extension);

        //New Name
        $filename = $_SESSION['Login_ID']."_".$i.".jpg";


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
    $sql = "UPDATE `users` SET `ProfilePicture`='$profilePicture',`Address`='$profileAddress',`City`='$profileCity',`State`='$profileState',`PinCode`='$profilePinCode' WHERE `ID`='".$_SESSION['Login_ID']."';";
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