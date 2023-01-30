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
 include '../modules/youtube.php';
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
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
  
  
  <!-- Police Darpan CSS/Js -->
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="../assets/css/main.css">
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <link rel="stylesheet" href="../assets/css/imgUpload.css">
  <script src="../assets/js/imgUpload.js"></script>
  <title>Police Darpan | Admin</title>
  <style>
    .hytPlayerWrap {
        display: inline-block;
        position: relative;
    }

    .hytPlayerWrap.ended::after {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        cursor: pointer;
        background-color: black;
        background-repeat: no-repeat;
        background-position: center;
        background-size: 64px 64px;
        background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMjgiIGhlaWdodD0iMTI4IiB2aWV3Qm94PSIwIDAgNTEwIDUxMCI+PHBhdGggZD0iTTI1NSAxMDJWMEwxMjcuNSAxMjcuNSAyNTUgMjU1VjE1M2M4NC4xNSAwIDE1MyA2OC44NSAxNTMgMTUzcy02OC44NSAxNTMtMTUzIDE1My0xNTMtNjguODUtMTUzLTE1M0g1MWMwIDExMi4yIDkxLjggMjA0IDIwNCAyMDRzMjA0LTkxLjggMjA0LTIwNC05MS44LTIwNC0yMDQtMjA0eiIgZmlsbD0iI0ZGRiIvPjwvc3ZnPg==);
    }

    .hytPlayerWrap.paused::after {
        content: "";
        position: absolute;
        top: 70px;
        left: 0;
        bottom: 50px;
        right: 0;
        cursor: pointer;
        /* background-color: black; */
        background-repeat: no-repeat;
        background-position: center;
        background-size: 40px 40px;
        background-image: url(data:image/svg+xml;utf8;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZlcnNpb249IjEiIHdpZHRoPSIxNzA2LjY2NyIgaGVpZ2h0PSIxNzA2LjY2NyIgdmlld0JveD0iMCAwIDEyODAgMTI4MCI+PHBhdGggZD0iTTE1Ny42MzUgMi45ODRMMTI2MC45NzkgNjQwIDE1Ny42MzUgMTI3Ny4wMTZ6IiBmaWxsPSIjZmZmIi8+PC9zdmc+);
    }
</style>
</head>

<body>     
<div class="inline" id="wrapper">
  <!-- Sidebar-->
  <div class="sidebar inline" id="sidebar-wrapper">
    <div class="sidebar-heading text-light p-1 pr-3 pt-2 text-center">
      <a href="#"><img src="../assets/img/logoRound.png" height="70px" alt="Police Darpan"></a>
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
            <a href="#blogSubmenu" data-toggle="collapse" aria-expanded="false" class="navitem-shadow text-light"><i class="material-icons">admin_panel_settings</i><span class="ml-5"> Admin</span></a>
            <ul class="collapse list-unstyled" id="blogSubmenu">
                <li>
                    <a class="text-light" href="#"><span class="material-icons">manage_accounts</span><span class="ml-5"> Manage Accounts</span></a>
                </li>
                <li>
                    <a class="text-light" href="./regester.php"><span class="material-icons">how_to_reg</span><span class="ml-5"> Regester User</span></a>
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
  <div class="panel-header" style="height: 124px;">
    <nav class="navbar navbar-expand-lg pt-0">
      <div class="d-flex w-50 mr-auto"><a class="navbar-brand text-light"  href="#" id="sidebarToggle">&#9776; </a>
        <span class="navbar-brand text-light">Profile</span></div>
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
            echo $row['First_Name'].' '.$row['Last_Name'];
            }
            CloseCon($conn);
         ?>
        </a>
      </div>
    </nav>
    <div class="container px-4 pb-2">
      <span class="text-light">ID: <?php $articleId = uniqid(); echo $articleId; ?> &nbsp;
        <a href="#" onclick="navigator.clipboard.writeText('<?php echo $articleId; ?>');"> <i class="material-icons">content_copy</i></a>
      </span>
      <span class="float-right">
        <button class="btn btn-sm btn-secondary rounded-pill ml-2 font-weight-bold" id="draftArticle">
          <div class="spinner-border spinner-border-sm text-light" id="draftArticleLoader" style="display: none;" role="status">
            <span class="sr-only">Loading...</span>
          </div>
           <i class="material-icons" id="draftArticleDefault">create_new_folder</i> &nbsp;Draft
          </button>
        <button class="btn btn-sm btn-primary rounded-pill ml-2 font-weight-bold" id="saveArticle">
          <div class="spinner-border spinner-border-sm text-light" id="saveArticleLoader" style="display: none;" role="status">
            <span class="sr-only">Loading...</span>
          </div>
          <i class="material-icons" id="saveArticleDefault">cloud_upload</i> &nbsp;Save
        </button>
      </span>
    </div>
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

 <!-- Create Image Edit content-->
<div class="modal fade" id="editImgPro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Image</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body p-0">
            <div class="pl-3 pr-3 pt-3">
              <img src="" class="w-100 mb-2" id="imgProCapImg" alt="Img">
              <input class="form-control form-control-sm" type="text" id="imgProCaptions" placeholder="Captions">
              <input type="hidden" id="imgCaptionEditId" value="">
            </div>
            <br>
            <div class="p-3  text-center" style="height: 57px; background-color: #e9ecef;color: #e9ecef; border-bottom: 6px solid #353375;">
                <a href="#" id="SaveImgEdit" data-dismiss="modal" aria-label="Close">
                    <p>Save</p>
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>

 <!-- Page content-->
 <?php
    if ($_POST) {
      if ($_POST['id']!='') {
        $videoId = $_POST['id'];
        $data = youtubeData($videoId);
      }else {
        $videoTitle = $_POST['title'];
      }
    }
 ?>
 <div class="container content">
      <div class="row">
        <div class="col-md-12">
          <div class="card border-0 div-shadow">
            <div class="card-body ">
              <div class="row">
                <div class="col-sm-8 ">
                  <?php if (isset($videoId)) { ?>
                    <div class="hytPlayerWrapOuter">
                      <div class="hytPlayerWrap embed-responsive embed-responsive-16by9 mb-2">
                          <iframe loading="lazy" width="100%" height="100%" allow="fullscreen"
                              src="https://www.youtube.com/embed/<?php if (isset($_POST['id'])) {echo $data[0];}?>?rel=0&enablejsapi=1"
                              frameborder="0"
                          ></iframe>
                      </div>
                    </div>
                  <?php } else {?>
                    <div class="embed-responsive-16by9 mb-2">
                      No Video
                    </div>
                  <?php }?>
                </div>
                      
                <div class="col-sm-4 pb-3">
                    <input type="hidden" id="sortList" name="sortList" value="">
                    <input type="file" id="pro-image"  accept="image/*" name="imagefiles[]" style="display: none;" multiple>                
                  <div class="border rounded h-100 pt-2 pl-2 mb-2">
                      <a href="javascript:void(0)" onclick="$('#pro-image').click()">Choose Image</a> <a href="#" class="float-right mr-2" onclick="clearImages()"> <i class="material-icons">delete</i> </a>
                      <div class="preview-images-zone h-100 p-2">
                      </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="row my-3">
                    <div class="col-sm-4">
                      <div class="row">
                        <div class="col-2">
                          <span class="material-icons text-primary" style="font-size: min(16vw, 52px);">account_circle</span>
                        </div>
                        <div class="col-10 pl-4 pt-1">
                          <span class="font-weight-bold">Aditya Dubey</span><i class="material-icons text-success ml-2">verified</i> <br>
                          <span class="small pt-0"><?php echo date("Y-m-d") ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-4 pt-2">
                      <select id="articleDistrict" class="custom-select mb-2" required>
                        <option value="" selected>Select District</option>
                        <option value="India">	All India</option>
                        <option value="Amritsar">	Amritsar</option>
                        <option value="Bathinda">	Bathinda</option>
                        <option value="Faridkot">	Faridkot</option>
                        <option value="Fatehgarh Sahib">	Fatehgarh Sahib</option>
                        <option value="Firozpur">	Firozpur</option>
                        <option value="Fazilka">	Fazilka</option>
                        <option value="Gurdaspur">	Gurdaspur</option>
                        <option value="Hoshiarpur">	Hoshiarpur</option>
                        <option value="Jalandhar">	Jalandhar</option>
                        <option value="Kapurthala">	Kapurthala</option>
                        <option value="Ludhiana">	Ludhiana</option>
                        <option value="Malerkotla">	Malerkotla</option>
                        <option value="Mansa">	Mansa</option>
                        <option value="Moga">	Moga</option>
                        <option value="Sri Muktsar Sahib">	Sri Muktsar Sahib</option>
                        <option value="Pathankot"> Pathankot</option>
                        <option value="Patiala"> Patiala</option>
                        <option value="Rupnagar"> Rupnagar</option>
                        <option value="Sahibzada Ajit Singh Nagar"> Sahibzada Ajit Singh Nagar</option>
                        <option value="Sangrur"> Sangrur</option>
                        <option value="Shahid Bhagat Singh Nagar"> Shahid Bhagat Singh Nagar</option>
                        <option value="Tarn Taran"> Tarn Taran</option>
                      </select>
                    </div>
                    <div class="col-sm-4 pt-2">
                      <select id="articleCategory" class="custom-select mb-2" required>
                        <option value="" selected>Select Category</option>
                        <option value="Politics">	Politics</option>
                        <option value="Business">	Business</option>
                        <option value="Sports">	Sports</option>
                        <option value="Travel">	Travel</option>
                        <option value="Tecnology">	Tecnology</option>
                        <option value="Entertainment">	Entertainment</option>
                        <option value="Crime"> Crime</option>
                      </select>
                    </div>
                  </div>
                  <textarea class="form-control mb-2" id="articleTitle" placeholder="Please enter title" required><?php if (isset($videoId)) {echo $data[1];}else if ($_POST) {echo $videoTitle;} ?></textarea>
                      
                  <textarea id="summernote" required><?php if (isset($videoId)) {echo nl2br($data[2]);}; ?></textarea>
                </div>
              </div>
              
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
  $('#summernote').summernote({
    toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline','strikethrough', 'superscript', 'subscript', 'clear']],
            ['fontname', ['fontname']],
            ['fontsize', ['fontsize','height']],
            ['color', ['color']],
            ['table', ['table']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen']],
          ],
          styleTags: [
            'normal','h1', 'h2', 'h3', 'h4', 'h5', 'h6'
	        ],
          height: 570
  });
</script>
<script src="../assets/js/dashboard.js"></script>
<script>
  if(!(Math.min(window.screen.width, window.screen.height) < 768 || navigator.userAgent.indexOf("Mobi") > -1)){
    document.body.classList.toggle('sb-sidenav-toggled');
  }
  
    window.setTimeout(function () {
      $('#centralModal').modal('toggle');
    }, 500); 
    
    $(document).on('click', '.btn-edit-image', function(){
      let imgNum = $(this).attr("data-no");
      let imgSrc = $("#"+imgNum).attr("src");
      $("#imgCaptionEditId").val(imgNum);
      $('#imgProCapImg').attr('src', imgSrc);
      $('#editImgPro').modal('toggle');
    });

    $(document).on('click', '#SaveImgEdit', function(){
      let imgId = $("#imgCaptionEditId").val();
      let imgCapVal = $("#imgProCaptions").val();
      $('#img-cap-'+imgId).val(imgCapVal);
    });

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

    $('#saveArticle').click(function(){
      saveArticle('Saved');
    });
    
    $('#draftArticle').click(function(){
      saveArticle('Draft');
    }); 

    function saveArticle(status) {
      var form = new FormData();
      $( ".preview-images-zone" ).sortable({
        disabled: true
      });
      var totalfiles = document.getElementById('pro-image').files.length;
      for (var index = 0; index < totalfiles; index++) {
        form.append("imagefiles[]", document.getElementById('pro-image').files[index]);
        form.append("imgCap"+(index+1), $('#img-cap-'+(index+1)).val());
      }
      let articleTitle =  $('#articleTitle').val();
      let articleDistrict = $('#articleDistrict').val();
      let articleCategory =  $('#articleCategory').val();
      let sortListValue =  $('#sortList').val();
      let summernote =  $('#summernote').val();

      if (articleTitle=='') {alert('Title  cannot be empty');return 0;}
      else if (articleDistrict=='') {alert('Please select a District');return 0;}
      else if (articleCategory=='') {alert('Please select a Category');return 0;}
      else if (summernote=='') {alert('Article cannot be empty');return 0;}

      if (status == 'Saved') {
        $('#saveArticleDefault').hide()
        $('#saveArticleLoader').show()
      }else{
        $('#draftArticleDefault').hide()
        $('#draftArticleLoader').show()
      }

      $('#saveArticle').prop( "disabled", true );
      $('#draftArticle').prop( "disabled", true );

      $('#articleTitle').prop( "disabled", true );
      form.append("articleTitle", articleTitle);

      $('#articleDistrict').prop( "disabled", true );
      form.append("articleDistrict", articleDistrict);

      $('#articleCategory').prop( "disabled", true );
      form.append("articleCategory", articleCategory);

      $('#sortList').prop( "disabled", true );
      form.append("sortList", sortListValue);

      $('#summernote').summernote('disable');
      form.append("articleData", $('#summernote').val());

      form.append("articleStatus", status);

      form.append("youtubeId", '<?php if(isset($videoId)){echo $videoId;}; ?>');
      
      form.append("articleId", '<?php echo $articleId; ?>');
      
      $.ajax({
          url: "uploadArticle.php",
          type: "POST",
          data:  form,
          contentType: false,
          processData:false,
          success: function(result){
            console.log(result);
              if (status == 'Saved') {
                $('#saveArticleDefault').html('cloud_done');
                $('#saveArticleLoader').hide();
                $('#saveArticleDefault').show();
              }else{
                $('#draftArticleDefault').html('cloud_done');
                $('#draftArticleLoader').hide();
                $('#draftArticleDefault').show();
              }
              if (result == '200 Ok') {
                alert('Uploaded Successfully');
                window.location.href = "./";
              }
          }
      });
    }
      
  </script>

<script>
  "use strict";
  document.addEventListener('DOMContentLoaded', function() {
      // Activate only if not already activated
      if (window.hideYTActivated) return;
      // Activate on all players
      let onYouTubeIframeAPIReadyCallbacks = [];
      for (let playerWrap of document.querySelectorAll(".hytPlayerWrap")) {
          let playerFrame = playerWrap.querySelector("iframe");

          let tag = document.createElement('script');
          tag.src = "https://www.youtube.com/iframe_api";
          let firstScriptTag = document.getElementsByTagName('script')[0];
          firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

          let onPlayerStateChange = function(event) {
              if (event.data == YT.PlayerState.ENDED) {
                  playerWrap.classList.add("ended");
              } else if (event.data == YT.PlayerState.PAUSED) {
                  playerWrap.classList.add("paused");
              } else if (event.data == YT.PlayerState.PLAYING) {
                  playerWrap.classList.remove("ended");
                  playerWrap.classList.remove("paused");
              }
          };

          let player;
          onYouTubeIframeAPIReadyCallbacks.push(function() {
              player = new YT.Player(playerFrame, {
                  events: {
                      'onStateChange': onPlayerStateChange
                  }
              });
          });

          playerWrap.addEventListener("click", function() {
              let playerState = player.getPlayerState();
              if (playerState == YT.PlayerState.ENDED) {
                  player.seekTo(0);
              } else if (playerState == YT.PlayerState.PAUSED) {
                  player.playVideo();
              }
          });
      }

      window.onYouTubeIframeAPIReady = function() {
          for (let callback of onYouTubeIframeAPIReadyCallbacks) {
              callback();
          }
      };

      window.hideYTActivated = true;
  });
</script>

</body>
</html>