<?php
session_start();
if(isset($_SESSION['userid']))
{
  header("Location:dashboard.php");
}
else{

 }



?>


<!DOCTYPE html>
<html>
<head>
	<title>Admin login</title>

  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product</title>
  <!-- BOOTSTRAP STYLES-->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- FONTAWESOME STYLES-->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLES-->
  <link href="assets/css/custom.css" rel="stylesheet" />
  <!-- GOOGLE FONTS-->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body style="background-color: #999;">
  <li class="text-center" style="text-decoration-style: none;">
    <h3> Welcome To Event Managament System</h3>
    <img src="Dataimages/SISTec_Logo.png" class="user-image img-responsive"/>
  </li>
  <div class="fram1" >
               <div class="panel-heading "  >
                <span class="fa fa-sign-in"></span> Admin Login <a class="pull-right" id="myBtn" href="#">Register</a>
              </div>
              <hr>

              <form role="form" action="index.php" enctype="multipart/form-data" method="POST" name="Form3">
            
                           <div style="    padding: 0px 18px;"  class="form-group" >

                            <label>Email:</label> 
                            <input  class="form-control" type="text" name="username" required="required" />

                          </div>
                          <div style="    padding: 0px 18px;" class="form-group" >
                            <label>Password :</label> 
                            <input  class="form-control" type="password" name="Pass" required="required" />

                          </div>
                          <div style="    padding: 0px 18px;" class="form-group">
                            <input type="submit" class="btn btn-success" name="submit" value="Login" />
                          </div>

            </form>
</div>
<form method="post" action="" >
  <div id="myModal" class="modal">

    <!-- Modal content -->
    <div style="width: 80%; margin: 0px auto;" class="modal-content">
      <span class="close">&times;</span>
     <div style="padding-left: 30px; padding-right: 30px;" class="form-group">
      <label >Name:</label> 
      <input type="text" name="name" class="form-control" placeholder="Enter Your Name">
       
     </div>
      <div style="padding-left: 30px; padding-right: 30px;" class="form-group">
      <label >Mobile No(+91):</label> 
      <input type="number" name="Mobile_no" class="form-control" placeholder="Enter Your number">
      <!-- Design and Developed By vishwas lodhi cse vII -->
       
     </div>
      <div style="padding-left: 30px; padding-right: 30px; " class="form-group">
      <label >Email:</label> 
      <input type="email" name="email" class="form-control" placeholder="Enter Your email">
        <!-- Contact No 9981015328 -->
     </div>
      <div style="padding-left: 30px;padding-right: 30px;" class="form-group">
      <label >Password:</label> 
      <input type="text" name="password" class="form-control" placeholder="Enter Your Name">
       
     </div>
     <div style="padding-left: 30px;padding-right: 30px;" class="form-group">
      <label >Role(optional):</label> 
      <select name='role' class="form-control">
        <option value="">----select Role ------</option>
        <option value="users">user</option>
        <option value="participants">Participant</option>
      </select>
       
     </div>
     <div style="padding-left: 30px;" class="form-group ">     
      <input type="submit" name="submit2" value="Save" class=" btn btn-success">
     </div>
    </div>
  </form>


</div>


<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>
</body>
</html>
<?php
include("config.php");
if(isset($_POST['submit']))
{
  $user = $_POST['username'];
  $Pass = $_POST['Pass'];
  $Qry = "SELECT * FROM `register` WHERE  `email`='$user' AND `password` = '$Pass'";


  if(!$run = mysqli_query($con,$Qry))
  {
    var_dump($con->error);
  }
  $row = mysqli_num_rows($run);
  if ($row<1)
  {

    ?>
    <script type="text/javascript">
      alert("Username And Password Are Not Match");
      window.open('index.php','_self');
    </script>
    <?php

    
  }
  else
  {
   
   $_SESSION['userid']= $user;
   ?>
    <script type="text/javascript">
      window.open("dashboard.php","_self");
    </script>

   <?php
    
  }

}
if(isset($_POST['submit2']))
{
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile_no = $_POST['Mobile_no'];
  $password = $_POST['password'];
  $role = $_POST['role'];
 
 

 


    $qrey ="INSERT INTO `register`(`mobile_no`,`role`, `name`, `email`, `password`) VALUES ('$mobile_no','$role','$name','$email','$password')";

    if(!$runer=mysqli_query($con,$qrey))
    {
      //var_dump($con->error);
       $qry = "select * from `register` where email='$email' or mobile_no='$mobile_no' ";
       $run12 = mysqli_query($con,$qry);
        
         if($run12 == true)
          {
            ?>
            <script type="text/javascript">
              alert("Account Already exitst");
            </script>


            <?php
          }
          else{
            var_dump($con->error);
          }

    }
    else{
      ?>
    <script type="text/javascript">
      alert("Account Created");
    </script>


    <?php
    }
  

}
?>
