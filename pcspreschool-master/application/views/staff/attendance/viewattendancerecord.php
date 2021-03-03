<!DOCTYPE html>

<html ng-app="myApp" class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
  
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="Preschool ERP, Dashboard function, dashboard template, Free Preschool ERP, responsive web app">
    <meta name="author" content="Navneet Singh">
    <title>Preschool Web</title>
    <link rel="shortcut icon" type="image/x-icon" href="<?=base_url("px-includes/app-assets/images/ico/favicon.ico")?>">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">



    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/vendors.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/tables/datatable/datatables.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/extensions/swiper.min.css")?>">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/calendars/calendar.css")?>">
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
<?php $this->load->view("staff/inc/sidebar",array("classes"=>$classData,"setting"=>$setting))?>;    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- Dashboard Ecommerce Starts -->
<section id="dashboard" ng-controller="dashboard_controller">
  
 <!--Calendar Start--> 
		<section id="basic-datatable">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<img class="round" style="height:100px;width:100px" src="<?=base_url($staff["picture"])?>"/>
							<h4 class="card-title">View Attendance of <?=$staff["staff_name"]?></h4>
						</div>
						<div class="card-content">
						
						<div id="calendar"></div>	
					</div>
				</div>
			</div>
			</div>
		</section>
<!--Clock In-->
		
			<div class="row">
			<?php if((is_array($lastClockIn)) && $lastClockIn['status']==PRESENT  && $lastClockIn["clock_out"]==NULL):?>
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<img class="round" style="height:70px;width:70px" src="<?=base_url($staff['picture'])?>"/>
							<h4 class="card-title">Clock Out <?=$staff['staff_name']?></h4>
							<p>Last Attendance Was</p>
							<p><?=attendance_status($lastClockIn["status"])?> on <?=$lastClockIn["clock_date"]?> </p>

						</div>
						<div class="card-content">
						  <div class="d-flex justify-content-between align-items-end">
							<a class="p-2" href="<?=base_url("staff/clockout/").$staff['staff_id']?>">
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
							<img class="round" style="height:70px;width:70px" src="<?=base_url($staff['picture'])?>"/>
							<h4 class="card-title">Clock In <?=$staff['staff_name']?> </h4>
							<?php if(is_array($lastClockIn)):?>
							<p>Last Attendance Was</p>
							<p><?=attendance_status($lastClockIn["status"])?> on <?=$lastClockIn["clock_date"]?> </p>
							<?php endif;?>
						</div>
						<div class="card-content">
						  <div class="d-flex justify-content-between align-items-end">
							<a class="p-2" href="<?=base_url("staff/clockin/").$staff['staff_id']?>">
							<button type="button" class="btn btn-primary glow">
							<span>Clock In</span>
							<i class='bx bx-alarm-add'></i>
							</button>
							</a>

							<a class="p-2" href="<?=base_url("staff/markabsent/").$staff['staff_id']?>">
							<button type="button" class="btn btn-danger glow">
							<span>Mark Absent</span>
							<i class='bx bx-cross'></i>
							</button>
							</a>

							<a class="p-2" href="<?=base_url("staff/markleave/").$staff['staff_id']?>">
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
							<img class="round" style="height:70px;width:70px" src="<?=base_url($staff['picture'])?>"/>
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
  

<!-- Clock In-->

	
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
	<script  type="text/javascript" src="<?=base_url("px-includes/app-assets/vendors/js/calendar/calendar.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/datatables.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/dataTables.bootstrap4.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/buttons.html5.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/buttons.pint.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/buttons.bootstrap.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/pdfmake.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/tables/datatable/vfs_fonts.js")?>"></script>
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
	<script src="<?=base_url("px-includes/app-assets/js/scripts/datatables/datatable.min.js")?>"></script>

	<!-- END: PHP JS-->
	<script>
		var events = [
		  <?php foreach($staffAttendance as $st):?>
		  <?php if($st['status']==PRESENT):?>
			{'Date': new Date("<?=$st['attendance_date']?>"),'Color':'#49EC4A' ,'Title': "Clock In:<?=$st['clock_in']?><br/>Clock Out:<?=$st['clock_out']?>"},
		  <?php elseif($st['status']==ABSENT):?>
		  {'Date': new Date("<?=$st['attendance_date']?>"),'Color':'#EF595A' ,'Title': 'Absent'},
		  <?php elseif($st['leave']==LEAVE):?>
		  {'Date': new Date("<?=$st['attendance_date']?>"),'Color':'#396AEF' ,'Title': 'Leave'},
		  <?php endif;?>
		  
		<?php endforeach;?>
		];
		var settings = {};
		var element = document.getElementById('calendar');
		calendarUse(element, events, settings);

	</script>
	
	<!-- END: Page JS-->

	
  </body>
  <!-- END: Body-->

</html>