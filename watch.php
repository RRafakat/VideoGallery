<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php

$con = mysqli_connect("localhost","root","","video");

if (isset($_GET['id'])) 
{
	$id = $_GET['id'];
	$quary = mysqli_query($con,"SELECT * FROM uploaded WHERE id= '$id'");
	while ($row = mysqli_fetch_assoc($quary)) 
	{
		$name = $row['name'];
		$url = $row['url'];
	}

	echo "<h1 style='font-size:40px;'>You are watching $name <br/> </h1>";
	echo "<embed src='$url' width='560' height='560'></embed>";
}
else
{
	echo "Error!";
}
?>

<div class="f1">
          <div class="col-md-12">
            <h3 style="text-align:left; color: salmon;"><?php echo $res['resname'];  ?></h3><br>
          </div>
          <div class="col-md-3" style="float: left;">
            <h4>Comment: </h4>
          </div>
          <div class="col-md-9" style="float: right">
            <form method="post">
              <div class="form-group">
                  <input type="text" class="form-control" name="comments">
                  <button type="submit" name="sub" class="btn btn-primary" style="margin: 10px 0px;">Send</button>
              </div>
            <?php
            include_once("connection.php");         
            $use = $_SESSION['user_name']; 
            
                     if(isset($_POST['sub'])){
                        $comments = $_POST['comments'];
                         $cql = "INSERT INTO comments(username,resid,comments)
                                         VALUES('$use','{$res['id']}','$comments')";
                         $tql = mysqli_query($conn,$cql);
                         
                         if($tql){
                              header('Refresh:0; comm.php');
                         }
                     }
                ?>
            </form>
          </div>
          </div>
          </div>
          <div class="col-md-6">
        
        <div class="div1">
            <?php
            
            include_once("connection.php");
             
           $pql = "SELECT username,comments FROM comments WHERE resid='{$res['id']}' ORDER BY comments DESC";
           $klm = mysqli_query($conn,$pql);
                
            
            while ($nes = mysqli_fetch_array($klm)) {
            
            ?>
            <div class="com1">
             <label class="l1"><?php echo $nes['username']; ?> </label> 
              <p><?php echo $nes['comments']; ?></p>  
            </div>
            
            <?php
                
                
            }
        
        
            ?>
            
            
        </div>

</body>
</html>