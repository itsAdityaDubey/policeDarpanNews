<?php
    include 'conn.php';

    $idCounter=0;
    
    function getArticleIds($offset='0')
    {
        $conn = OpenCon();

        global $newsIds;

        $newsIds = array();

        // Query Working
        $sql = "SELECT id FROM `Articles` WHERE `Status`='Saved' ORDER BY `Date` DESC,`Views` DESC LIMIT 25 OFFSET $offset;";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        exit;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($newsIds,$row['id']);
        }
        
        $offset+=25;
        CloseCon($conn);
    }
    function getTrandingIds($limit='0')
    {
        $conn = OpenCon();

        global $trendsIds;

        $trendsIds = array();

        // Query Working
        $sql = "SELECT id FROM `Articles` WHERE `Status`='Saved' ORDER BY `Views` DESC, `Date` DESC LIMIT $limit;";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
        echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
        exit;
        }

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($trendsIds,$row['id']);
        }
        
        CloseCon($conn);
    }

    function articleData($id)
    {
        $conn = OpenCon();

  mysql_query("SET NAMES utf8");
        global $Title;
        global $thumbnailUrl;
        global $Date;
        global $YoutubeId;
        global $District; 
        global $Category;

        $sql = "SELECT Title, ImgListSize, YoutubeId, Date, District, Category FROM `Articles` WHERE `Id`='$id';";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
            exit;
        }
        $row = mysqli_fetch_assoc($result);

        $Title = $row['Title'];
        $ImgListSize = $row['ImgListSize'];
        $YoutubeId = $row['YoutubeId'];
        $Date = $row['Date'];
        $District = $row['District'];
        $Category = $row['Category'];

        if ($YoutubeId!='') {
            $thumbnailUrl = 'https://img.youtube.com/vi/'.$row['YoutubeId'].'/0.jpg';
        }else if ($ImgListSize>0) {
            $thumbnailUrl = './images/thumbnail/'.$id.'_0.jpg';
        }else {
            $thumbnailUrl='';
        }
        CloseCon($conn);
    }

    function getBreaking($category)
    {
        $conn = OpenCon();

        global $Title;
        global $Id;
        $Title='';
        $Id='';

        $sql = "SELECT Id, Title FROM `Articles` WHERE `Status`='Saved' AND `Category`='$category' ORDER BY `Date` DESC, `Views` DESC LIMIT 1;";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
            exit;
        }
        if($row = mysqli_fetch_assoc($result)){
            $Title = $row['Title'];
            $Id = $row['Id'];
        }

        CloseCon($conn);
    }

    function viewCounter($id)
    {
        $conn = OpenCon();

        $sql = "UPDATE `Articles` SET `Views`=`Views`+1 WHERE `Id`='$id';";

        $result = mysqli_query($conn,$sql);

        if (!$result) {
            echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
            exit;
        }

        CloseCon($conn);
    }
?>