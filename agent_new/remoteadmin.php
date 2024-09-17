<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
session_start();
require("../include/connection.php");
require("functions.php");
include("session-check.php");
//echo $_SESSION['SESS_USER']; exit;




	$remote_agent_id = $_POST['remote_agent_id'];
	$conf_exten = $_POST['conf_exten'];
	$status = $_POST['status'];
	$groups = " ".implode(" ",$_POST['groups'])." -";
	//$remote_agent_id = $_POST['remote_agent_id'];



	if($_POST['SUBMIT'])
	{
		if ( strlen($conf_exten) < 2 )
		{
      echo "<br>"._QXZ("REMOTE AGENTS NOT MODIFIED - Please go back and look at the data you entered")."\n";
    }
	  else
		{
      $stmt="UPDATE vicidial_remote_agents set conf_exten='" . mysqli_real_escape_string($link, $conf_exten) . "', status='" . mysqli_real_escape_string($link, $status) . "', closer_campaigns='" . mysqli_real_escape_string($link, $groups) . "' where remote_agent_id='" . mysqli_real_escape_string($link, $remote_agent_id) . "';"; 
      $rslt=mysqli_query($link,$stmt);

      #echo "$stmt\n";
      header("location:remoteadmin.php?msg=succ");	
      //$Msg = "<br>REMOTE AGENTS MODIFIED\n";
      

      ### LOG CHANGES TO LOG FILE ###
      #	$fp = fopen ("./admin_changes_log.txt", "a");
      #	fwrite ($fp, "$date|MODIFY REMOTE AGENTS ENTRY     |$PHP_AUTH_USER|$ip|$stmt|\n");
      #	fclose($fp);
		}
	}


	$stmt="SELECT remote_agent_id,user_start,number_of_lines,server_ip,conf_exten,status,campaign_id,closer_campaigns from vicidial_remote_agents where user_start='" . mysqli_real_escape_string($link, $_SESSION['SESS_USER']) . "';";
	$rslt=mysqli_query($link,$stmt);
	$row=mysqli_fetch_row($rslt);
	$remote_agent_id =	$row[0];
	$user_start =		$row[1];
	$number_of_lines =	$row[2];
	$server_ip =		$row[3];
	$conf_exten =		$row[4];
	$status =			$row[5];
	$campaign_id =		$row[6];

	$closer_campaigns =	$row[7];
	$closer_campaigns = preg_replace("/ -$/","",$closer_campaigns);
	$groups = explode(" ", $closer_campaigns);
  $search_campaigns = "'".str_replace(" ","','",$closer_campaigns)."'";
  //echo $search_campaigns;

	$stmt="SELECT group_id,group_name from vicidial_inbound_groups where group_id in ($search_campaigns) order by group_id;";
	$rslt=mysqli_query($link,$stmt);
	$groups_to_print = mysqli_num_rows($rslt);
	$groups_list='';
	$groups_value='';

	$o=0;
	while ($groups_to_print > $o)
		{
		$rowx=mysqli_fetch_row($rslt);
		$group_id_value = $rowx[0];
		$group_name_value = $rowx[1];
		$groups_list .= "<input type=\"checkbox\" name=\"groups[]\" value=\"$group_id_value\"";
		$p=0;
		while ($p<50)
			{
			if ($group_id_value == $groups[$p]) 
				{
				$groups_list .= " CHECKED";
				$groups_value .= " $group_id_value";
				}
			$p++;
			}
		$groups_list .= "> $group_id_value - $group_name_value<BR>\n";
		$o++;
		}	
		if (strlen($groups_value)>2) {$groups_value .= " -";}

?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="Dialer Cloud Dialing"
    />
    <meta
      name="description"
      content="Dialer Cloud Dialing"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Nimantran Cloud Dialing</title>
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
    <!-- Custom CSS -->
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/select2/dist/css/select2.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/jquery-minicolors/jquery.minicolors.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="../assets/libs/quill/dist/quill.snow.css"
    />
    <link href="../dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="../https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="../https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
      <!-- ============================================================== -->
      <!-- Topbar header - style you can find in pages.scss -->
      <!-- ============================================================== -->
     
		<?php include("header.php")?>

      <!-- ============================================================== -->
      <!-- End Topbar header -->
      <!-- ============================================================== -->
      <!-- ============================================================== -->
      <!-- Left Sidebar - style you can find in sidebar.scss  -->
      <!-- ============================================================== -->
      <aside class="left-sidebar" data-sidebarbg="skin5">
        <!-- Sidebar scroll-->
        
		<?php include("sidemenu.php")?>

        <!-- End Sidebar scroll-->
      </aside>
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
              <h4 class="page-title">Change Status</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                      Change Status
                    </li>
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
          <!-- ============================================================== -->
          <!-- Start Page Content -->
          <!-- ============================================================== -->
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <form class="form-horizontal" action="remoteadmin.php" method="POST" name="userform" id="userform">
                  <div class="card-body">
                    <h4 class="card-title">Change Status    <?php if($_GET['msg']=="succ") { echo '<span color=green>REMOTE AGENTS MODIFIED</span>'; }?></h4>
                    <div class="form-group row">
                      <label
                        for="fname"
                        class="col-sm-2 text-end control-label col-form-label">User ID</label>
                      <div class="col-sm-2">
					  <input type='hidden' name='remote_agent_id' id='remote_agent_id' value='<?php echo $remote_agent_id;?>'>
					  	<?php echo  $user_start;?>
                      </div>
					  <label
                        for="lname"
                        class="col-sm-2 text-end control-label col-form-label"
                        >Phone Login</label
                      >
                      <div class="col-sm-2">
                        <input
                          type="text"
                          class="form-control"
                          id="conf_exten"
						  name="conf_exten"
						  required
                          placeholder="Last Name Here"
						  value="<?php echo $conf_exten;?>"
                        />
                      </div>
					  <label
                        for="lname"
                        class="col-sm-2 text-end control-label col-form-label"
                        >Status</label
                      >
                      <div class="col-sm-2">
							<select class='form-control' required size='1' name='status'>
							<option value="ACTIVE" <?php if($status=='ACTIVE') { echo "selected" ;}?>>ACTIVE</option>
							<option value="INACTIVE"  <?php if($status=='INACTIVE') { echo "selected" ;}?>>INACTIVE</option>  
							</select>
                      </div>
					  
					  
                    </div>
                    
                    
                    <div class="form-group row">
					<label
                        for="lname"
                        class="col-sm-2 text-end control-label col-form-label"
                        >Campaign Id</label
                      >
                      <div class="col-sm-2">
					  		<?php echo  $campaign_id;?>
                      </div>
					  <label
                        for="lname"
                        class="col-sm-2 text-end control-label col-form-label"
                        >Ingroup Name</label
                      >
                      <div class="col-sm-5">
					 		 <?php echo  $groups_list;?>
                      </div>

                    </div>
                    
                  </div>
                  <div class="border-top">
                    <div class="card-body">
					  <input class="btn btn-primary" type="submit" name="SUBMIT" value="SUBMIT">
                    </div>
                  </div>
                </form>
              </div>
              
            </div>
            
          </div>
          <!-- editor -->
          
          <!-- ============================================================== -->
          <!-- End PAge Content -->
          <!-- ============================================================== -->
          <!-- ============================================================== -->
          <!-- Right sidebar -->
          <!-- ============================================================== -->
          <!-- .right-sidebar -->
          <!-- ============================================================== -->
          <!-- End Right sidebar -->
          <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        
		<?php include("footer.php");?>

        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
      </div>
      <!-- ============================================================== -->
      <!-- End Page wrapper  -->
      <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!-- This Page JS -->
    <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../dist/js/pages/mask/mask.init.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script>
      //***********************************//
      // For select 2
      //***********************************//
      $(".select2").select2();

      /*colorpicker*/
      $(".demo").each(function () {
        //
        // Dear reader, it's actually very easy to initialize MiniColors. For example:
        //
        //  $(selector).minicolors();
        //
        // The way I've done it below is just for the demo, so don't get confused
        // by it. Also, data- attributes aren't supported at this time...they're
        // only used for this demo.
        //
        $(this).minicolors({
          control: $(this).attr("data-control") || "hue",
          position: $(this).attr("data-position") || "bottom left",

          change: function (value, opacity) {
            if (!value) return;
            if (opacity) value += ", " + opacity;
            if (typeof console === "object") {
              console.log(value);
            }
          },
          theme: "bootstrap",
        });
      });
      /*datwpicker*/
      jQuery(".mydatepicker").datepicker();
      jQuery("#datepicker-autoclose").datepicker({
        autoclose: true,
        todayHighlight: true,
      });
      var quill = new Quill("#editor", {
        theme: "snow",
      });
    </script>
  </body>
</html>
