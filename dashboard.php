<?php


session_start();
if(isset($_SESSION['userid']))
{
  $email = $_SESSION['userid'];
}
else{
  header("Location:index.php");
}
?>
<?php
include("config.php");
$qry1 = "select name,role from register where email='$email'";
$run1 = mysqli_query($con,$qry1);
$row1 = mysqli_fetch_assoc($run1);

?>
<!DOCTYPE php>
<php xmlns="http://www.w3.org/1999/xphp">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>product</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
   <link href="https://fonts.googleapis.com/css?family=Black+Ops+One|Open+Sans" rel="stylesheet">

  </head>
  <body>

    <div id="wrapper">
      <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">EMS</a>
        </div>

        <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;">WELCOME:<span style="color: #1cde74; font-family: 'Black Ops One', cursive;"><?php echo strtoupper($row1['name']);?></span><span style="color: yellow;"> <a href="logout.php" class="btn btn-danger square-btn-adjust"> Logout</a> </div>


        <?php


        include("navigation.php")
        ?>
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
          <div id="page-inner">
            <div class="row">
              <div class="col-md-12">
               <h2> Dashboard</h2>   
               <h5>Welcome to <b>Event Managment System</b> </h5>


             </div>
           </div>
           <!-- /. ROW  -->
           <hr />
           <?php 
           include ("admin_dash.php");
           ?>
               
         
       
        <!-- /. ROW  -->

        <!-- /. ROW  -->
      </div>
      <!-- /. PAGE INNER  -->
    </div>
    <!-- /. PAGE WRAPPER  -->
  </div>
  <!-- /. WRAPPER  -->
  <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
  <!-- JQUERY SCRIPTS -->
  <script src="assets/js/jquery-1.10.2.js"></script>
  <!-- BOOTSTRAP SCRIPTS -->
  <script src="assets/js/bootstrap.min.js"></script>
  <!-- METISMENU SCRIPTS -->
  <script src="assets/js/jquery.metisMenu.js"></script>
  <!-- CUSTOM SCRIPTS -->
  <script src="assets/js/custom.js"></script>



</body>
</php>
