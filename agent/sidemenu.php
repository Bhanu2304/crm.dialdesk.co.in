<div class="scroll-sidebar">
          <!-- Sidebar navigation-->
          <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="dashboard.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Dashboard</span></a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="remoteadmin.php"
                  aria-expanded="false"
                  ><i class="mdi mdi-receipt"></i
                  ><span class="hide-menu">Change Status</span></a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="call_screen.php"
                  aria-expanded="false">
                    <i class="mdi mdi-chart-bar"></i>
                    <span class="hide-menu">Calling Screen</span>
                </a>
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="agent_status.php"
                  aria-expanded="false">
                    <i class="mdi mdi-chart-bar"></i>
                    <span class="hide-menu">Call Status</span>
                </a>
              </li>
              <?php $LOGuser_group = $_SESSION['LOGuser_group'];
              if($LOGuser_group == "Hooper"){?>
              <li class="sidebar-item">
                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="lead_upd_new.php" aria-expanded="false">
                  <i class="mdi mdi-chart-bar"></i><span class="hide-menu">Leads</span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </nav>
          <!-- End Sidebar navigation -->
        </div>