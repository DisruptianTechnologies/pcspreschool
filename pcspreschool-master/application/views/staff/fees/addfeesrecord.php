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
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/calendars/calendar.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/bootstrap-extended.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/colors.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/components.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/themes/dark-layout.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/themes/semi-dark-layout.min.css")?>">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/core/menu/menu-types/vertical-menu.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/pickers/pickadate/pickadate.css")?>">

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
<section id="dashboard-ecommerce" ng-controller="fees_controller">
  
 <!--Cards Start--> 
  <div class="row">
    <!-- Greetings Content Starts -->
    <div class="col-12">
 <div class="card" >
        <div class="card-header">
          <h4 class="card-title">Add Fees</h4>
          <h4 class="card-title"><?=$this->session->flashdata('error');?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <?=form_open_multipart("staff/addingfees","class='form ' id='addingfees'")?>
              <div class="form-body">
                <div class="row justify-content-center">
				  <!--Column-->
				  <div class="col-12">
				  <div class="row justify-content-center">
                  <div class="col-md-4 col-sm-12">
				  <div class="form-label-group position-relative has-icon-left">

					<select class="form-control" name="class_id" id="topic-floating-icon">
					<?php foreach($classData as $class):?>
					<option value="<?=$class["id"]?>"><?=ucfirst($class["name"])?></option>
					<?php endforeach;?>
					</select>
 
					<div class="form-control-position">
                        <i class="bx bx-calendar"></i>
                      </div>
                      <label for="topic-floating-icon">Class</label>
				  </div>
				  </div>
				  </div> 
				  </div>

				  <div class="col-12">
				  <div class="row justify-content-center">
                  <div class="col-md-4 col-sm-12">
				  <div class="form-label-group position-relative has-icon-left">

					<select class="form-control" name="fees_type" id="fees-type-floating-icon" ng-options="option.name for option in data.availableOptions track by option.id" ng-model="data.selectedOption">
			
					</select>
 
					<div class="form-control-position">
                        <i class="bx bx-calendar"></i>
                      </div>
                      <label for="fees-type-floating-icon">Fees Type</label>
				  </div>
				  </div>
				  </div> 
				  </div> 

				  <div class="col-12" ng-hide="data.selectedOption.id==1">
				  <div class="row justify-content-center">
                  <div class="col-md-4 col-sm-12">
				  <div class="form-label-group position-relative has-icon-left">

					<select class="form-control" name="selected_month" id="month-type-floating-icon">
					<?php for($x=1;$x<=12;$x++):?>
					<option value="<?=num_to_month($x)?>"><?=num_to_month($x)?></option>
					<?php endfor;?>
					</select>
 
					<div class="form-control-position">
                        <i class="bx bx-calendar"></i>
                      </div>
                      <label for="month-type-floating-icon">Fees Type</label>
				  </div>
				  </div>
				  </div> 
				  </div> 
				  

					<div class="col-12" ng-hide="data.selectedOption.id==0">
					  <div class="row justify-content-center">
						<div class="col-md-4 col-sm-12 form-group">
						<div class="form-label-group position-relative has-icon-left">
						  <input type="text" class="form-control" name="description" id="description-name" placeholder="Description">
							<div class="form-control-position">
							<i class="bx bx-book"></i>
						  </div>
						  <label for="description-name">Description</label>
						</div>
						</div>
						</div>
					</div>

				  <div class="col-12">
					  <div class="row justify-content-center">
						<div class="col-md-4 col-sm-12 form-group">
						<div class="form-label-group position-relative has-icon-left">
						  <input type="number" class="form-control" name="amount" id="pname" placeholder="Fees Amount">
							<div class="form-control-position">
							<i class="bx bx-book"></i>
						  </div>
						  <label for="pname">Amount</label>
						</div>
						</div>
						</div>
					</div>

					<div class="col-12">
					  <div class="row justify-content-center">
						<div class="col-md-4 col-sm-12 form-group">
						<div class="form-label-group position-relative has-icon-left">
						  <input type="date" class="form-control" name="last_date" id="ldate" placeholder="Last Date">
							<div class="form-control-position">
							<i class="bx bx-book"></i>
						  </div>
						  <label for="ldate">Last Date</label>
						</div>
						</div>
						</div>
					</div>

 			  


                 <div class="col-12 d-flex">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>     
	  </div>
    </div>
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
    <script src="<?=base_url("px-includes/app-assets/vendors/js/charts/apexcharts.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/extensions/swiper.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/pickers/pickadate/picker.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/pickers/pickadate/picker.time.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/pickers/pickadate/picker.date.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/pickers/pickadate/legacy.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/kvavatar/plugins/piexif.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/kvavatar/fileinput.js")?>"></script>
	<script src="<?=base_url("px-includes/app-assets/vendors/js/forms/repeater/jquery.repeater.min.js")?>"></script>
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
	<script src="<?=base_url("px-includes/app-assets/js/scripts/forms/form-repeater.min.js")?>"></script>
	<script src="<?=base_url("px-includes/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js")?>"></script>
    <!-- END: Page JS-->
<script>


$("#child_avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 2000,
    showClose: false,
    showCaption: false,
	browseOnZoneClick: true,
	showBrowse: false,
	zoomIndicator:'',
    browseLabel: '',
    removeLabel: '',
    browseIcon: '<i class="bx bx-folder-open"></i>',
    removeIcon: '<i class="bx bx-x"></i>',
    removeTitle: 'Cancel or reset changes',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="<?=base_url("px-includes/child/img/")?>a.png" style="height:185px;width:185px" alt="Your Avatar">',
    layoutTemplates: {main2: '{remove} {preview}',footer:''},
    allowedFileExtensions: ["jpg", "png", "webp"]
});
layoutTemplates.footer = '<div class="file-thumbnail-footer">\n' +
'    <div class="file-caption-name">{caption}{size}</div>\n' +
'    \n' +
'</div>';
</script>

	<script>
	var app = angular.module('myApp', []);
	app.controller('fees_controller', function($scope,$http) {
	$scope.data = {
		availableOptions: [
		  {id: '0', name: 'Regular'},
		  {id: '1', name: 'Other'},
		],
	   selectedOption: {id: '0', name: 'Regular'} //This sets the default value of the select in the ui
    };
		
	
	});

</script>
  </body>
  <!-- END: Body-->

</html>