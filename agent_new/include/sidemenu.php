<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li class="nav-separator"><span style="color: white;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<strong>User&nbsp;:&nbsp;</strong><?php echo $_SESSION['PHP_AUTH_USER']; ?>&nbsp;<?php echo date("(d M Y)")?></span></li>
        <li  class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $base_url;?>dashboard.php">
            <span class="icon"><i class="material-icons">dashboard</i></span><span>Dashboard</span>
          </a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Users Management</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_user.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add User
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_user.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View User
                  </a>
              </li>
              <!-- <li class="sidebar-item">
                  <a href="copy_user.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Copy User
                  </a>
              </li> -->
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">OB Campaigns</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_campaign.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add Campaign
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_campaign.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View Campaign
                  </a>
              </li>
              <!-- <li class="sidebar-item">
                  <a href="copy_campaign.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Copy Campaign
                  </a>
              </li> -->
          </ul>
        </li>

        
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="call_screen.php" aria-expanded="false">
            <i class="mdi mdi-chart-bar"></i><span class="hide-menu">Calling Screen</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="lead_upd_new.php" aria-expanded="false">
            <i class="mdi mdi-chart-bar"></i><span class="hide-menu">Leads</span>
          </a>
        </li>
        
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
</aside>