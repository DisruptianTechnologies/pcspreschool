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
							<h4 class="card-title">Announcement Record</h4>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<p class="card-text">.</p>
								<div class="table-responsive">
									<table class="table zero-configuration">
										<thead>
											<tr>
												<th>Date</th>
												<th>Topic</th>
												<th>Description</th>
												<th>Attachment</th>
												<th>Time</th>
												<th>View</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($announcements as $key=>$announcement):?>
											<tr>
												<td><?=$announcement["date"]?></td>
												<td><?=$announcement["topic"]?></td>
												<td><?=sellipses($announcement["description"],35)?></td>
												<td><a href="<?=base_url($announcement["attachment"])?>">link</a></td>
												<td><?=$announcement["time"]?></td>
												<td><a href="<?=base_url("staff/announcement/").$announcement["announcement_id"]?>"><i style="font-weight:600;font-size:36px" class="bx bx-chevron-right"></i></td>
											</tr>
										<?php endforeach;?>

										</tbody>
										<tfoot>
											<tr>
												<th>Date</th>
												<th>Topic</th>
												<th>Description</th>
												<th>Attachment</th>
												<th>Time</th>
												<th>View</th>
											</tr>
										</tfoot>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>

<!-- Cards End-->
	
  </div>

<!--Clock In-->


<!-- Clock In-->

	
  </div>
</section>
<!-- Dashboard Ecommerce ends -->

        </div>
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

	<!-- END: Page JS-->

	
  </body>
  <!-- END: Body-->

</html>