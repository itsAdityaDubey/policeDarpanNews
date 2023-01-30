<?php
 session_start();
 if(isset($_SESSION['Edit_Access'])){
   if($_SESSION['Edit_Access'] != "Allow"){
     header("Location: ../index.php");
     }
 }else {
   header("Location: ../index.php");
 }

 include '../modules/conn.php';
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
  <link rel="shortcut icon" href="../assets/img/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <title>Aspire | Admin</title>
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
        <span class="navbar-brand text-light">Regester</span></div>
      <div>
        <a herf="#" role="button" class="navbar-brand text-light">
          <span class="material-icons">account_circle</span> 
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


            <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card shadow-sm">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                  <span class="material-icons" style="vertical-align: text-bottom;font-size: 96px;">account_circle</span> 
                    <div class="mt-3">
                      <h4>
                      <?php echo $row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name']; ?>
                      </h4>
                      <p class="text-secondary mb-1"> 
                      <?php echo $row['Access']; ?>
                      </p>
                      <p class="text-muted font-size-sm">( <?php echo $row['Role']; ?> )</p>
                      <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#changePassword">
                        Change Password
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card  shadow-sm mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['Email']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['Phone']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['Address'].', '.$row['City'].', '.$row['State'].', '.$row['PinCode'];
                            }
                            mysqli_free_result($result);
                      ?>
                    </div>
                  </div>
                </div>
              </div>
              </div>
            </div>



            </div>
          </div>
        </div>
      </div>
    </div>
    

<!-- Modal -->
<div class="modal fade" id="changePassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="exampleModalLabel">Change Password</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form class="form-signin"  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
          <div class="modal-body">
            <div class="form-group mb-2">
              <input type="password" name="Old_Password" id="Old_Password" class="form-control" placeholder="Old Password">
            </div>
            <div class="form-group mb-2">
              <input type="password" name="New_Password" id="New_Password" class="form-control" placeholder="New Password">
            </div>
            <div class="form-group mb-2">
              <input type="password" name="Re-Password" id="Re_Password" class="form-control" placeholder="Re-Enter Password">
            </div>
            <small class="text-danger" id="editpasscheck"></small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit"  id="changepass" class="btn btn-primary">Change</button>
        </div>
      </form>
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


<script src="../assets/js/dashboard.js"></script>
<script>
       window.setTimeout(function(){
        $('#centralModal').modal('toggle');
       }, 500); 

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
    </script>


<?php 
     if(!empty($_POST)){
        
        $ID = $_SESSION['memberId'];
        $Password = $_POST['Old_Password'];
        $New_Password = $_POST['New_Password'];
        
        $change = 0;
        
        $sql = "SELECT Password
           FROM   users
           WHERE ID = '".$_SESSION['Login_ID']."'";
           $result = mysqli_query($conn,$sql);
       if (!$result) {
          echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
          exit;
       }
      while ($row = mysqli_fetch_assoc($result)) {
        if ($row['Password'] == $Password) {
            $change = 1;
        }
         
      }
      mysqli_free_result($result);

        if ($change == 1) {

        $sql = 'UPDATE `users` SET `Password`="'.$New_Password.'" WHERE `ID` = "'.$ID.'"';
           
        $retval = mysqli_query( $conn, $sql);
        
        if(! $retval ) {
           die('Could not enter data: ' . mysqli_error($conn));
        }
        // mysqli_close($conn);
        
        echo '<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
           <strong>Password Updated successfully</strong>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
        </div>';
        }else{
          
        echo '<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
            <strong>Old-Password was incorrect</strong>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
         </div>';
        }
     }else{

     }

    CloseCon($conn);
    ?>

</body>
</html>