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
  <!-- Aspire CSS/Js -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <title>Aspire | Admin</title>
</head>

<body>     
<div class="inline" id="wrapper">
  <!-- Sidebar-->
  <div class="sidebar inline" id="sidebar-wrapper">
    <div class="sidebar-heading p-1 pr-3 pt-2 text-center">
      <a href="./"><img src="../assets/img/logo.png" height="40px" alt="Aspire"></a>
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
        <?php if($_SESSION["Edit_Admin"]=='Allow'){ ?>
        <li>
            <a href="#blogSubmenu" class="navitem-shadow text-light"  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">admin_panel_settings</i><span class="ml-5"> Admin</span></a>
            <ul class="collapse list-unstyled" id="blogSubmenu">
                <li>
                    <a class="text-light" href="#"><span class="material-icons">manage_accounts</span><span class="ml-5"> Manage Accounts</span></a>
                </li>
                <li>
                    <a class="text-light" href="./regester.php"><span class="material-icons">how_to_reg</span><span class="ml-5"> Regester User</span></a>
                </li>
            </ul>
        </li>
        <?php } ?>
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
        <span class="navbar-brand text-light">Regester</span></div>
      <div>
        <a herf="#" role="button" class="navbar-brand text-light">
          <img src="../assets/img/logoRound.png" class="rounded-pill" width="24px" height="24px" alt="Profile">
          <?php
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
            CloseCon($conn);
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
                <form class="form-signin" method="POST" action="./article.php">
                  <div class="btn-group btn-group-toggle mb-3 w-100" data-toggle="buttons">
                    <label class="btn btn-warning active">
                      <input type="radio" name="type" value="text"" onclick="document.getElementById('formUrl').placeholder = 'Article Name';" autocomplete="off" checked> Text
                    </label>
                    <label class="btn btn-warning">
                      <input type="radio" name="type" value="url" onclick="document.getElementById('formUrl').placeholder = 'Video Url';" autocomplete="off"> Video
                    </label>
                  </div>
                  <textarea name="url" class="form-control mb-2" id="formUrl" placeholder="Article Name" autocomplete="off" required></textarea>
                  
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
 <div class="container-fluid content">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 div-shadow">
            <div class="card-body ">
              <h2 class="lead">Students Responces</h2>
              <input class="form-control" id="filterres" type="text" placeholder="Search">
              <br>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 15%">Article Id</th>
                    <th style="width: 45%">Title</th>
                    <th style="width: 15%">Views</th>
                    <th style="width: 20%">Action</th>
                  </tr>
                </thead>
                <tbody id="resTable">
              <?php
              include '../modules/conn.php';
              $conn = OpenCon();
              $options = '';
              $sql = "SELECT resmain.testId, resmain.evaluate, resmain.publish,  resmain.resId, main.name
              FROM resmain
              INNER JOIN main ON resmain.testId = main.testId 
               WHERE attempt != 0 && type = 'Primary'";
                  
                  $result = mysqli_query($conn,$sql);
                  
                  if (!$result) {
                      echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
                      exit;
                  }
  
                  if (mysqli_num_rows($result) == 0) {
                      echo '<p class="text-muted h6">No Responces Found</p>';
                      }
  
                  while ($row = mysqli_fetch_assoc($result)) {
                      $testname = $row['name'];
                      $testId = $row['testId'];
                      $resId = $row['resId'];
                      $evaluate = $row['evaluate'];
                      $publish = $row['publish'];
                  echo'
                  <tr>
                    <td>'.$resId.'</td>
                    <td>-</td>
                    <td>'.$testname.'('.$testId.')</td>
                    <td>
                      <div class="form-group">
                        <button testId="'.$testId.'" resId="'.$resId.'" class="btn-inline mx-2 btn btn-info evaluate"';
                        if ($evaluate == 1) {
                          echo ' disabled';
                        }
                        echo'> <i class="bi bi-clipboard-check"></i>&nbsp;&nbsp;Evaluate&nbsp;&nbsp;</button>
                        <button testId="'.$testId.'" resId="'.$resId.'" class="btn-inline mx-2 mt-1 btn btn-success publish"';
                        if ($evaluate != 1) {
                          echo ' disabled ';
                        }
                        if ($publish == 1) {
                          echo ' disabled';
                        }
                        echo'><i class="bi bi-check-all"></i>&nbsp;&nbsp;Publish&nbsp;&nbsp;</button>
                      </div></td>
                  </tr>';
                  }
                  ?>
                </tbody>
              </table>
              <form id="evaluteTest" action="./Evaluate/index.php" method="post"></form>
              <form id="publishTest" action="./Evaluate/publish.php" method="post"></form>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid p-4 ">
        <p class="text-muted float-right">
          <a href="#" id="back-to-top" class="text-muted">Back to top</a>
        </p>
        <p class="text-muted">Designed with <i class="bi bi-suit-heart-fill text-danger"></i> by Aditya Dubey <a href="https://www.linkedin.com/in/itsadityadubey" target="_blank" class="text-info"><i class="bi bi-linkedin"></i> | <i class="bi bi-twitter"></i> @itsadityadubey</a>.
        </p>
    </div>
  </div>
</div>

<script src="../assets/js/dashboard.js"></script>
</body>
</html>