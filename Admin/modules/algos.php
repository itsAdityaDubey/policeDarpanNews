<?php
    function getFullArticle($id)
        {
            $conn = OpenCon();

            $sql = "SELECT * FROM `Articles` WHERE `Id`='".$id."';";

            $result = mysqli_query($conn,$sql);

            if (!$result) {
                echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
                exit;
            }
            $row = mysqli_fetch_assoc($result);

            global $Title;
            global $Article;
            global $ImgListSize;
            global $YoutubeId;
            global $Date;
            global $State;
            global $District;
            global $Category;
            global $ImgCap1;
            global $ImgCap2;
            global $ImgCap3;
            global $ImgCap4;
            global $ImgCap5;

            $Title = $row['Title'];
            $Article = $row['Article'];
            $ImgListSize = $row['ImgListSize'];
            $YoutubeId = $row['YoutubeId'];
            $Date = $row['Date'];
            $State = $row['State'];
            $District = $row['District'];
            $Category = $row['Category'];
            $ImgCap1=$row['ImgCap1'];
            $ImgCap2=$row['ImgCap2'];
            $ImgCap3=$row['ImgCap3'];
            $ImgCap4=$row['ImgCap4'];
            $ImgCap5=$row['ImgCap5'];

            CloseCon($conn);
        }
?>