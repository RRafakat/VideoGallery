<?php 

$con = mysqli_connect("localhost","root","","video");
  
  if (isset($_POST['submit'])){
    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];
    $video_name = $_POST['video_name'];

    move_uploaded_file($temp, "Uploaded/".$name);
    $url = "http://127.0.0.1/video/Uploaded/$name";
    $query = "INSERT INTO uploaded VALUES ('', '$video_name', '$url')";
    $result = mysqli_query($con, $query);
    
  }
?>


</!DOCTYPE html>
      <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="nav.css">
   <!-- site CSS -->
    <link rel="stylesheet" type="text/css" href="style.css">

    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">
 <html>
<head>
<meta>    
  <title>Video Upload </title>
</head>
<body>
  
  

      <div class="row">
          <div class="col-md-12 container">
              <div class="silder">
                  <div class="slide-image">
                      <div class="slide-background-overlay">
                          <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                              <div class="col-md-9">
                                  <a class="navbar-brand"  href="index.php">Video Gallery</a>
                                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                          <span class="navbar-toggler-icon"></span>
                                      </button>
                              </div>
                              <div class="col-md-3 collapse navbar-collapse main-text" id="collapsibleNavbar">
                                  <ul class="navbar-nav mr-auto">
                                      <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle main-menu" href="#" id="navbardrop" data-toggle="dropdown">Sign Up</a>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" href="usignup.php">viewer Sign Up</a>
                                              <a class="dropdown-item" href="rsignup.php" >Owner Sign Up</a>
                                          </div>
                                      </li>
                                      <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle main-menu" href="#" id="navbardrop" data-toggle="dropdown">Login</a>
                                          <div class="dropdown-menu">
                                              <a class="dropdown-item" href="ulogin.php" >Viewer Login</a>
                                              <a class="dropdown-item" href="rlogin.php" >Owner Login</a>
                                          </div>
                                      </li>
                                  </ul>
                              </div>  
                          </nav>
                          
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>

  <a href="index.php" style='font-size:30px;padding-left: 10px;'>Videos</a>



 <form action="admindash.php" method="POST" enctype="multipart/form-data" style='font-size:30px;padding-left: 10px;'>
  <p>Video Name</p>
  <input type="text" name="video_name"><br>
  <input type="file" name="file" /><br>
  <input type="submit" name="submit" value="Upload!" />
 </form>  
 
<?php
if(isset($_POST['submit']))
 {
  echo "<br />" .$video_name. " has been uploaded";
 }
 
?>
</body>
</html>