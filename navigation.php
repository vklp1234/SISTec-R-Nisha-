</nav>   
<!-- /. NAV TOP  -->
<nav class="navbar-default navbar-side" role="navigation">
  <div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
          <li class="text-center">
            <img src="Dataimages/SISTec_Logo.png" class="user-image img-responsive"/>
          </li>
          <li>
            <a  href="dashboard.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
          </li>
          <?php
        
            if($row1['role']=='participants')
              {?>
                    <li>
                      <a  href="newevent.php"><i class="fa fa-tags fa-3x"></i> Add Events</a>
                    </li>
                    <li>
                      <a  href="showregistered.php"><i class="fa fa-list fa-3x"></i> Participants List </a>
                    </li>
                    <li>
                      <a href="Dispalyevents.php"><i class="fa fa-eye fa-3x"></i>View Events</a>
                    </li>  
              <?php
               }
               else
               {
               if($row1['role']=='users')
              {?>

                  <li>
                    <a  href="showregistered.php"><i class="fa fa-list fa-3x"></i> Participants List </a>
                  </li>
                  <li>
                    <a href="Dispalyevents.php"><i class="fa fa-eye fa-3x"></i>View Events</a>
                  </li>  
              <?php
               }
               else
               {
                if($row1['role']=='admin')
              {?>
                    <li>
                      <a  href="newevent.php"><i class="fa fa-tags fa-3x"></i> Add Events</a>
                    </li>
                    <li>
                      <a  href="showregistered.php"><i class="fa fa-list fa-3x"></i> Participants List </a>
                    </li>
                    <li>
                      <a href="Dispalyevents.php"><i class="fa fa-eye fa-3x"></i>View Events</a>
                    </li>  
              <?php
               }
               }
             }

          ?>   
    </ul>

   

 </div>

</nav>  