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
  <!-- Police Darpan CSS/Js -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <title>Police Darpan | Admin</title>
</head>

<body>     
<div class="inline" id="wrapper">
  <!-- Sidebar-->
  <div class="sidebar inline" id="sidebar-wrapper">
    <div class="sidebar-heading p-1 pr-3 pt-2 text-center">
      <a href="#"><img src="../assets/img/logoRound.png" height="70px" alt="Police Darpan"></a>
    </div>
    <hr class="mb-0 bg-white" width="90%">
    <div class="sidebar-nav">
      <ul class="list-unstyled components">
        <li>
            <a href="#examSubmenu" data-toggle="collapse" aria-expanded="false" class="navitem-shadow text-light"><span class="material-icons">home</span> <span class="ml-5">Home</span></a>
            <ul class="collapse list-unstyled" id="examSubmenu">
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
        <li class="active">
            <a href="#blogSubmenu" class=""  data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="material-icons">admin_panel_settings</i><span class="ml-5"> Admin</span></a>
            <ul class="collapse show list-unstyled" id="blogSubmenu">
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
            $First_Name=$row['First_Name'];
            $Last_Name=$row['Last_Name'];
            echo $First_Name.' '.$Last_Name;
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
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label for="input1">First Name</label>
                        <input type="text" name="First_Name" class="form-control" id="input1" placeholder="First Name" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="input2">Middle Name</label>
                        <input type="text" name="Middle_Name" class="form-control" id="input2" placeholder="Middle Name">
                      </div>
                      <div class="form-group col-md-4">
                        <label for="input3">Last Name</label>
                        <input type="text" name="Last_Name" class="form-control" id="input3" placeholder="Last Name" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputEmail1">Email</label>
                        <input type="email" name="Email" class="form-control" id="inputEmail1" placeholder="Email" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputp">Phone Number</label>
                        <input type="tel" pattern="+[0-9]{2}-[0-9]{5}-[0-9]{5}" name="Phone" class="form-control" value="+91" id="inputp" required>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputA">Access</label>
                        <select id="inputA" name="Access" class="form-control" required>
                          <option value="General">General</option>
                          <option value="Admin">Admin</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="input4">Role</label>
                        <input type="text" name="Role" class="form-control" id="input4" placeholder="Role" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputAddress">Address</label>
                      <input type="text" name="Address" class="form-control" id="inputAddress" placeholder="Enter Address">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCity">City</label>
                        <input type="text" name="City" class="form-control" id="inputCity" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="inputState">State</label>
                        <select id="inputState" name="State" class="form-control" required>
                            <option value="AN">Andaman and Nicobar Islands</option>
                            <option value="AP">Andhra Pradesh</option>
                            <option value="AR">Arunachal Pradesh</option>
                            <option value="AS">Assam</option>
                            <option value="BR">Bihar</option>
                            <option value="CH">Chandigarh</option>
                            <option value="CT">Chhattisgarh</option>
                            <option value="DN">Dadra and Nagar Haveli</option>
                            <option value="DD">Daman and Diu</option>
                            <option value="DL">Delhi</option>
                            <option value="GA">Goa</option>
                            <option value="GJ">Gujarat</option>
                            <option value="HR">Haryana</option>
                            <option value="HP">Himachal Pradesh</option>
                            <option value="JK">Jammu and Kashmir</option>
                            <option value="JH">Jharkhand</option>
                            <option value="KA">Karnataka</option>
                            <option value="KL">Kerala</option>
                            <option value="LA">Ladakh</option>
                            <option value="LD">Lakshadweep</option>
                            <option value="MP">Madhya Pradesh</option>
                            <option value="MH">Maharashtra</option>
                            <option value="MN">Manipur</option>
                            <option value="ML">Meghalaya</option>
                            <option value="MZ">Mizoram</option>
                            <option value="NL">Nagaland</option>
                            <option value="OR">Odisha</option>
                            <option value="PY">Puducherry</option>
                            <option value="PB">Punjab</option>
                            <option value="RJ">Rajasthan</option>
                            <option value="SK">Sikkim</option>
                            <option value="TN">Tamil Nadu</option>
                            <option value="TG">Telangana</option>
                            <option value="TR">Tripura</option>
                            <option value="UP">Uttar Pradesh</option>
                            <option value="UT">Uttarakhand</option>
                            <option value="WB">West Bengal</option>
                        </select>
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputPinCode">Pin Code</label>
                        <input type="text" name="PinCode" class="form-control" id="inputPinCode">
                      </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Regester User</button>
                    <small>Please note down the login details for the User.</small>
                  </form>
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

<script src="../assets/js/dashboard.js"></script>
<script>
    window.setTimeout(function () {
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
       
        $ID = uniqid();
        $First_Name = ucfirst(strtolower($_POST['First_Name']));
        $Middle_Name = ucfirst(strtolower($_POST['Middle_Name']));
        $Last_Name = ucfirst(strtolower($_POST['Last_Name']));
        $Email = $_POST['Email'];
        $Phone = $_POST['Phone'];
        $Access = $_POST['Access'];
        $Role = $_POST['Role'];
        $Address = $_POST['Address'];
        $City = $_POST['City'];
        $State = $_POST['State'];
        $PinCode = $_POST['PinCode'];
        if($_POST['PinCode']!=''){$Pindata = ',`PinCode`';$PinVal = ', "'.$PinCode.'"';}
        else{$Pindata = '';$PinVal = '';}
        $Password = uniqid();
         
        
        $conn = OpenCon();

        $sql = 'INSERT INTO users'. 
           '(`ID`, `First_Name`, `Middle_Name`, `Last_Name`, `Access`, `Role`, `Email`, `Phone`,`Password`,`Address`,`City`,`State`'.$Pindata.') '.
           'VALUES ("'.$ID.'", "'.$First_Name.'", "'.$Middle_Name.'", "'.$Last_Name.'", "'.$Access.'", "'.$Role.'", "'.$Email.'", "'.$Phone.'", "'.$Password.'", "'.$Address.'", "'.$City.'", "'.$State.'"'.$PinVal.')';
        echo $sql;
        $retval = mysqli_query( $conn, $sql);
        
        if(! $retval ) {
           die('Could not enter data: ' . mysqli_error($conn));
        }
        
        echo '<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title w-100" id="myModalLabel">Regestered</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
               Email: <strong>'.$Email.'</strong> Password: <strong>'.$Password.'</strong>
            </div>
            <div class="modal-footer">
            <small>Share on: </small>
              <div class="float-end a2a_kit a2a_kit_size_32 a2a_default_style" data-a2a-url="https://policedarpannews.in/Admin/" data-a2a-title="Email: *'.$Email.'* Password: *'.$Password.'*">
              <a class="a2a_button_whatsapp"></a>
              </div>
              <script async src="https://static.addtoany.com/menu/page.js"></script>
              <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>';
        
        CloseCon($conn);

     }else{

     }
    ?>
</body>
</html>