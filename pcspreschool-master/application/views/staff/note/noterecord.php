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
  
 <!--Cards Start--> 
		<section id="basic-datatable">
			<div class="row">
				<div class="col-12">
					<div class="card">
						<div class="card-header">
							<h4 class="card-title">Diary Notes of <?=ucwords($child["child_name"])?></h4>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<p class="card-text">.</p>
								<div class="table-responsive">
									<table class="table zero-configuration">
										<thead>
											<tr>
												<th>Sr.no</th>
												<th>Note Type</th>
												<th>Note</th>
												<th>Date</th>
												<th>Seen Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($notes as $key=>$st):?>
											<tr>
												<td><?=$key+1?></td>
												<td><?=ucfirst($st["type"])?></td>
												<td><?=sellipses($st["note"],35)?></td>
												<td><?=$st["date"]?></td>
												<td><?=num_to_seen($st["status"])?></td>
												<td class="dropdown nav-item">
											   <a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown" aria-expanded="true">
												<i class='bx bx-dots-vertical-rounded'></i>
												</a>
												   <div class="dropdown-menu dropdown-menu-right pb-0">
      <a class="dropdown-item" href="<?=base_url('staff/viewnote/').$st["note_id"]?>"><i class="bx bx-user mr-50"></i>View Note</a>
											</td>
											</tr>
										<?php endforeach;?>

										</tbody>
										<tfoot>
											<tr>
												<th>Sr.no</th>
												<th>Note Type</th>
												<th>Note</th>
												<th>Picture</th>
												<th>Seen Status</th>
												<th>Action</th>
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

	<!-- END: Page JS-->

  </body>
  <!-- END: Body-->

</html>