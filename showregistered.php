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
     <!-- MORRIS CHART STYLES-->
   
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
     <!-- TABLE STYLES-->
    <link href="assets/js/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
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
                <a class="navbar-brand" href="Displayproduct.php">EMS</a> 
            </div>
          <div style="color: white;
        padding: 15px 50px 5px 50px;
        float: right;
        font-size: 16px;">WELCOME:<span style="color: #1cde74; font-family: 'Black Ops One', cursive;"><?php echo strtoupper($row1['name']);?></span><span style="color: yellow;"> <a href="logout.php" class="btn btn-danger square-btn-adjust"> Logout</a> </div>

  
        <?php


        include("navigation.php")?>
        </nav>  
        <!-- /. NAV SIDE  -->

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Participants List</h2>   
                        <h5>Welcome To <b>Event Managment System</b> </h5>
                       
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
            <div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-default">
                        <div class="panel-heading">
                             Participants/Users
                        </div>
                        
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" >
                                    <thead>
                                        <tr>
                                            <th>S.No</th>
                                          <th>Participants Name</th>
                                            <th>Email Address</th>
                                            
                                            <th>Mobile No</th>

                                            
                                            <th>Role</th>
                                            <?php 
                                            if($row1['role']=='admin')
                                            {
                                                ?>
                                            <th>Action</th>
                                              <?php
                                            }
                                            ?>
                                           
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                     <?php
                                        $qruy = "select name,email,mobile_no,role from register where status ='1' and role='participants' or role='users'";
                                        $run = mysqli_query($con,$qruy);
                                        $count=0;
                                        while($fetch = mysqli_fetch_assoc($run))
                                        {
                                            $count++;
                                            ?>
                                            <tr class="odd gradeX">
                                           
                                            <td class="center"><?php echo $count;?></td>
                                            <td class="center"><?php echo $fetch['name'];?></td>
                                             <td class="center"><?php echo $fetch['email'];?></td>
                                            
                                            <td class="center"><?php echo $fetch['mobile_no'];?></td>
                                          
                                            <td class="center"><?php echo $fetch['role'];?></td>
                                            <?php 
                                            if($row1['role']=='admin'  )
                                            {
                                                ?>
                                                     <td class="center">
                                               <a href="delete.php?mob=<?php echo $fetch['mobile_no'];?>" class="btn btn-danger">Delete</a></td>
                                                <?php
                                            }
                                            ?>
                                           
                                            
                                               
                                            </tr>

                                            <?php
                                        }
                                     ?>
                                             

                                        
                                      
                                    </tbody>
                                </table>
                            </div>
                            
                        </div>
                    </div>
                    <!--End Advanced Tables -->
                </div>
            </div>
                <!-- /. ROW  -->
           
                
              
               
               
                </div>
            </div>
                <!-- /. ROW  -->
        </div>
     
             <!-- /. PAGE INNER  -->
            
         <!-- /. PAGE WRAPPER  -->
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
     <!-- DATA TABLE SCRIPTS -->
    <script src="assets/js/dataTables/jquery.dataTables.js"></script>
    <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script>
            $(document).ready(function () {
                $('#dataTables-example').dataTable();
            });
    </script>


    <script type="text/javascript">
        function Deleteuser(deleteid)
            {
                alert("deleteid");
                var cf = confirm("Do you really want to delete record");
                if(cf == true)
                {
                    $.ajax({
                        url: "showregistered.php",
                        type:'post',
                        data:{ deleteid:deleteid },
                        success:function(data,status){
                            window.open("showregistered.php","_self");
                        }
                    });
                }
            }
    </script>
         <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
<?php

if(isset($_POST['deleteid']))
{
    $Query = " update register set status='2' where mobile_no='$deleteid';";
    if(!$run = mysqli_query($con,$Query))
    {
        echo '<script>alert("Something Went Wrong");</script>';
    }
}

?>
