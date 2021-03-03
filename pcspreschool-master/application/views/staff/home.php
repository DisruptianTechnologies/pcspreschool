<!DOCTYPE html>

<html ng-app="myApp" class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Navneet Singh">
    <title>Preschool Web</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url("px-includes/app-assets/images/ico/favicon.ico")?>">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/vendors.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/charts/apexcharts.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/extensions/swiper.min.css")?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/bootstrap-extended.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/colors.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/components.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/themes/dark-layout.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/themes/semi-dark-layout.min.css")?>">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/core/menu/menu-types/vertical-menu.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/pages/dashboard-ecommerce.min.css")?>">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/assets/css/style.css")?>">
    <!-- END: Custom CSS-->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.js" type="text/javascript"></script>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
	<?php $this->load->view("staff/inc/header")?>
  <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
<?php $this->load->view("staff/inc/sidebar",array("classes"=>$classData))?>; 
   <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce" ng-controller="dashboard_controller">
  
 <!--Cards Start--> 
  <div class="card text-danger"><?=$this->session->flashdata("error");?></div>
  <div class="row">
    <!-- Greetings Content Starts -->
				<div class="col-12">
			<?php if((is_array($lastClockIn)) && $lastClockIn['status']==PRESENT && $lastClockIn["clock_out"]==null ):?>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<img class="round" style="height:70px;width:70px" src="<?=base_url($this->session->userdata('picture'))?>"/>
							<h4 class="card-title">Clock Out <?=$this->session->userdata('staff_name')?></h4>
							<p>Last Attendance Was</p>
							<p><?=attendance_status($lastClockIn["status"])?> on <?=$lastClockIn["clock_date"]?> </p>

						</div>
						<div class="card-content">
						  <div class="d-flex justify-content-between align-items-end">
							<a class="p-2" href="<?=base_url("staff/clockout/").$this->session->userdata('staff_id')?>">
							<button type="button" class="btn btn-primary glow">
							<span>Clock Out</span>
							<i class='bx bx-alarm-off' ></i>
							</button>
							</a>
						</div>
					</div>
				</div>
			</div>		
			   <?php elseif(($lastClockIn['clock_date']!=(new DateTime("now"))->format("Y-m-d")) || !is_array($lastClockIn) ):?>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<img class="round" style="height:70px;width:70px" src="<?=base_url($this->session->userdata('picture'))?>"/>
							<h4 class="card-title">Clock In <?=$this->session->userdata('staff_name')?> </h4>
							<p>Last Attendance Was</p>
							<p><?=attendance_status($lastClockIn["status"])?> on <?=$lastClockIn["clock_date"]?> </p>
						</div>
						<div class="card-content">
						  <div class="d-flex justify-content-between align-items-end">
							<a class="p-2" href="<?=base_url("staff/clockin/").$this->session->userdata('staff_id')?>">
							<button type="button" class="btn btn-primary glow">
							<span>Clock In</span>
							<i class='bx bx-alarm-add'></i>
							</button>
							</a>

							<a class="p-2" href="<?=base_url("staff/markabsent/").$this->session->userdata('staff_id')?>">
							<button type="button" class="btn btn-danger glow">
							<span>Mark Absent</span>
							<i class='bx bx-cross'></i>
							</button>
							</a>

							<a class="p-2" href="<?=base_url("staff/markleave/").$this->session->userdata('staff_id')?>">
							<button type="button" class="btn btn-info glow">
							<span>Mark Leave</span>
							<i class='bx bx-alarm-add'></i>
							</button>
							</a>
						</div>
					</div>
				</div>
			</div>
		<?php elseif($lastClockIn['clock_date']==(new DateTime("now"))->format("Y-m-d")):?>
			<div class="col-12">
					<div class="card">
						<div class="card-header">
							<img class="round" style="height:70px;width:70px" src="<?=base_url($this->session->userdata('picture'))?>"/>
							<?php if($lastClockIn['status']==0):?>
							<h4 class="card-title">Marked Absent for <?=$lastClockIn['clock_date']?></h4>
							<?php elseif($lastClockIn['status']==1):?>
							<h4 class="card-title">Marked Present for <?=$lastClockIn['clock_date']?></h4>
							<?php elseif($lastClockIn['status']==2):?>
							<h4 class="card-title">Marked Leave for <?=$lastClockIn['clock_date']?></h4>
							<?php endif;?>
						</div>
						<div class="card-content">
					
					</div>
				</div>
			</div>
			<?php endif;?>

		</div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="greeting-text">Children</h3>
          <p class="mb-0">Total Attendance of children</p>
        </div>
        <div class="card-content">
          <div class="card-body">
			  <div class="d-flex justify-content-between align-items-end">

                <h4><?=$childAttendanceStat["ct_child"]?>/<span class="text-bold-500"><?=$childTotalCount["ct_total"]?></span></h4>
			   </div>
			   <?php if($this->session->userdata("role")==ADMIN):?>
			  <a href="<?=base_url("staff/childattendance")?>">
                <button type="button" class="btn btn-primary glow">View Details</button>
			 </a>
			 <?php endif;?>
		  </div>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="greeting-text">Staff</h3>
          <p class="mb-0">Total Attendance of Staff Employed</p>
        </div>
        <div class="card-content">
          <div class="card-body">
			  <div class="d-flex justify-content-between align-items-end">
                <h4><?=$staffAttendanceStat["ct_staff"]?>/<span class="text-bold-500"><?=$staffTotalCount["ct_total"]?></span></h4>
			   </div>
		   <?php if($this->session->userdata("role")==ADMIN):?>

			  <a href="<?=base_url("staff/employee")?>">
                <button type="button" class="btn btn-primary glow">View Details</button>
			 </a>
			<?php endif;?>
		  </div>
        </div>
      </div>
    </div>
    </div>
<!-- Cards End-->
   <?php if($this->session->userdata("role")==ADMIN):?>

	<div class="row">
    <div class="col-12">
      <div class="card">
			<div class="row" id="table-striped">
			  <div class="col-12">
				<div class="card">
				  <div class="card-header">
					<h4 class="card-title">Attendance Status(Staff)</h4>
					<div class="heading-elements">
					<a href="<?=base_url("staff/attendance")?>">
						<button type="button" class="btn btn-outline-secondary">More</button>
					  </a>
					  </div>
				  </div>
					<!-- table striped -->
					<div class="table-responsive">
					  <table class="table table-striped mb-0">
						<thead>
						  <tr>
							<th>Sr. No</th>
							<th>Staff Name</th>
							<th>Date</th>
							<th>Status</th>
							<th>Clock in</th>
						  </tr>
						</thead>
						<tbody>
						<?php foreach ($staffAttendance as $key=>$attendData): ?>
						  <tr>
							<td class="text-bold-500"><?=$key+1?></td>
							<td><?=ucwords($attendData["staff_name"])?></td>
							<td><?=$attendData["attendance_date"]?></td>
							<td class="text-bold-500">
									<?php if($attendData["status"]==0):?>
									<?="Absent"?>
									<?php elseif ($attendData["status"] == 1): ?>
									<?="Present"?>
									<?php elseif ($attendData["status"] == 2): ?>
									<?="Leave"?>
									<?php endif;?>
							</td>
							<td><?=$attendData["clock_in"]?></td>

						  </tr>
						  <?php endforeach;?>
						</tbody>
					  </table>
					</div>
				  </div>
				</div>
			  </div>
			</div>
				</div>
    </div>
	<?php endif?>
  </div>
</section>
<!-- Dashboard Ecommerce ends -->

        </div>
    <!-- END: Content-->


    <!-- demo chat-->
   <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
	<?php $this->load->view("staff/inc/footer")?>

    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="<?=base_url("px-includes/app-assets/vendors/js/vendors.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js")?>"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="<?=base_url("px-includes/app-assets/vendors/js/charts/apexcharts.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/extensions/swiper.min.js")?>"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?=base_url("px-includes/app-assets/js/core/app-menu.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/js/core/app.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/js/scripts/components.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/js/scripts/footer.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/js/scripts/customizer.min.js")?>"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="<?=base_url("px-includes/app-assets/js/scripts/pages/dashboard-ecommerce.min.js")?>"></script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

</html>