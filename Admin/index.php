<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta property="og:title" content="Police Darpan | Log In">
  <meta property="og:description" content="News Management System (Designed with ♥ by Aditya Dubey)"/>
  <meta property="og:image" content="http://www.policedarpannews.in/Admin/assets/img/logoRound.pn">
  <meta property="og:image:width" content="600"/>
  <meta property="og:image:height" content="300"/>
  <meta property="og:image:alt" content="Police Darpan"/>
  <meta property="og:type" content="Website"/>
  <meta property="og:url" content="http://www.policedarpannews.in/Admin/"/>
  <link rel="shortcut icon" type="image/jpg" href="./assets/img/favicon.ico">

  <!-- Bootstrap CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
  <title>Police Darpan &nbsp; | Log In</title>
</head>

<body>
  
  <div class="py-5 text-center" style="min-height: 100vh;height: 100%; background-color: #f96332;">
    <div class="container text-center text-white py-5">
      <div class="mx-auto col-lg-10">
        <h1 class="display-4 mb-2 "><img src="./assets/img/logoRound.png" height="68px" alt="Police Darpan"></h1>
      </div>
    </div>
    <div>
      <div class="bg-white rounded mx-auto d-block" style="max-width: 25%; min-width: 320px;">
        <div class="pl-3 pr-3 pt-3">
          <form class="form-signin" method="POST" action="login.php">
            <h1 class="h3 mb-3 font-weight-normal">Sign In</h1>
            <div class="form-group">
              <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
            </div>
            <div class="form-group">
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <button type="submit" style="background-color: #0030ff;" class="btn btn-primary btn-block">Log In</button>
          </form>
        </div>
        <br>
        <div class="p-3 text-center" style="height: 57px; background-color: #e9ecef;">
          
        </div>
        <div style="height: 10px; background-color: #0030ff;">

        </div>
      </div>
    </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.setTimeout(function(){
         $('#centralModal').modal('toggle');
        }, 500); 
     </script>
     <?php
   if(isset($_SESSION['Login_code'])){
      if($_SESSION['Login_code'] == 0){
         echo '<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
           <strong>Details Incorrect!!</strong>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
        </div>';
        session_unset();
      }elseif($_SESSION['Login_code'] == 2){
       echo '<div class="modal fade" id="centralModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
       <div class="modal-dialog" role="document">
         <div class="modal-content">
           <div class="modal-header">
           <strong>Please Login !!</strong>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
             </button>
           </div>
        </div>';
        session_unset();
        session_destroy();
    }
  }
   ?>
 </body>
</html>