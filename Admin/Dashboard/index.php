<?php
 session_start();
 if(isset($_SESSION['Edit_Access'])){
   if($_SESSION['Edit_Access'] != "Allow"){
     header("Location: ../index.php");
     }
 }else {
   header("Location: ../index.php");
 }
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSS/Js -->
  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Police Darpan CSS/Js -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <script src="../assets/js/dashboard.js"></script>
  <title>Police Darpan | Admin</title>
</head>

<body>     
<div class="inline" id="wrapper">
  <!-- Sidebar-->
  <div class="sidebar inline" id="sidebar-wrapper">
    <div class="sidebar-heading p-1 pr-3 pt-2 text-center">
      <a href="./"><img src="../assets/img/logoRound.png" height="70px" alt="Police Darpan"></a>
    </div>
    <hr class="mb-0 bg-white" width="90%">
    <div class="sidebar-nav">
      <ul class="list-unstyled components">
        <li class="active">
            <a href="#examSubmenu" data-toggle="collapse" aria-expanded="false" class=""><span class="material-icons">home</span> <span class="ml-5">Home</span></a>
            <ul class="collapse show list-unstyled" id="examSubmenu">
                <li>
                    <a class="text-light" href="./"><span class="material-icons">dashboard</span>  <span class="ml-5">Dashboard</span></a>
                </li>
                <li>
                    <a class="text-light" href="./profile.php"><span class="material-icons">account_circle</span><span class="ml-5"> Profile</span></a>
                </li>
                
                <li>
                    <a class="text-light" href="#" data-toggle="modal" data-target="#createTestModal"><span class="material-icons">newspaper</span><span class="ml-5"> Create New Article</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#blogSubmenu" class="navitem-shadow text-light"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">admin_panel_settings</i><span class="ml-5"> Admin</span></a>
            <ul class="collapse list-unstyled" id="blogSubmenu">
                <li>
                    <a class="text-light" href="#"><span class="material-icons">manage_accounts</span><span class="ml-5"> Manage Accounts</span></a>
                </li>
                <li>
                    <a class="text-light" href="#"><span class="material-icons">how_to_reg</span><span class="ml-5"> Regester User</span></a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#" class="navitem-shadow text-light"><span class="material-icons">question_answer</span><span class="ml-5"> Feedback</span></a>
        </li>
        <li>
            <a href="../logout.php" class="navitem-shadow bg-danger text-light"><span class="material-icons">logout</span><span class="ml-5"> Logout</span></a>
        </li>
    </ul>
</div>
</div>
 <!-- Page content wrapper-->
 <div class="inline" id="page-content-wrapper">
  <!-- Top navigation-->
  <div class="panel-header" style="height: 100px;">
    <nav class="navbar navbar-expand-lg pt-0">
      <div class="d-flex w-50 mr-auto"><a class="navbar-brand text-light"  href="#" id="sidebarToggle">&#9776; </a>
        <span class="navbar-brand text-light">Dashboard</span></div>
      <div>
        <a herf="#" role="button" class="navbar-brand text-light">
          <span class="material-icons">account_circle</span> 
          <?php
            include '../modules/conn.php';
            $conn = OpenCon();
            $sql = "SELECT Role,Email,Phone,First_Name,Middle_Name,Last_Name,Access,Address,City,State,PinCode
                FROM   users
                WHERE ID = '".$_SESSION['Login_ID']."'";
                $result = mysqli_query($conn,$sql);
            if (!$result) {
                echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
                exit;
            }
            while ($row = mysqli_fetch_assoc($result)) {
            echo $row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name'];
            }
         ?>
        </a>
      </div>
    </nav>
  </div>

 <!-- Create Articel content-->
 <div class="modal fade" id="createTestModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Create Article</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
            <div class="pl-3 pr-3 pt-3">
                <form id="createArticle" class="form-signin" method="POST" action="./article.php">
                  <input type="hidden" name="id" id="articleId" value="">
                  <div class="btn-group btn-group-toggle mb-3 w-100" data-toggle="buttons">
                    <label class="btn btn-warning active">
                      <input type="radio" name="type" value="text"" onclick="document.getElementById('articleUrl').placeholder = 'Article Name';" autocomplete="off" checked> Text
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="type" value="url" onclick="document.getElementById('articleUrl').placeholder = 'Video Url';" autocomplete="off"> Video
                    </label>
                  </div>
                  <textarea name="title" class="form-control mb-2" id="articleUrl" placeholder="Article Name" autocomplete="off" required></textarea>
                  
                  <button type="submit"  class="btn btn-info btn-block"> Creat </button>
                </form>
            </div>
            <br>
            <div class="p-3  text-center" style="height: 57px; background-color: #e9ecef; border-bottom: 6px solid #353375;">
                <a href="#" class="" data-dismiss="modal" aria-label="Close">
                    <p>Cancel</p>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>

 <!-- Page content-->
 <div class="container content">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 div-shadow">
            <div class="card-body ">
                      
        <?php
        
        // Query
        $sql = "SELECT `Id` FROM `Articles`";
        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result) == 0) {
          echo '<h6 class="head-sl text-muted blockquote-footer"><i>&nbsp; No Test(s) / Assignment(s) Created   &nbsp;</i></h6><br><br><br><br><br><br>';
        }

        // Query Working
        $sql = "SELECT `Id`, `Title`, `Date`, `Status`,  `YoutubeId`, `ImgListSize` FROM `Articles` WHERE `Status` = 'Working' ORDER BY DateTime DESC;";
        
        $result = mysqli_query($conn,$sql);
        
        if (!$result) {
          echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
          exit;
        }

        if (mysqli_num_rows($result) == 0) {}else {
          echo '<h6 class="text-info mb-3"><i>&nbsp; Articles(s) Working   &nbsp;</i></h6>';
        }

        echo'<div class="row">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
         <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" style="max-height: 250px;object-fit: cover;" src="'; 
              if ($row['YoutubeId']!='') {
                echo 'https://img.youtube.com/vi/'.$row['YoutubeId'].'/0.jpg';
              } else if ($row['ImgListSize']>0){
                echo '../../images/thumbnail/'.$row['Id'].'_0.jpg';
              } else {
                echo '../assets/img/testImage.jpg';
              };
              echo '" alt="Card image cap">
              <div class="card-body">
                <p class="card-text ">'.$row['Title'].' </br>
                <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-';
                if ($row['Status'] == "Working") {
                    echo 'danger';
                }elseif ($row['Status'] == "Draft") {
                    echo 'secondary';
                }
                else{
                    echo 'success';
                }
                echo'">'.$row['Status'].'</span></p>
                  <small class="text-muted p-1 deleteArticle" role="button" articleId="'.$row['Id'].'"> <i class="material-icons">delete</i> </small>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="../../article.php?a='.$row['Id'].'" target="_blank" type="button" class="btn btn-sm btn-outline-secondary viewTest">View</a>
                    <button type="button" class="btn btn-sm btn-outline-secondary editTest">Edit</button>
                  </div>
                  <small class="text-muted">'.$row['Date'].'</small>
                </div>
              </div>
            </div>
          </div>';
        }
        echo'</div>';

        // Query Draft
        $sql = "SELECT `Id`, `Title`, `Date`, `Status`,  `YoutubeId`, `ImgListSize` FROM `Articles` WHERE `Status` = 'Draft' ORDER BY DateTime DESC;";
        // $sql = "SELECT `testId`, `name`,`date`,`status` FROM `main` WHERE `status` = 'Draft' ORDER BY Sdate DESC;";
        
        $result = mysqli_query($conn,$sql);
        
        if (!$result) {
          echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
          exit;
        }

        if (mysqli_num_rows($result) == 0) {}else {
          echo '<h6 class="text-info mb-3"><i>&nbsp; Articles(s) Drafted   &nbsp;</i></h6>';
       }

       echo'<div class="row">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
         <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" style="max-height: 250px;object-fit: cover;" src="'; 
              if ($row['YoutubeId']!='') {
                echo 'https://img.youtube.com/vi/'.$row['YoutubeId'].'/0.jpg';
              } else if ($row['ImgListSize']>0){
                echo '../../images/thumbnail/'.$row['Id'].'_0.jpg';
              } else {
                echo '../assets/img/testImage.jpg';
              };
              echo '" alt="Card image cap">
              <div class="card-body">
                <p class="card-text ">'.$row['Title'].' </br>
                <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-';
                if ($row['Status'] == "Working") {
                    echo 'danger';
                }elseif ($row['Status'] == "Draft") {
                    echo 'primary';
                }
                else{
                    echo 'success';
                }
                echo'">'.$row['Status'].'</span></p>
                  <small class="text-muted p-1 deleteArticle" role="button" articleId="'.$row['Id'].'"> <i class="material-icons">delete</i> </small>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="../../article.php?a='.$row['Id'].'" target="_blank" type="button" class="btn btn-sm btn-outline-success viewTest">View</a>
                    <button type="button" class="btn btn-sm btn-outline-success editTest">Edit</button>
                  </div>
                  <small class="text-muted">'.$row['Date'].'</small>
                </div>
              </div>
            </div>
          </div>';
        }
        echo'</div>';

        // Query Saved
        $sql = "SELECT `Id`, `Title`, `Date`, `Status`,  `YoutubeId`, `ImgListSize` FROM `Articles` WHERE `Status` = 'Saved' ORDER BY DateTime DESC;";
        
        $result = mysqli_query($conn,$sql);
        
        if (!$result) {
          echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
          exit;
        }

        if (mysqli_num_rows($result) == 0) {}else {
          echo '<h6 class="text-info mb-3"><i>&nbsp; Article(s) Saved   &nbsp;</i></h6>';
        }

        echo'<div class="row">';

        while ($row = mysqli_fetch_assoc($result)) {
            echo '
         <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" style="max-height: 250px;object-fit: cover;" src="'; 
              if ($row['YoutubeId']!='') {
                echo 'https://img.youtube.com/vi/'.$row['YoutubeId'].'/0.jpg';
              } else if ($row['ImgListSize']>0){
                echo '../../images/thumbnail/'.$row['Id'].'_0.jpg';
              } else {
                echo '../assets/img/testImage.jpg';
              };
              echo '" alt="Card image cap">
              <div class="card-body">
                <p class="card-text ">'.$row['Title'].' </br>
                <div class="d-flex justify-content-between align-items-center mb-2">
                <span class="badge badge-';
                if ($row['Status'] == "Working") {
                    echo 'danger';
                }elseif ($row['Status'] == "Draft") {
                    echo 'primary';
                }
                else{
                    echo 'success';
                }
                echo'">'.$row['Status'].'</span></p>
                  <small class="text-muted p-1 deleteArticle" role="button" articleId="'.$row['Id'].'"> <i class="material-icons">delete</i> </small>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    <a href="../../article.php?a='.$row['Id'].'" target="_blank" type="button" class="btn btn-sm btn-outline-primary viewTest">View</a>
                    <a type="button" class="btn btn-sm btn-outline-primary editTest">Edit</a>
                  </div>
                  <small class="text-muted">'.$row['Date'].'</small>
                </div>
              </div>
            </div>
          </div>';
        }
        echo'</div>';

        CloseCon($conn);
    ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container p-4">
        <p class="text-muted float-right">
          <a href="#" id="back-to-top" class="text-muted">Back to top</a>
        </p>
        <p class="text-muted">Designed with <i class="bi bi-suit-heart-fill text-danger"></i> by Aditya Dubey <a href="https://www.linkedin.com/in/itsadityadubey" target="_blank" class="text-info"><i class="bi bi-linkedin"></i> | <i class="bi bi-twitter"></i> @itsadityadubey</a>.
        </p>
      </div>
  </div>
</div>

<script>
    
    $("#createArticle").submit(function(e){
      // e.preventDefault();
      if ($("#createArticle").find('input[name="type"]:checked').val()=='url') {
        let url = $("#articleUrl").val();
        let id = YouTubeGetID(url);
        if (id!='Error: Cannot Find Id') {
          $("#articleId").val(id);
        }else{
          alert('URL Incorrect, Could not find Youtube video Id.');
          return false;
        }
      }else{
        $("#articleId").val('');
      }
      return true;
    });

    $( ".deleteArticle" ).click(function() {
      let Id = $(this).attr("articleId");
      var form = new FormData();
      form.append("Id", Id);
      $.ajax({
          url: "deleteArticle.php",
          type: "POST",
          data:  form,
          contentType: false,
          processData:false,
          success: function(result){
            console.log(result);
              if (result == '200 Ok') {
                alert('Deleted Successfully');
                window.location.href = "./";
              }else {
                alert('Could Not Delete Article.');
              }
          }
      });
    });
    
  </script>

</body>
</html>