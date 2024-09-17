<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];

$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
        <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"> -->
  
  </head>

  <body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
      <div class="lds-ripple">
        <div class="lds-pos"></div>
        <div class="lds-pos"></div>
      </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
		<?php include("include/sub-header.php")?>
		<?php include("include/sidemenu.php")?>
      <!-- ============================================================== -->
      <!-- End Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Page wrapper  -->
      <!-- ============================================================== -->
      <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
          <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
              <h4 class="page-title">Reports</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Reports</a></li>
                    <li class="breadcrumb-item"><a href="#" onclick="return  window.history.back()" >Back</a></li>
                  </ol>
                </nav>
              </div>
            </div>
          </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div data-widget-group="group1">
            <div class="card">
                                        <h5 class="card-header bg-transparent">Reports</h5>
                                        <div class="card-body">
                                            <div class="row">
                                                
                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <!-- <h2 class="header-title mt-1 font-weight-bold"><mark>Call -</mark></h2> -->
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/call_mis_report')">
                                                            Apr Report
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/abandon_mis_report')">
                                                            Agent Call Details
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/answer_mis_report')">
                                                            Answer Call MIS
                                                        </div>
                                                        
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="row">
                                                        <div class="col-sm-2">
                                                            <h4 class="header-title mt-1 font-weight-bold"><mark>Tagging</mark></h4>
                                                        </div>
                                                        
                                                        <div class="col-sm-2">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/tagging_mis_report')">
                                                            Tagging MIS
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/agent_mis_report')">
                                                            Agent Wise MIS
                                                        </div>
                                                        <div class="col-sm-2">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/category_mis_report')">
                                                           Call Scenario Mis
                                                        </div>
                                                       
                                                        <div class="col-sm-3">
                                                            <input type="radio" name="radio" id="radio" onclick="redirect('/clients/call_tagging_report')">
                                                           Call Tagging Summary
                                                        </div>
                                                       
                                                       
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
             
            </div>
           
        </div>

        
      </div>

    </div>

    <script>

        function redirect(path){
            window.location=path;
        }

    </script>
    

    <?php include("include/footer.php");?>

    
  </body>
</html>
