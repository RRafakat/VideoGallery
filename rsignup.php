<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="nav.css">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <title>Owner Signup</title>
    <style>
        .c11{
            margin-top: 20px;
          }
        .box-1{
            padding:30px;
          }
        .box-1 h1{
            font-family: 'Josefin Sans', sans-serif;
          }
        .v2 h1{
            font-family: 'Josefin Sans', sans-serif;
          }
        .v2{
            text-align: center;
            margin-top: 65px;
            border: 1px solid deepskyblue;
            border-radius: 10px;
            padding: 20px;
            background-color: #f2f2f2;
            box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px deepskyblue;
          }
        .im1{
           text-align: center;
          }
        .form-control{
            border:none;
            border-bottom: 2px solid green;
            border-radius: 10px;
          }
        .form-control:focus {
            border-color: deepskyblue;
            box-shadow: none;
          }
        @media only screen and (max-width:767px){
          .s2{
              display: none;
          }
        }
    </style>
</head>

<body>
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
      <a class="navbar-brand"  href="index.php">Video Gallery</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Sign Up</a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="usignup.php">Viewer Sign Up</a>
                <a class="dropdown-item" href="rsignup.php" >Owner Sign Up</a>
            </div>
          </li>
          <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">Login</a>
            <div class="dropdown-menu">
                 <a class="dropdown-item" href="ulogin.php" >Viewer Login</a>
                 <a class="dropdown-item" href="rlogin.php" >Owner Login</a>
            </div>
          </li>
        </ul>
      </div>  
    </nav>

  <?php
  ini_set( "display_errors", 0); 
  ?>

   
   <div class="c11 container">
      <div class="row">
        <div class="s2 col-md-4">
                      <div class="v2">
                          <div class="im1">
                              <img class="img-responsive" src="./imgs/admin-login-images-png-4.png" style="height:100px; width:100px;">  
                          </div>
                          <h1>Signup is totally Free for Owner.</h1>
                          <h4>Please enter your valid information</h4>
                          <h4>Dont Share your personal information</h4>
                      </div>
                  </div>
          <div class="col-md-8 box-1">
              <form method="post" enctype="multipart/form-data">
                  <h1>Please Fillup The Owner Signup Form</h1>
                  <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="First Name" name="fname">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Last Name" name="lname">
                  </div>
                  <div class="form-group">
                      <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Username" name="uname">
                  </div>
                  <div class="form-group">
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" name="email">
                  </div>
                  <div class="form-group">
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="pass">
                  </div>
                  <div class="from-group">
                      <img src="" id="image" style="display:none;" height="150" width="100">
                      <label>Enter Your Image</label><br>
                      <input name="img" onchange="showImage.call(this)" type="file" />  
                  </div><br>
                      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
              </form>
              
              </div>
                  
              </div>
          </div>

          <script type="text/javascript">
    
          function showImage(){
              if(this.files && this.files[0]){
                  var obj = new FileReader();
                  obj.onload = function(data){
                      var image = document.getElementById("image");
                      image.src = data.target.result;
                      image.style.display = "block";
                  }
            
          obj.readAsDataURL(this.files[0]);
            }
          }
          </script>
      
      <?php
        include_once("connection.php");
        
        if(isset($_POST['submit'])){
            
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        
        $filename = addslashes($_FILES['img']['name']);
        $tmpname = addslashes(file_get_contents($_FILES['img']['tmp_name']));
        $filetype = addslashes($_FILES['img']['type']);
        $filesize = addslashes($_FILES['img']['size']);
        $array = array('jpg','jpeg');
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
            

        $sql = "INSERT INTO rsignup(firstname,lastname,username,email,password,name,image)
                VALUES('$fname','$lname','$uname','$email','$pass','$filename','$tmpname')";
      
                if(empty($fname) || empty($lname) || empty($uname) || empty($pass) || empty($email) || empty($filename) || !in_array($ext, $array)){
                
                echo"<script>swal({
                    title: 'Fill Up All Field',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                    });</script>";
                }
                elseif(!$res = mysqli_query($conn,$sql)){
                echo"<script>swal({
                    title: 'Enter Another Username,Password',
                    text: 'Thank You',
                    icon: 'error',
                    timer: 3000,
                    button: false,
                    });</script>";
                }
                else{
                $res = mysqli_query($conn,$sql);
                echo"<script>swal({
                    title: 'Your Information Added Successfully',
                    text: 'Thank You',
                    icon: 'success',
                    timer: 3000,
                    button: false,
                    });</script>";
                }
              }
      ?>

    
</body>
</html>