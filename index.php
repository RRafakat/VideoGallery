<!DOCTYPE html>
<html lang="en">
<head>
  
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

    <title>Video - Gallery</title>
</head>
<body>
  
  

      <div class="row">
          <div class="col-md-12 container">
              <div class="silder">
                  <div class="slide-image">
                      <div class="slide-background-overlay">
                          <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                              <div class="col-md-9">
                                  <a class="navbar-brand"  href="index.html">Video Gallery</a>
                                      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                                          <span class="navbar-toggler-icon"></span>
                                      </button>
                              </div>
                              <div class="col-md-3 collapse navbar-collapse main-text" id="collapsibleNavbar">
                                  <ul class="navbar-nav mr-auto">
                                      <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle main-menu" href="#" id="navbardrop" data-toggle="dropdown">Sign Up</a>
                                          <div style="color: black;">
                                              <a class="dropdown-item" href="usignup.php">viewer Sign Up</a>
                                              <a class="dropdown-item" href="rsignup.php" >Owner Sign Up</a>
                                          </div>
                                      </li>
                                      <li class="nav-item dropdown">
                                          <a class="nav-link dropdown-toggle main-menu" href="#" id="navbardrop" data-toggle="dropdown">Login</a>
                                          <div style="color: black;">
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
                                <?php
$con = mysqli_connect("localhost","root","","video");

$quary = mysqli_query($con,"SELECT * FROM uploaded");
while ($row = mysqli_fetch_assoc($quary)) 
{
  $id = $row['id'];
  $name = $row['name'];
  $url = $row['url'];
  

  echo "<div class='row' style='margin: 30px;'> 
  <video width='320' height='240' controls='controls' >
        <source src='$url'>
          </video>
  <br />
  <a href ='watch.php?id=$id' style='font-size : 30px; padding-left: 20px;'>$name</a><br />
  </div>";
}
?>    

          </div>
      </div>


</body>
</html>