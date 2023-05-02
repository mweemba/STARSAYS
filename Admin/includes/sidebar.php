 <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="text-center sidebar-brand-wrapper d-flex align-items-center">
          <a class="sidebar-brand brand-logo" href="index.php"><img src="../assets/img/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.html"><img src="../assets/img/logo2.png" alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
              <div class="nav-profile-image">
                <img src="<?php  if(!$profilePic){ echo '../assets/img/user.png'; } else{ echo 'assets/img/'.$profilePic; };?>"alt="profile" />
                <span class="login-status online"></span>
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column pr-3">
                <span class="font-weight-medium mb-2"><?php echo $firstname.' '.$lastname;?></span>
                
              </div>
              
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.html">
              <i class="mdi mdi-home menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Administation</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/buttons.html">Users</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="pages/ui-features/dropdowns.html">Site Statistics</a>
                </li>
                
              </ul>
            </div>
          </li>
		       <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#star_application" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Star Applications</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="star_application">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pending_star_applications.php">Pending Approvals</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="rejected_star_applications.php">Rejected Applications</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="accepted_star_applications.php">Accepted List</a>
                </li>
				<li class="nav-item">
                  <a class="nav-link" href="reverted_star_applications.php">Reverted List</a>
                </li>
              </ul>
            </div>
          </li>
		       <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#payment_issues" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Payments</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="payment_issues">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="payments.php">Payments</a>
                </li>
                
              </ul>
            </div>
          </li>
		       <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#request" aria-expanded="false" aria-controls="ui-basic">
              <i class="mdi mdi-crosshairs-gps menu-icon"></i>
              <span class="menu-title">Requests</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="request">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="pending_request.php">Check Requests</a>
                </li>
                
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" href="pages/charts/chartjs.html">
              <i class="mdi mdi-chart-bar menu-icon"></i>
              <span class="menu-title">Reports</span>
            </a>
          </li>
         </ul>
      </nav>
      