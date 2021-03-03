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
<section id="dashboard-ecommerce" ng-controller="dashboard_controller">
  
 <!--Cards Start--> 
  <div class="row">
    <!-- Greetings Content Starts -->
    <div class="col-12">
 <div class="card" >
        <div class="card-header">
          <h4 class="card-title">Edit Child</h4>
          <h4 class="card-title"><?=$this->session->flashdata('error');?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <?=form_open_multipart("staff/editingchild","class='form' id='editchild'")?>
              <div class="form-body">
                <div class="row">
				  <!--Column-->
                  <div class="col-md-6 col-12">
					 <div id="kv-avatar-errors-1" class="center-block" style="width:100%;display:none"></div>
						
                      <label for="child_avatar">Child Picture</label>
						  <div class="kv-avatar">
							<div class="file-loading">
								<input id="child_avatar" name="picture" type="file" >
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
                      <input type="text" id="first-name-floating-icon" class="form-control" name="first_name" placeholder="First Name" value="<?=$child['first_name']?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="first-name-floating-icon">First Name</label>
                    </div>
                  </div>
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="last-name-floating-icon" class="form-control" name="last_name" placeholder="Last Name" value="<?=$child['last_name']?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="last-name-floating-icon">Last Name</label>
                    </div>
                  </div>
				  
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
						<div class="form-group">
						  <select name="gender" id="gender" class="form-control">
							<option value="<?=$child['gender']?>"><?=$child['gender']?></option>
							<option value="male">Male</option>
							<option value="female">Female</option>
						  </select>
						</div>
						<div class="form-control-position">
						<i class='bx bx-user-circle'></i>
                      </div>
					  <label for="gender">Gender</label>

					</div>
					</div>
					

					<div class="col-12">
                    <div class="form-label-group position-relative has-icon-left">
					<input type="date" name="dob" class="form-control pickadate-months-year picker__input" placeholder="Select Date of Birth" readonly="" id="childDOB" aria-haspopup="true" value="<?=$child['dob']?>" aria-expanded="true" aria-readonly="false" aria-owns="P1197894580_root"/>    
					<div class="form-control-position">
                        <i class="bx bx-calendar"></i>
                      </div>
                      <label for="childDOB">DoB</label>
                    </div>
                  </div>
                  </div>
				</div>


				  <!--Column-->

				  <!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
						<input type="text" name="allergy_type" id="allergytype" placeholder="Allergy(If Any)" class="form-control" value="<?=$child['allergy_type']?>"/>
					  <div class="form-control-position">
						<i class='bx bx-plus-medical'></i>
                      </div>
					  <label for="allergytype">Allergy(Leave Blank if None)</label>

					</div>
                  </div>
				<!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <label for="allergyseverity">Allergy Severity</label>
						<div class="form-group">
						  <select name="allergy_severity" id="allergyseverity" class="form-control">
							<option value="<?=$child['allergy_severity']?>"><?=ucfirst($child['allergy_severity'])?></option>
							<option value="">None(Select this if no Allergy)</option>
							<option value="mild">Mild Allergy</option>
							<option value="moderate">Moderate Allergy</option>
							<option value="severe">Severe Allergy</option>
						  </select>
						</div>
						<div class="form-control-position">
							<i class='bx bx-plus-medical'></i>
                      </div>

					</div>
                  </div>
				<!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
					<textarea class="form-control" id="address" name="address" for="editchild" rows="2" placeholder="Address"><?=$child['address']?></textarea>
                      <div class="form-control-position">
                        <i class="bx bx-envelope"></i>
                      </div>
                      <label for="address">Address</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="country-floating-icon" class="form-control" name="country" placeholder="Country" value="<?=$child['country']?>">
                      <div class="form-control-position">
                        <i class="bx bx-globe"></i>
                      </div>
                      <label for="country-floating-icon">Country</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" value="<?=$child['state']?>" id="city-floating-icon" class="form-control" name="state" placeholder="State">
                      <div class="form-control-position">
                        <i class="bx bxs-city"></i>
                      </div>
                      <label for="city-floating-icon">State</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" value="<?=$child['zipcode']?>" id="contact-floating-icon" class="form-control" name="zipcode" placeholder="Zipcode">
                      <div class="form-control-position">
                        <i class="bx bx-building-house"></i>
                      </div>
                      <label for="contact-floating-icon">Zipcode</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
					<select name="class_id" class="form-control" id="class-floating-icon">
							<option value=null>class</option>
					<?php foreach($classData as $class):?>
							<option value="<?=$class['id']?>" <?=in_array_select($child["class_id"],$class["id"])?>><?=$class['name']?></option>
					<?php endforeach;?>
					</select>
					<div class="form-control-position">
                        <i class="bx bxs-school"></i>
                      </div>
                      <label for="class-floating-icon">Class</label>
                    </div>
                  </div>
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" value="<?=$child['roll_no']?>" id="rollno-floating-icon" class="form-control" name="roll_no" placeholder="Roll No">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="roll-no-floating-icon">Roll No</label>
                    </div>
                  </div>
	
                  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
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
    defaultPreviewContent: '<img src="<?=base_url($child["picture"])?>" style="height:185px;width:185px" alt="Your Avatar">',
    layoutTemplates: {main2: '{remove} {preview}',footer:''},
    allowedFileExtensions: ["jpg", "png", "webp"]
});
layoutTemplates.footer = '<div class="file-thumbnail-footer">\n' +
'    <div class="file-caption-name">{caption}{size}</div>\n' +
'    \n' +
'</div>';
</script>
  </body>
  <!-- END: Body-->

</html>