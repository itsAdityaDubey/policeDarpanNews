<?php
function OpenCon()
 {
    $servername = "localhost";
    $username = "root";
    $password = "FBXuHoYVC5N3xc";
    $dbname = "news";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }
   
?>