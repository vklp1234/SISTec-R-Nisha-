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

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
        <a class="navbar-brand" href="newproduct.php">EMS</a> 
      </div>

      <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;">WELCOME:<span style="color: #1cde74; font-family: 'Black Ops One', cursive;"><?php echo strtoupper($row1['name']);?></span><span style="color: yellow;"> <a href="logout.php" class="btn btn-danger square-btn-adjust"> Logout</a> </div>


      <?php


      include("navigation.php")?>
      <!-- /. NAV SIDE  -->

      <div id="page-wrapper" >
        <div id="page-inner">
          <div class="row">
            <div class="col-md-12">
             <h2>Add New Event</h2>   
             <h5>Welcome To <b>Event Managment System</b></h5>


           </div>
         </div>
         <!-- /. ROW  -->
         <hr />
         <div class="row">
          <div class="col-md-12">
            <!-- Form Elements -->
            <div class="panel panel-default">
              <div class="panel-heading">
               Add Event
             </div>
             <div class="panel-body">
              <div class="row">
                <div class="col-md-6">

                  <form role="form" action="newevent.php" onsubmit="validation()" enctype="multipart/form-data" method="POST" name="Form3">
                    <div class="form-group">
                      <label for="Event id"> Event Id</label>
                      <input type="text" name="event_id" class="form-control" placeholder="Enter Event Id" required="required">
                                          <!-- event name
                                          vanue starts date 
                                          close date-->

                        </div>
                         <div class="form-group">
                            <label for="Event name"> Event Name</label>
                            <input type="text" name="event_name" class="form-control" placeholder="Enter Event name" required="required">
                                         

                        </div>
                         <div class="form-group">
                            <label for="Event name"> Event Vanue</label>
                            <input type="text" name="event_Vanue" class="form-control" placeholder="Enter Vanue" required="required">
                                         

                        </div>
                         <div class="form-group">
                            <label for="Event name"> Start date</label>
                            <input type="date" name="event_start_date" class="form-control"  required="required">
                                         

                        </div>
                        <div class="form-group">
                            <label for="Event name"> End date</label>
                            <input type="date" name="event_end_date" class="form-control" required="required" >
                                         

                        </div>
                        <div class="form-group">
                            <label for="Event name">Event Cost</label>
                            <input type="number" name="event_end_cost" class="form-control" placeholder="Enter Event Cost" required="required">
                                         

                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-warning" value="Add Event">
                                         

                        </div>


                                      </form>
                                      <br />

                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- End Form Elements -->
                            </div>
                          </div>
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
                  </html>
<?php
include("config.php");
if(isset($_POST['submit']))
{
  $event_id = $_POST['event_id'];
  $event_name = $_POST['event_name'];
  $event_Vanue = $_POST['event_Vanue'];
  $event_start_date = $_POST['event_start_date'];
  $event_end_date = $_POST['event_end_date'];
  $event_end_cost = $_POST['event_end_cost'];
  $qry = "INSERT INTO `event`(`event_id`, `event_name`, `event_vanue`, `start_date`, `end_date`,`event_cost`) VALUES ('$event_id',' $event_name','$event_Vanue','$event_start_date',' $event_end_date','$event_end_cost');";
  if(!$run = mysqli_query($con,$qry))
  {
    var_dump($con->error);
  }
  else{
    ?>
      <script type="text/javascript">
        alert("Event Added id is <?php echo $event_id;?>");
      </script>


    <?php
  }

}


?>