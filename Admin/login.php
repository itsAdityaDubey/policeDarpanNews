<?php
session_start();
include './modules/conn.php';

if(!empty($_POST)){
	$username = $_POST['username'];
	$password = $_POST['password'];

	$conn = OpenCon();
	
    $sql = "SELECT ID,Email,Access,Password
        FROM   users
        WHERE Email = '".$username."'";
	echo $sql;
    $result = mysqli_query($conn,$sql);

    if (!$result) {
       echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
       exit;
    }

    if (mysqli_num_rows($result) == 0) {
       echo "Could Not find User";
       exit;
    }

   while ($row = mysqli_fetch_assoc($result)) {
       if($password == $row['Password']){
        $_SESSION['Login_ID'] = $row['ID'];
        $_SESSION['Login_code'] = 1;
		header("Location: ./Dashboard/index.php");
		
		$memberId = $row['ID'];
		$type = $row['Access'];

		$_SESSION["memberId"] = $memberId;
		$_SESSION["Access"] = $type;
		$_SESSION["Edit_Access"] = 'Allow';
        if ($type == 'Admin') {
            $_SESSION["Edit_Admin"] = 'Allow';
        }else {
            $_SESSION["Edit_Admin"] = 'Deny';
        }

       }else{
        header("Location: index.php");
        $_SESSION['Login_code'] = 0;
       }

      
   }

    mysqli_free_result($result);
	CloseCon($conn);

}else {
	echo'Access Forbidden';
}
?>
