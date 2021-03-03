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
							<h4 class="card-title">Child Record</h4>
						</div>
						<div class="card-content">
							<div class="card-body card-dashboard">
								<p class="card-text">.</p>
								<div class="table-responsive">
									<table class="table zero-configuration">
										<thead>
											<tr>
												<th>Sr.no</th>
												<th>Picture</th>
												<th>Name</th>
												<th>Roll No</th>
												<th>Attendance Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php foreach($children as $key=>$cs):?>
											<tr>
												<td><?=$key+1?></td>
												<td><img class="round" style="height:50px;width:50px" src="<?=base_url($cs['picture'])?>"/></td>
												<td><?=ucwords($cs["child_name"])?></td>
												<td><?=$cs["roll_no"]?></td>
												<td>
												<?=check_today_attendance($cs['last_attendance_date'],$cs['last_attendance_status']);?>
												</td>
												<td class="dropdown">
													<span class="bx bx-dots-horizontal-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
													</span>
												   <div class="dropdown-menu dropdown-menu-right pb-0" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-125px, 19px, 0px);">
      <a class="dropdown-item" href="<?=base_url('staff/viewchild/').$cs["child_id"]?>"><i class="bx bx-user mr-50"></i>View Child</a>   <a class="dropdown-item" href="<?=base_url('staff/editchild/').$cs["child_id"]?>"><i class="bx bx-user mr-50"></i>Edit Child</a>  
		<?php if((check_today_attendance($cs['last_attendance_date'],$cs['last_attendance_status'])=="Undefined") && $cs["graduated"]==UNGRADUATED):?>
		<hr/>
   <a class="dropdown-item" href="<?=base_url('staff/markchildpresent/').$cs["child_id"]?>"><i class="bx bx-user mr-50"></i>Mark Present</a><a class="dropdown-item" href="<?=base_url('staff/markchildabsent/').$cs["child_id"]?>"><i class="bx bx-envelope mr-50"></i>Mark Absent</a><a class="dropdown-item" href="<?=base_url('staff/markchildleave/').$cs["child_id"]?>"><i class="bx bx-check-square mr-50"></i>Mark Leave</a>
		<hr/>
		<?php endif;?>
	<a class="dropdown-item" href="<?=base_url('staff/childattendance/').$cs["child_id"]?>"><i class="bx bx-check-square mr-50"></i>View Attendance</a>
		<hr/>
	<?php if($cs["graduated"]==UNGRADUATED):?>	
	  <a class="dropdown-item" href="<?=base_url('staff/addnote/').$cs["child_id"]?>"><i class="bx bx-user mr-50"></i>Write Diary Note</a>
	  <a class="dropdown-item" href="<?=base_url('staff/note/').$cs["child_id"]?>"><i class="bx bx-user mr-50"></i>View Diary Notes</a>
	  <hr/>
	  <a class="dropdown-item" href="#" data-toggle="modal" data-target="#default_<?=$key+1?>"><i class="bx bx-check-square mr-50"></i>Delete/Graduate Child</a>
	  <?php endif;?>
	  </div>
	   <div class="modal fade text-left" id="default_<?=$key+1?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
			  <?=form_open("staff/deletechild")?>
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">Delete Confirmation</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>
					<input type="hidden" name="child_id" value="<?=$cs["child_id"]?>">
                      Are you sure you want to delete/Graduate <?=ucwords($cs["child_name"])?>?
                    </p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                      <i class="bx bx-x d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                      <i class="bx bx-check d-block d-sm-none"></i>
                      <span class="d-none d-sm-block">Confirm</span>
                    </button>
                  </div>
                </div>
				</form>
              </div>
            </div>
											</td>
											</tr>
										<?php endforeach;?>

										</tbody>
										<tfoot>
											<tr>
												<th>Sr.no</th>
												<th>Picture</th>
												<th>Name</th>
												<th>Roll No</th>
												<th>Attendance Status</th>
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