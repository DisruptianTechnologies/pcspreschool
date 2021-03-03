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
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/kvavatar/fileinput.css")?>">
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
<section id="dashboard-ecommerce" ng-controller="dashboard_controller">
  
 <!--Cards Start--> 
  <div class="row">
    <!-- Greetings Content Starts -->
    <div class="col-12">
 <div class="card" >
        <div class="card-header">
          <h4 class="card-title">View Child Record</h4>
          <h4 class="card-title"><?=$this->session->flashdata('error');?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
              <div class="form-body">
                <div class="row">
				  <!--Column-->
                  <div class="col-md-6 col-12">
					 <div id="kv-avatar-errors-1" class="center-block" style="width:100%;display:none"></div>

						  <div class="kv-avatar">
							<div class="file-loading">
								<input id="child_avatar" type="file" >
							</div>
						  </div>

                  </div>
                  <div class="col-md-6 col-12">
				  <div class="row">
				  <div class="col-12">
				  <h3 class="pb-1">Basic Info</h3>
				  </div>
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <p for="full-name-floating-icon">Full Name</p>
					  <h4 class="form-control-static" id="full-name-floating-icon" ><?=ucwords($childData["child_name"])?></h4>
                    </div>
                  </div>
				  
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
					  <p for="gender">Gender</p>
					  <h4 class="form-control-static" id="gender" ><?=ucwords($childData["gender"])?></h4>


					</div>
					</div>
					
					<div class="col-12">
                    <div class="form-label-group position-relative has-icon-left">
					
                      <p for="childDOB">DoB</p>
					  <h4 class="form-control-static" id="childDob" ><?=(new DateTime($childData["dob"]))->format("d/M/Y")?></h4>
                    </div>
                  </div>
                  </div>
				</div>
				<!--Column-->

				  <!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
					  <p for="allergytype">Allergy</p>

					  <h4 class="form-control-static" id="allergytype" ><?=ucwords($childData["allergy_type"])?></h4>
					</div>
                  </div>
				<!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
						<div class="form-group">
                      <p for="allergyseverity">Allergy Severity</p>
					  
					  <h4 class="form-control-static" id="allergyseverity" ><?=ucwords($childData["allergy_severity"])?></h4>
						</div>

					</div>
                  </div>
				<!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <p for="address">Address</p>
					  <h4 class="form-control-static" id="address" ><?=ucwords($childData["address"])?></h4>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <p for="country-floating-icon">Country</p>
					  <h4 class="form-control-static" id="country-floating-icon" ><?=ucwords($childData["country"])?></h4>

                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <p for="state-floating-icon">State</p>
					  <h4 class="form-control-static" id="state-floating-icon" ><?=ucwords($childData["state"])?></h4>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <p for="contact-floating-icon">Zipcode</p>
					  <h4 class="form-control-static" id="class-floating-icon" ><?=ucwords($childData["zipcode"])?></h4>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <p for="class-floating-icon">Class</p>
					  <h4 class="form-control-static" id="class-floating-icon" ><?=ucwords($childData["class_name"])?></h4>
                    </div>
                  </div>
				  
                  <div class="col-12">
				  <p>Parent Data</p>
				<?php foreach($parents as $parent):?>
					  <div class="row justify-content-between">
						<div class="col-md-3 col-sm-12 form-group">
						  <p for="pname">Name </p>
						  
						  <h4 class="form-control-static" id="pname" ><?=ucwords($parent["parent_name"])?></h4>
						</div>

						<div class="col-md-3 col-sm-12 form-group">
						  <p for="pmail">Email </p>
						  <h4 class="form-control-static" id="pmail" ><?=$parent["email"]?></h4>
						</div>
						<div class="col-md-3 col-sm-12 form-group">
						  <p for="pphone">Phone number</p>
						  <h4 class="form-control-static" id="pname" ><?=$parent["phone_number"]?></h4>
						</div>
						<div class="col-md-3 col-sm-12 form-group">
						  <p for="ptype">Parent Type</p>
						  <h4 class="form-control-static" id="pname" ><?=ucwords($parent["parent_type"])?></h4>
						</div>
					  </div>
					  <hr>
					  <?php endforeach;?>
                  </div>
              </div>
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
    <script src="<?=base_url("px-includes/app-assets/vendors/js/kvavatar/plugins/piexif.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/vendors/js/kvavatar/fileinput.js")?>"></script>
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
    <script src="<?=base_url("px-includes/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js")?>"></script>
    <!-- END: Page JS-->
<script>


$("#child_avatar").fileinput({
    overwriteInitial: true,
    maxFileSize: 2000,
    showClose: false,
    showCaption: false,
	browseOnZoneClick: false,
	showBrowse: false,
	zoomIndicator:'',
    browseLabel: '',
    removeLabel: '',
    browseIcon: '',
    removeIcon: '',
    removeTitle: '',
    elErrorContainer: '#kv-avatar-errors-1',
    msgErrorClass: 'alert alert-block alert-danger',
    defaultPreviewContent: '<img src="<?=base_url($childData["picture"])?>" style="height:185px;width:185px" alt="Your Avatar">',
    layoutTemplates: {main2: '{remove} {preview}',footer:''},
    allowedFileExtensions: []
});
layoutTemplates.footer = '<div class="file-thumbnail-footer">\n' +
'    <div class="file-caption-name">{caption}{size}</div>\n' +
'    \n' +
'</div>';
</script>
  </body>
  <!-- END: Body-->

</html>