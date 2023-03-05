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
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Police Darpan CSS/Js -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="../assets/css/imgUpload.css">
  <script src="../assets/js/profileImgUpload.js"></script>
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
  <div class="panel-header" style="height: 124px;">
    <nav class="navbar navbar-expand-lg pt-0">
      <div class="d-flex w-50 mr-auto"><a class="navbar-brand text-light"  href="#" id="sidebarToggle">&#9776; </a>
        <span class="navbar-brand text-light">Regester</span></div>
      <div>
        <a herf="#" role="button" class="navbar-brand text-light">
          <img src="../assets/img/logoRound.png" class="rounded-pill" width="24px" height="24px" alt="Profile">
          <?php
            $conn = OpenCon();
            $sql = "SELECT Role,Email,Phone,First_Name,Middle_Name,Last_Name,Access,DOB,BloodGroup,Address,City,State,PinCode,ProfilePicture
                FROM   users
                WHERE ID = '".$_SESSION['Login_ID']."'";
                $result = mysqli_query($conn,$sql);
            if (!$result) {
                echo "Could not successfully run query ($sql) from DB: " . mysqli_error();
                exit;
            }
            while ($row = mysqli_fetch_assoc($result)) {
            echo $row['First_Name'].' '.$row['Last_Name'];
            
         ?>
        </a>
      </div>
    </nav>
  </div>

 <!-- Create Articel content-->
 <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Profile</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
            <form method="POST" action="#">
            <div class="pl-3 pr-3 pt-3">
            <input type="file" id="pro-image"  accept="image/*" name="imagefiles[]" style="display: none;" multiple>                
                  <div class="border rounded h-100 pt-2 pl-2 mb-2">
                      <a href="javascript:void(0)" onclick="$('#pro-image').click()">Choose Profile Picture</a> <a href="#" class="float-right mr-2" onclick="clearImages()"> <i class="material-icons">delete</i> </a>
                      <input type="hidden" id="profilePicture" value="1">
                      <div class="preview-images-zone h-100 p-2">
                      <?php if ($row['ProfilePicture']==1) { ?>
                            <div class="preview-image preview-show-1">
                            <div class="image-zone"><img id="1" imgId="1" src="/images/thumbnail/<?php echo $_SESSION['Login_ID']."_0"; ?>.jpg?<?php echo uniqid(); ?>"></div>
                            </div>
                            <script>$('#profilePicture').val('1');</script>
                        <?php }  ?>
                      </div>
                  </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputDob">Date of Birth</label>
                        <input type="date" name="DOB" class="form-control" id="profileDob" value="<?php echo $row['DOB']; ?>" placeholder="Date of Birth" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputbg">Blood Group</label>
                        <input type="text" name="BloodGroup" class="form-control" id="profileBloodGroup" value="<?php echo $row['BloodGroup']; ?>" placeholder="Blood Group (A+)" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="profileAddress">Address</label>
                      <input type="text" name="Address" class="form-control" id="profileAddress" value="<?php echo $row['Address']; ?>" placeholder="Enter Address">
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="profileCity">City</label>
                        <input type="text" name="City" class="form-control" value="<?php echo $row['City']; ?>" id="profileCity" required>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="profileState">State</label>
                        <select id="profileState" name="State" class="form-control" required>
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
                        <label for="profilePinCode">Pin Code</label>
                        <input type="text" name="PinCode" class="form-control" value="<?php echo $row['PinCode']; ?>" id="profilePinCode">
                      </div>
                    </div>
            </div>
            <br>
            <div class="p-3  text-center" style="height: 57px; background-color: #e9ecef; border-bottom: 6px solid #353375;">
                <a id="saveProfileBtn" href="#" class="" data-dismiss="modal" aria-label="Close">
                    Save
                </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <script>
    $('#profileState').val('<?php echo $row['State']; ?>');
  </script>
              
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
                  <?php if ($row['ProfilePicture']==1) { ?>
                    <img src="/images/thumbnail/<?php echo $_SESSION['Login_ID']."_0"; ?>.jpg?<?php echo uniqid(); ?>"  style="object-fit:cover;" class="rounded-pill" width="128px" height="128px" alt="Profile">
                  <?php } else { ?>
                    <img src="../assets/img/logoRound.png" style="object-fit:cover;" class="rounded-pill" width="128px" height="128px" alt="Profile">
                  <?php } ?>
                    <div class="mt-3">
                      <h4>
                      <?php echo $row['First_Name'].' '.$row['Middle_Name'].' '.$row['Last_Name']; ?>
                      </h4>
                      <p class="text-secondary mb-1"> 
                      <?php echo $row['Access']; ?>
                      </p>
                      <p class="text-muted font-size-sm">( <?php echo $row['Role']; ?> )</p>
                      <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#editProfile">
                      <div class="spinner-border spinner-border-sm text-primary" id="editProfileLoader" style="display: none;" role="status">
                        <span class="sr-only">Updating...</span>
                      </div>
                      <span class="material-icons" id="editProfileDefault">edit_square</span> Edit Profile
                      </button>
                      <button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#changePassword">
                      <span class="material-icons">lock_reset</span> Change Password
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
                      <h6 class="mb-0">Date of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['DOB']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Blood Group</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <?php echo $row['BloodGroup']; ?>
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
                  <hr>
                  <div class="row">
                    <div class="col-sm-7 mb-2">
                      <select class="form-control" id="certificateType" >
                        <option value="" >Select Document</option>
                        <option value="Membership" >Membership Certificate</option>
                        <option value="Card" disabled>Identity Card</option>
                        <option value="Letter" disabled>Authority Letter</option>
                      </select>
                    </div>
                    <div class="col-sm-5 mb-2 text-secondary">
                    <button type="button" onclick="downloadCertificate()" class="btn btn-outline-primary btn-block" >
                    <div class="spinner-border spinner-border-sm text-primary" id="certificateLoader" style="display: none;" role="status">
                        <span class="sr-only">Updating...</span>
                    </div>
                    <span class="material-icons" id="certificateDefault">download</span> Download
                      </button>
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

    $('#saveProfileBtn').click(function(){
      saveProfile();
    }); 
    const downloadURI = (uri, name) => {
      const link = document.createElement("a");
      link.download = name;
      link.href = uri;
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    }
    function downloadCertificate() {
      let type = $('#certificateType').val();
      if (type == '') {
        alert("Choose a Document");
      }else if (type == 'Membership') {
        $('#certificateLoader').show();
        $('#certificateDefault').hide();
        $.ajax({
            url: "../../certificate/mcert.php",
            type: "POST",
            contentType: false,
            processData:false,
            success: function(result){
              console.log(result);
              if (result == '200 Ok') {
              downloadURI('../../certificate/Membership/<?php echo $_SESSION['Login_ID']; ?>_Certificate.jpg', 'Cerificate.jpg')
              $('#certificateLoader').hide();
              $('#certificateDefault').show();
              }
            }
        });
      }
    }

    function saveProfile() {
      var form = new FormData();
      $( ".preview-images-zone" ).sortable({
        disabled: true
      });

      var totalfiles = document.getElementById('pro-image').files.length;
      for (var index = 0; index < totalfiles; index++) {
        form.append("imagefiles[]", document.getElementById('pro-image').files[index]);
        form.append("imgCap"+(index+1), $('#img-cap-'+(index+1)).val());
      }
      let profileDob =  $('#profileDob').val();
      let profileBloodGroup =  $('#profileBloodGroup').val();
      let profileAddress =  $('#profileAddress').val();
      let profileCity =  $('#profileCity').val();
      let profileState = $('#profileState').val();
      let profilePinCode =  $('#profilePinCode').val();
      let profilePicture =  $('#profilePicture').val();

      if (profileDob=='') {alert('Date of Birth cannot be empty');return 0;}
      if (profileBloodGroup=='') {alert('Blood Group cannot be empty');return 0;}
      else if (profileCity=='') {alert('City cannot be empty');return 0;}
      else if (profileState=='') {alert('Please select a State');return 0;}
      else if (profilePinCode=='') {alert('Pin Code cannot be empty');return 0;}

      form.append("profilePicture", profilePicture);

      $('#profileDob').prop( "disabled", true );
      form.append("profileDob", profileDob);

      $('#profileBloodGroup').prop( "disabled", true );
      form.append("profileBloodGroup", profileBloodGroup);

      $('#profileAddress').prop( "disabled", true );
      form.append("profileAddress", profileAddress);

      $('#profileCity').prop( "disabled", true );
      form.append("profileCity", profileCity);

      $('#profileState').prop( "disabled", true );
      form.append("profileState", profileState);

      $('#profilePinCode').prop( "disabled", true );
      form.append("profilePinCode", profilePinCode);
      
      $('#editProfileLoader').show();
      $('#editProfileDefault').hide();

      $.ajax({
          url: "updateProfile.php",
          type: "POST",
          data:  form,
          contentType: false,
          processData:false,
          success: function(result){
            console.log(result);
            if (result == '200 Ok') {
              alert('Profile Updated');
              window.location.href = "./profile.php";
            $('#editProfileLoader').hide();
            $('#editProfileDefault').show();
            }
          }
      });
    }
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