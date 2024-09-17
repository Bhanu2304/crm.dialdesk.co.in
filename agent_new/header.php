 <?php 	function getGreeting() {
		// Get the current hour
		$hour = date("H");
	
		$header_message = "";
		if ($hour >= 5 && $hour < 12) 
    {
			$header_message .= "Good Morning";
		} elseif ($hour >= 12 && $hour < 17) {

			$header_message .= "Good AfterNoon";

		} elseif ($hour >= 17 && $hour < 21) 
    {
			$header_message .= "Good Evening";

		} else {
      
			$header_message .= "Good Night";
		}

    $username = $_SESSION['USER_NAME'];
    $header_message .= ", ".$username;

    return $header_message;
	}

  $user = $_SESSION['SESS_USER'];

  $stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $user) . "';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_row($rslt);
  $remote_agent_id =	$row[0];
  $status =			$row[5];
  $switch_button = "";
  $aria_pressed = "false";

  if ($status == "ACTIVE") {
      $switch_button = "active";
      $aria_pressed = "true";
  }
    
?>
<style>
  #main-wrapper .left-sidebar[data-sidebarbg=skin5], #main-wrapper .left-sidebar[data-sidebarbg=skin5] ul {
    background: #002a43 !important;
    color:  white !important;
  }
  #main-wrapper .topbar .top-navbar .navbar-header[data-logobg=skin5] {
    background: #002a43 !important;
  }
  #navbarSupportedContent {
    background-color: #002a43 !important;
  }

  #main-wrapper .topbar .navbar-collapse[data-navbarbg=skin5], #main-wrapper .topbar[data-navbarbg=skin5] {
    background-color: #002a43 !important;
  }

  .sidebar-nav ul .sidebar-item .sidebar-link {
      color: #fff !important;
     
  }


.switch > .row {
  padding-bottom: 2rem;
  vertical-align: middle;
  text-align: center;
  border-bottom: 1px solid rgba(189, 193, 200, 0.5);
}

.switch .btn-toggle {
  top: 50%;
  transform: translateY(-50%);
}
.btn-toggle {
  margin: 0 4rem;
  padding: 0;
  position: relative;
  border: none;
  height: 1.5rem;
  width: 3rem;
  border-radius: 1.5rem;
  color: #6b7381;
  background: #bdc1c8;
}
.btn-toggle:focus,
.btn-toggle.focus,
.btn-toggle:focus.active,
.btn-toggle.focus.active {
  outline: none;
}
.btn-toggle:before,
.btn-toggle:after {
  line-height: 1.5rem;
  width: 4rem;
  text-align: center;
  font-weight: 600;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  position: absolute;
  bottom: 0;
  transition: opacity 0.25s;
}

.btn-toggle > .handle {
  position: absolute;
  top: 0.1875rem;
  left: 0.1875rem;
  width: 1.125rem;
  height: 1.125rem;
  border-radius: 1.125rem;
  background: #fff;
  transition: left 0.25s;
}
.btn-toggle.active {
  transition: background-color 0.25s;
}
.btn-toggle.active > .handle {
  left: 1.6875rem;
  transition: left 0.25s;
}
.btn-toggle.active:before {
  opacity: 0.5;
}
.btn-toggle.active:after {
  opacity: 1;
}
.btn-toggle.btn-sm:before,
.btn-toggle.btn-sm:after {
  line-height: -0.5rem;
  color: #fff;
  letter-spacing: 0.75px;
  left: 0.4125rem;
  width: 2.325rem;
}
.btn-toggle.btn-sm:before {
  text-align: right;
}
.btn-toggle.btn-sm:after {
  text-align: left;
  opacity: 0;
}
.btn-toggle.btn-sm.active:before {
  opacity: 0;
}
.btn-toggle.btn-sm.active:after {
  opacity: 1;
}
.btn-toggle.btn-xs:before,
.btn-toggle.btn-xs:after {
  display: none;
}
.btn-toggle:before,
.btn-toggle:after {
  color: #6b7381;
}
.btn-toggle.active {
  background-color: #28b779;
}
.btn-toggle.btn-lg {
  margin: 0 5rem;
  padding: 0;
  position: relative;
  border: none;
  height: 2.5rem;
  width: 5rem;
  border-radius: 2.5rem;
}
.btn-toggle.btn-lg:focus,
.btn-toggle.btn-lg.focus,
.btn-toggle.btn-lg:focus.active,
.btn-toggle.btn-lg.focus.active {
  outline: none;
}
.btn-toggle.btn-lg:before,
.btn-toggle.btn-lg:after {
  line-height: 2.5rem;
  width: 5rem;
  text-align: center;
  font-weight: 600;
  font-size: 1rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  position: absolute;
  bottom: 0;
  transition: opacity 0.25s;
}

.btn-toggle.btn-lg > .handle {
  position: absolute;
  top: 0.3125rem;
  left: 0.3125rem;
  width: 1.875rem;
  height: 1.875rem;
  border-radius: 1.875rem;
  background: #fff;
  transition: left 0.25s;
}
.btn-toggle.btn-lg.active {
  transition: background-color 0.25s;
}
.btn-toggle.btn-lg.active > .handle {
  left: 2.8125rem;
  transition: left 0.25s;
}
.btn-toggle.btn-lg.active:before {
  opacity: 0.5;
}
.btn-toggle.btn-lg.active:after {
  opacity: 1;
}
.btn-toggle.btn-lg.btn-sm:before,
.btn-toggle.btn-lg.btn-sm:after {
  line-height: 0.5rem;
  color: #fff;
  letter-spacing: 0.75px;
  left: 0.6875rem;
  width: 3.875rem;
}
.btn-toggle.btn-lg.btn-sm:before {
  text-align: right;
}
.btn-toggle.btn-lg.btn-sm:after {
  text-align: left;
  opacity: 0;
}
.btn-toggle.btn-lg.btn-sm.active:before {
  opacity: 0;
}
.btn-toggle.btn-lg.btn-sm.active:after {
  opacity: 1;
}
.btn-toggle.btn-lg.btn-xs:before,
.btn-toggle.btn-lg.btn-xs:after {
  display: none;
}
.btn-toggle.btn-sm {
  margin: 0 0.5rem;
  padding: 0;
  position: relative;
  border: none;
  height: 1.5rem;
  width: 3rem;
  border-radius: 1.5rem;
}
.btn-toggle.btn-sm:focus,
.btn-toggle.btn-sm.focus,
.btn-toggle.btn-sm:focus.active,
.btn-toggle.btn-sm.focus.active {
  outline: none;
}
.btn-toggle.btn-sm:before,
.btn-toggle.btn-sm:after {
  line-height: 1.5rem;
  width: 0.5rem;
  text-align: center;
  font-weight: 600;
  font-size: 0.55rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  position: absolute;
  bottom: 0;
  transition: opacity 0.25s;
}

.btn-toggle.btn-sm > .handle {
  position: absolute;
  top: 0.1875rem;
  left: 0.1875rem;
  width: 1.125rem;
  height: 1.125rem;
  border-radius: 1.125rem;
  background: #fff;
  transition: left 0.25s;
}
.btn-toggle.btn-sm.active {
  transition: background-color 0.25s;
}
.btn-toggle.btn-sm.active > .handle {
  left: 1.6875rem;
  transition: left 0.25s;
}
.btn-toggle.btn-sm.active:before {
  opacity: 0.5;
}
.btn-toggle.btn-sm.active:after {
  opacity: 1;
}
.btn-toggle.btn-sm.btn-sm:before,
.btn-toggle.btn-sm.btn-sm:after {
  line-height: -0.5rem;
  color: #fff;
  letter-spacing: 0.75px;
  left: 0.4125rem;
  width: 2.325rem;
}
.btn-toggle.btn-sm.btn-sm:before {
  text-align: right;
}
.btn-toggle.btn-sm.btn-sm:after {
  text-align: left;
  opacity: 0;
}
.btn-toggle.btn-sm.btn-sm.active:before {
  opacity: 0;
}
.btn-toggle.btn-sm.btn-sm.active:after {
  opacity: 1;
}
.btn-toggle.btn-sm.btn-xs:before,
.btn-toggle.btn-sm.btn-xs:after {
  display: none;
}
.btn-toggle.btn-xs {
  margin: 0 0;
  padding: 0;
  position: relative;
  border: none;
  height: 1rem;
  width: 2rem;
  border-radius: 1rem;
}
.btn-toggle.btn-xs:focus,
.btn-toggle.btn-xs.focus,
.btn-toggle.btn-xs:focus.active,
.btn-toggle.btn-xs.focus.active {
  outline: none;
}
.btn-toggle.btn-xs:before,
.btn-toggle.btn-xs:after {
  line-height: 1rem;
  width: 0;
  text-align: center;
  font-weight: 600;
  font-size: 0.75rem;
  text-transform: uppercase;
  letter-spacing: 2px;
  position: absolute;
  bottom: 0;
  transition: opacity 0.25s;
}

.btn-toggle.btn-xs > .handle {
  position: absolute;
  top: 0.125rem;
  left: 0.125rem;
  width: 0.75rem;
  height: 0.75rem;
  border-radius: 0.75rem;
  background: #fff;
  transition: left 0.25s;
}
.btn-toggle.btn-xs.active {
  transition: background-color 0.25s;
}
.btn-toggle.btn-xs.active > .handle {
  left: 1.125rem;
  transition: left 0.25s;
}
.btn-toggle.btn-xs.active:before {
  opacity: 0.5;
}
.btn-toggle.btn-xs.active:after {
  opacity: 1;
}
.btn-toggle.btn-xs.btn-sm:before,
.btn-toggle.btn-xs.btn-sm:after {
  line-height: -1rem;
  color: #fff;
  letter-spacing: 0.75px;
  left: 0.275rem;
  width: 1.55rem;
}
.btn-toggle.btn-xs.btn-sm:before {
  text-align: right;
}
.btn-toggle.btn-xs.btn-sm:after {
  text-align: left;
  opacity: 0;
}
.btn-toggle.btn-xs.btn-sm.active:before {
  opacity: 0;
}
.btn-toggle.btn-xs.btn-sm.active:after {
  opacity: 1;
}
.btn-toggle.btn-xs.btn-xs:before,
.btn-toggle.btn-xs.btn-xs:after {
  display: none;
}
.btn-toggle.btn-secondary {
  color: #6b7381;
  background: #bdc1c8;
}
.btn-toggle.btn-secondary:before,
.btn-toggle.btn-secondary:after {
  color: #6b7381;
}
.btn-toggle.btn-secondary.active {
  background-color: #ff8300;
}
/* #28b779!important */
</style>

 <header class="topbar" data-navbarbg="skin5">
        <nav class="navbar top-navbar navbar-expand-md navbar-dark">
          <div class="navbar-header" data-logobg="skin5">
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->

            <a class="navbar-brand center-logo" href="#">
              <!-- Logo icon -->
              <b class="logo-icon ps-3"></b>
              <span class="logo-text ms-4"></span>
              <span class="logo-text ms-4">
                <img src="../assets/images/headset.png" alt="homepage" class="light-logo" height="80px" width="80px" style="padding:10px;"/>
              </span>
            </a>
            
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-start me-auto">
              <li class="nav-item d-none d-lg-block">
                <a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a>
              </li>
              <!-- ============================================================== -->
              <!-- create new -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block font-20"><?php echo getGreeting(); ?></span>
                  <span class="d-block d-md-none"><i class="fa fa-plus"></i></span>
                </a>
              </li>
              <!-- ============================================================== -->
              <!-- Search -->
              <!-- ============================================================== -->
              <li class="nav-item search-box"></li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav">

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block font-20">Date : <?php echo date("d/m/Y"); ?></span>
                </a>
              </li>
              <li class="nav-item dropdown">
                <span class="d-none d-md-block" style="margin-top: 20px;">
                  <button type="button" class="btn btn-sm btn-toggle dropdown-toggle <?php echo $switch_button; ?>" data-toggle="button" aria-pressed="<?php echo $aria_pressed; ?>" autocomplete="off" onclick="update_status('<?php echo $user; ?>');">
                  <div class="handle"></div>
                </span>
              </li>
              <!-- <li class="nav-item dropdown">
                  <span class="d-none d-md-block" style="margin-top: 14px;">
                    <button class="btn btn-secondary dropdown-toggle" id="navbarDropdown" data-bs-toggle="dropdown" style="border-radius:20px;" type="button" id="dropdownMenuButton" onclick="update_agent_status('VDADready');">Break</button>
                  </span>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li><hr class="dropdown-divider" /></li>
                  <li>
                    <a class="dropdown-item" href="#">Something else here</a>
                  </li>
                </ul>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block btn btn-secondary" style='border-radius:20px;margin-top: 14px;'>Break <i class="fa fa-angle-down"></i></span>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <!-- <li><a class="dropdown-item" href="#">Another action</a></li> -->
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <span class="d-none d-md-block font-20"></span>
                </a>
              </li>

              <li class="nav-item dropdown">
                
                <ul
                  class="
                    dropdown-menu dropdown-menu-end
                    mailbox
                    animated
                    bounceInDown
                  "
                  aria-labelledby="2"
                >
                  <ul class="list-style-none">
                    <li>
                      <div class="">
                        <!-- Message -->
                        
                        <!-- Message -->
                        
                        <!-- Message -->
                        
                        <!-- Message -->
                        <a href="javascript:void(0)" class="link border-top">
                          <div class="d-flex no-block align-items-center p-10">
                            
                            <div class="ms-2">
                              <h5 class="mb-0">Luanch Admin</h5>
                              <span class="mail-desc">Just see the my new admin!</span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </li>
                  </ul>
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- End Messages -->
              <!-- ============================================================== -->

              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
              <li class="nav-item dropdown">
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="../assets/images/users/1.jpg"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  /><?php echo $_SESSION['SESS_USER'];?>
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="login.php?force_logout=1"
                    ><i class="fa fa-power-off me-1 ms-1"></i> Logout</a
                  >
                  <div class="dropdown-divider"></div>
                 
                </ul>
              </li>
              <!-- ============================================================== -->
              <!-- User profile and search -->
              <!-- ============================================================== -->
            </ul>
          </div>
        </nav>
      </header>