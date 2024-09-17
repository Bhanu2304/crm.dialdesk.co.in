<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');
#echo "hello";die;
require("include/connection.php");
require("include/functions.php");
require("include/session-check.php");

$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];


//echo $_SESSION['SESS_USER']; exit;
$PHP_AUTH_USER = $_SESSION['PHP_AUTH_USER'];
$LOGuser_group = $_SESSION['LOGuser_group'];


$LOGallowed_campaigns = $_SESSION['LOGallowed_campaigns'];
$LOGadmin_viewable_groups = $_SESSION['LOGadmin_viewable_groups'];

if((!preg_match('/\-ALL/i', $LOGallowed_campaigns)) )
{
	$rawLOGallowed_campaignsSQL = preg_replace("/ -/",'',$LOGallowed_campaigns);
	$rawLOGallowed_campaignsSQL = preg_replace("/ /","','",$rawLOGallowed_campaignsSQL);
	$LOGallowed_campaignsSQL = "and campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$campLOGallowed_campaignsSQL = "and camp.campaign_id IN('$rawLOGallowed_campaignsSQL')";
	$whereLOGallowed_campaignsSQL = "where campaign_id IN('$rawLOGallowed_campaignsSQL')";
}


$stmt="SELECT allowed_campaigns,allowed_reports,admin_viewable_groups,admin_viewable_call_times,qc_allowed_campaigns,qc_allowed_inbound_groups from vicidial_user_groups where user_group='$LOGuser_group';";
$rslt=mysqli_query($link,$stmt);
$row=mysqli_fetch_assoc($rslt);
$LOGadmin_viewable_groups =		$row['admin_viewable_groups'];

$LOGadmin_viewable_groupsSQL='';
if ((!preg_match('/\-\-ALL\-\-/i',$LOGadmin_viewable_groups)) and (strlen($LOGadmin_viewable_groups) > 3) )
{
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ -/",'',$LOGadmin_viewable_groups);
  $rawLOGadmin_viewable_groupsSQL = preg_replace("/ /","','",$rawLOGadmin_viewable_groupsSQL);
  $LOGadmin_viewable_groupsSQL = "where user_group IN('$rawLOGadmin_viewable_groupsSQL')";
    
}


$user_group_id = 1;
$user_groups = get_user_groups($link);
// $menu_items = get_menu_items_by_group($user_group_id, $conn);
// $sidebar_menu = build_sidebar_menu($menu_items);




function get_user_groups($link) 
{
  $query = "SELECT * FROM vicidial_user_groups";
  $result = mysqli_query($link, $query);

  $user_groups = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $user_groups[] = $row;
  }

  return $user_groups;
}

function get_menu_items_by_group($group_id, $conn) 
{
  $query = "
      SELECT menu_items.* FROM menu_items
      INNER JOIN group_menu_access ON menu_items.id = group_menu_access.menu_id
      WHERE group_menu_access.group_id = $group_id AND menu_items.is_active = 1
      ORDER BY menu_items.parent_id, menu_items.id
  ";
  $result = mysqli_query($conn, $query);

  $menu_items = array();
  while ($row = mysqli_fetch_assoc($result)) {
      $menu_items[] = $row;
  }

  return $menu_items;
}

function build_sidebar_menu($items, $parent_id = 0) {
  $menu_html = '';
  $has_child = false;

  foreach ($items as $item) {
      if ($item['parent_id'] == $parent_id) {
          if ($has_child === false) {
              $has_child = true;
              $menu_html .= $parent_id == 0 ? '<ul id="sidebarnav" class="pt-4">' : '<ul aria-expanded="false" class="collapse first-level">';
          }

          $menu_html .= '<li class="sidebar-item">';
          $menu_html .= '<a class="sidebar-link waves-effect waves-dark sidebar-link" href="' . $item['url'] . '">';
          $menu_html .= '<i class="material-icons">' . $item['icon'] . '</i>';

          if ($parent_id == 0) {
              $menu_html .= '<span>' . $item['name'] . '</span>';
          } else {
              $menu_html .= '<span class="dropdown-toggle">' . $item['name'] . '</span>';
          }

          $menu_html .= '</a>';

          // Recursively call the function to build child items
          $menu_html .= build_sidebar_menu($items, $item['id']);
          $menu_html .= '</li>';
      }
  }

  if ($has_child === true) {
      $menu_html .= '</ul>';
  }

  return $menu_html;
}

# save list 

if(isset($_POST['SUBMIT']))
{
  #print_r($_POST);die;
  $list_id=$_POST["list_id"];
  $list_name = $_POST["list_name"];
  $campaign_id=$_POST["campaign_id"];
  $active=$_POST["active"];
  $list_description=$_POST["list_description"];


  $SQLdate = date("Y-m-d H:i:s");
  $message = '';

  ##### BEGIN ID override optional section, if enabled it increments user by 1 ignoring entered value #####
  $stmt = "SELECT value FROM vicidial_override_ids where id_table='vicidial_lists' and active='1';";
  $rslt=mysqli_query($link,$stmt);
  $voi_ct = mysqli_num_rows($rslt);
  if ($voi_ct > 0)
  {
    $row=mysqli_fetch_assoc($rslt);
    $menu_id = ($row['value'] + 1);

    $stmt="UPDATE vicidial_override_ids SET value='$list_id' where id_table='vicidial_lists' and active='1';";
    $rslt=mysqli_query($link,$stmt);
  }

  ##### END ID override optional section #####
 
  $message .= "<FONT FACE=\"ARIAL,HELVETICA\" COLOR=BLACK SIZE=2>";
  $stmt="SELECT count(*) from vicidial_lists where list_id='$list_id';";
  $rslt=mysqli_query($link,$stmt);
  $row=mysqli_fetch_assoc($rslt);
  if ($row['total'] > 0)
  {
    $message .= "<br>LIST NOT ADDED - there is already a list in the system with this ID\n";
    
  }
  else
    {
      if((strlen($campaign_id) < 2) or (strlen($list_name) < 2)  or ($list_id < 100) or (strlen($list_id) > 19) )
			{
				$message .= "LIST NOT ADDED - Please go back and look at the data you entered";
				$message .= "List ID must be between 2 and 8 characters in length";
				$message .= "List name must be at least 2 characters in length";
				$message .= "List ID must be greater than 100";
			}
      else
      {
        $message .= "<br><B>LIST ADDED: $list_id</B>";
        $SQLdate = date("Y-m-d H:i:s");
        $stmt="INSERT INTO vicidial_lists (list_id,list_name,campaign_id,active,list_description,list_changedate) values('$list_id','$list_name','$campaign_id','$active','$list_description','$SQLdate');";
        $rslt=mysqli_query($link,$stmt);

        ### LOG INSERTION Admin Log Table ###
        $SQL_log = "$stmt|";
        $SQL_log = preg_replace('/;/', '', $SQL_log);
        $SQL_log = addslashes($SQL_log);
        $stmt="INSERT INTO vicidial_admin_log set event_date='$SQLdate', user='$PHP_AUTH_USER', ip_address='$ip', event_section='LISTS', event_type='ADD', record_id='$list_id', event_code='ADMIN ADD LIST', event_sql=\"$SQL_log\", event_notes='';";
        $rslt=mysqli_query($link,$stmt);

        
      }
    }





}


?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <?php include("include/header.php")?>
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
              <h4 class="page-title">Add A New List</h4>
              <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><a href="#">Add A New List</a></li>
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
                <div class="card" data-widget='{"draggable": "false"}'>
                    <div class="card-header">
                        <h2>Add A New List</h2>
                        <span><?php echo $message; ?></span>
                        <div class="card-ctrls" data-actions-container="" data-action-collapse='{"target": ".card-body"}'></div>
                    </div>
                    <div data-widget-controls="" class="card-editbox"></div>
                    <div class="card-body">
                    <form method="POST" action="">
                        <label for="user_group">Select User Group:</label>
                        <select name="user_group" id="user_group" class="form-control" onchange="this.form.submit()">
                            <?php foreach ($user_groups as $group): ?>
                                <option value="<?php echo $group['user_group']; ?>" <?php if ($group['id'] == $user_group_id) echo 'selected'; ?>>
                                    <?php echo $group['user_group']." - ". $group['group_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </form>
                        
                    </div>
                </div>
            </div>
        </div>
        
      </div>

    </div>
    <script>
      function checkCharacter(e,t) {
          try {
              if (window.event) {
                  var charCode = window.event.keyCode;
              }
              else if (e) {
                  var charCode = e.which;
              }
              else { return true; }
              if (charCode > 31 && (charCode < 48 || charCode > 57)) {         
              return false;
              }
                return true;
              
          }
          catch (err) {
              alert(err.Description);
          }
      }
    </script>

    <?php include("include/footer.php");?>

    
  </body>
</html>
