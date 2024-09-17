<aside class="left-sidebar" data-sidebarbg="skin5">
  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="pt-4">
        <li  class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo $base_url;?>dashboard.php">
            <span class="icon"><i class="material-icons">dashboard</i></span><span>Dashboard</span>
          </a>
        </li>
        <?php $LOGuser_group = $_SESSION['LOGuser_group']; if($LOGuser_group == "ADMIN"){ ?>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#client" aria-expanded="false">
          <i class="mdi mdi-receipt"></i><span class="dropdown-toggle">Client Onboarding</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_client.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add New Client
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_client.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View Client
                  </a>
              </li>

              <li class="sidebar-item">
                  <a href="dashboard_new.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Dashboard
                  </a>
              </li>
              
          </ul>
        </li>
        <?php } ?>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#users" aria-expanded="false">
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
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#campaigns" aria-expanded="false">
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
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#campaigns" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Tagging Creation</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="field-creation.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Tagging Creation
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
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#upload" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Upload Data</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="upload_calling_data.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Import PD Data
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="import_data.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Import Manual Data
                  </a>
              </li>
              
          </ul>
        </li>



        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#ingroup" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Inbound Campaign</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_ingroup.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add In-Group
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_ingroup.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View In-Group
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_did.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View DID
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="add_call_menu.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add New Call Menu
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_call_menu.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View Call Menus
                  </a>
              </li>
          </ul>
        </li>

        <?php $LOGuser_group = $_SESSION['LOGuser_group']; if($LOGuser_group == "ADMIN"){ ?>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#user_group" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">User Groups</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_user_group.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add New User Group
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_user_group.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View User Groups
                  </a>
              </li>
              
          </ul>
        </li>
        <?php }else{ ?>
          <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="api_gallery.php" aria-expanded="false">
            <i class="mdi mdi-cloud-upload"></i><span class="hide-menu">Api Gallery</span>
          </a>
        </li>
        <?php } ?>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#remote_agents" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Remote Agents</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_remote_agent.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add Remote Agent
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_remote_agent.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View Remote Agent
                  </a>
              </li>
              
          </ul>
        </li>
        
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#shoft_phone" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Soft Phone</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_phone.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add Phone
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_phone.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View Phones
                  </a>
              </li>
              
          </ul>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#list" aria-expanded="false">
            <i class="mdi mdi-format-list-numbers"></i><span class="dropdown-toggle">Lists</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_list.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add List
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_list.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View List
                  </a>
              </li>
              
          </ul>
        </li>

        <!-- <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#call_menu" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Call Menu</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <li class="sidebar-item">
                  <a href="add_call_menu.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Add New Call Menu
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="view_call_menu.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> View Call Menus
                  </a>
              </li>
              
          </ul>
        </li> -->

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dnd_upload.php" aria-expanded="false">
            <i class="mdi mdi-cloud-upload"></i><span class="hide-menu">Upload DND</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#reports" aria-expanded="false">
            <i class="material-icons">supervisor_account</i><span class="dropdown-toggle">Reports</span>
          </a>
          <ul aria-expanded="false" class="collapse first-level">
              <?php $LOGuser_group = $_SESSION['LOGuser_group'];
              if($LOGuser_group != "Hooper"){?>

              
              <li class="sidebar-item">
                  <a href="apr.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> APR
                  </a>
              </li>

              <li class="sidebar-item">
                  <a href="agent_status.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Agent Call Detail
                  </a>
              </li>

              <!-- <li class="sidebar-item">
                  <a href="real_dash.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Real Time Dashboard
                  </a>
              </li> -->

              <li class="sidebar-item">
                  <a href="realtime_report_new1.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Real Time Dashboard
                  </a>
              </li>
              
              <li class="sidebar-item">
                  <a href="export_data.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Export Data
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="cdr_data.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> CDR
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="in_call_detail.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Call Export
                  </a>
              </li>
            <?php }else{
              ?>
              <li class="sidebar-item">
                  <a href="cdr_data.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> CDR
                  </a>
              </li>
              <li class="sidebar-item">
                  <a href="lead_report.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Leads Report
                  </a>
              </li>
              <?php } ?>
              
              <!-- <li class="sidebar-item">
                  <a href="agent_call_detail.php" class="sidebar-link">
                    <span class="icon"><i class="fa fa-angle-right" aria-hidden="true"></i></span> Export Leads
                  </a>
              </li> -->
              
          </ul>
        </li>

        
        <!-- <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="call_screen.php" aria-expanded="false">
            <i class="mdi mdi-chart-bar"></i><span class="hide-menu">Calling Screen</span>
          </a>
        </li> -->

        
        
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
</aside>