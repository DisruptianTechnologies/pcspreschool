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
 <?php if(!($this->session->userdata("role")==ADMIN || $this->uri->segment(3)==$this->session->userdata("staff_id"))){
$this->session->set_flashdata("error","Not Authorized");
redirect("staff/home");
exit();
 }
 ?>
        <div class="card-header">
          <h4 class="card-title">Edit Staff</h4>
          <h4 class="card-title"><?=$this->session->flashdata('error');?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <?=form_open_multipart("staff/editingstaff","class='form' id='editstaff'")?>
              <div class="form-body">
                <div class="row">
				  <!--Column-->
                  <div class="col-md-4 col-12">
					 <div id="kv-avatar-errors-1" class="center-block" style="width:100%;display:none"></div>

						  <div class="kv-avatar">
							<div class="file-loading">
								<input id="staff_avatar" name="picture" type="file" >
							</div>
						  </div>

                  </div>
                  <div class="col-md-8 col-12">
				  <div class="row">
				  <div class="col-12">
				  <h3 class="pb-1">Basic Info</h3>
				  </div>
				  <div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="first-name-floating-icon" class="form-control" name="first_name" placeholder="First Name" value="<?=$staff["first_name"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="first-name-floating-icon">First Name</label>
                    </div>
                  </div>
					
				  <div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="last-name-floating-icon" class="form-control" name="last_name" placeholder="Last Name" value="<?=$staff["last_name"]?>">
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
							<option value="<?=$staff["gender"]?>"><?=ucfirst($staff["gender"])?></option>
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
				  			
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
					<input type="date" name="dob" class="form-control pickadate-months-year picker__input" placeholder="Select Date of Birth" readonly="" id="childDOB" aria-haspopup="true" aria-expanded="true" aria-readonly="false" aria-owns="P1197894580_root" value="<?=$staff["dob"]?>"/>    
					<div class="form-control-position">
                        <i class="bx bx-calendar"></i>
                      </div>
                      <label for="childDOB">DoB</label>
                    </div>
                  </div>
                  </div>
				</div>
				
				
				<div class="col-md-5 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="phno-floating-icon" class="form-control" name="phone_number" placeholder="Phone Number" value="<?=$staff["phone_number"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="phno-floating-icon">Phone Number</label>
                    </div>
			    </div>

				<div class="col-md-7 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="email" id="email-floating-icon" class="form-control" name="email" placeholder="Email" value="<?=$staff["email"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="email-floating-icon">Email</label>
                    </div>
			    </div>
				  <?php if($this->session->userdata("role")==ADMIN ):?>

				<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
					<input type="date" name="start_date" class="form-control pickadate-months-year picker__input" placeholder="Date of Joining" readonly="" id="doj" aria-haspopup="true" aria-expanded="true" aria-readonly="false" value="<?=$staff["start_date"]?>" aria-owns="P1197894580_root"/>    
					<div class="form-control-position">
                        <i class="bx bx-calendar"></i>
                      </div>
                      <label for="doj">Date of Joining</label>
                    </div>
                  </div>
				  <?php endif;?>
              <hr/>
				<?php if($this->session->userdata("role")==ADMIN):?>
				<div class="col-12 py-2">
					<div class="row ">
					  <div class="col">
					  <p>For Classes</p>
					<?php foreach($classData as $key=>$class):?>
                    <div class="checkbox">
							<input type="checkbox" id="k<?=$key?>" class="checkbox-input" name="classes[]" value="<?=$class['id']?>" <?=in_json_checkbox($class["id"],$staff["class_id"])?>/>
						  <label for="k<?=$key?>" ><?=$class['name']?></label>
                    </div>
					<?php endforeach;?>
                  </div>
                  </div>
                  </div>	
				<?php endif;?>
			<?php if($this->session->userdata("role")==ADMIN):?>
				  <div class="col-12 py-2">
					<div class="row">
					  <div class="col">
					  <p>Schedule Days</p>
					<?php for($x=0;$x<7;$x+=1):?>
                    <div class="checkbox">
							<input type="checkbox" id="week_<?=$x?>" class="checkbox-input" name="schedule_day[]" value="<?=$x?>" <?=in_json_checkbox($x,$staff["schedule_day"])?>/>
						  <label for="week_<?=$x?>" ><?=num_to_weekday($x)?></label>
                    </div>
					<?php endfor;?>
                  </div>
                  </div>
                  </div>
				<?php endif;?>
				  <hr/>
			
			<!--Column-->

				  <!--Column Start-->

				<!--Column Start-->
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
					<textarea class="form-control" id="address" name="address" for="editstaff" rows="2" placeholder="Address"><?=$staff["address"]?></textarea>
                      <div class="form-control-position">
                        <i class="bx bx-envelope"></i>
                      </div>
                      <label for="address">Address</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="country-floating-icon" class="form-control" name="country" placeholder="Country" value="<?=$staff['country']?>">
                      <div class="form-control-position">
                        <i class="bx bx-globe"></i>
                      </div>
                      <label for="country-floating-icon">Country</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="state-floating-icon" class="form-control" name="state" placeholder="State" value="<?=$staff['state']?>">
                      <div class="form-control-position">
                        <i class="bx bxs-city"></i>
                      </div>
                      <label for="state-floating-icon">State</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="contact-floating-icon" class="form-control" name="zipcode" placeholder="Zipcode" value="<?=$staff['zipcode']?>">
                      <div class="form-control-position">
                        <i class="bx bx-building-house"></i>
                      </div>
                      <label for="contact-floating-icon">Zipcode</label>
                    </div>
                  </div>
				  <hr/>
				  <?php if($this->session->userdata("role")==ADMIN):?>
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
						<div class="form-group">
						  <select name="role" id="role" class="form-control">
							<option value="<?=$staff["role"]?>"><?=num_to_role($staff["role"])?></option>
							<option value="1">Admin</option>
							<option value="0">Staff</option>
						  </select>
						</div>
						<div class="form-control-position">
						<i class='bx bx-user-circle'></i>
                      </div>
					  <label for="role">Role</label>

					</div>
					</div>
					<?php endif;?>
					
				<hr/>				
				<?=$this->uri->segment(3);?>
				<?php if($this->session->userdata("role")==ADMIN || $this->uri->segment(3)==$this->session->userdata("staff_id")):?>
				<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
				  <a href="#" data-toggle="modal" data-target="#default_x"><button class="btn btn-light-secondary"><i class="bx bx-check-square mr-50"></i>Change Password</button></a>
				 	  

                    </div>
                  </div>
				<?php endif;?>
				  <div class="col-12 d-flex justify-content-end">
                    <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                    <button type="reset" class="btn btn-light-secondary mr-1 mb-1">Reset</button>
                  </div>
              </div>
            </form>
			  <div class="modal fade text-left" id="default_x" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable" role="document">
			  <?=form_open("staff/changepassword")?>
                <div class="modal-content">
                  <div class="modal-header">
                    <h3 class="modal-title" id="myModalLabel1">Password Change Confirmation</h3>
                    <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                      <i class="bx bx-x"></i>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to change password?</p>
					<input type="hidden" name="staff_id" value="<?=$staff["staff_id"]?>">

                    <div class="form-label-group position-relative has-icon-left">
                      <input type="password" id="pass-floating-icon" class="form-control" name="pass" placeholder="Password" >
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="pass-floating-icon">Password</label>
                    </div>

                    <div class="form-label-group position-relative has-icon-left">
                      <input type="password" id="cpass-floating-icon" class="form-control" name="cpass" placeholder="Confirm Password" >
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="cpas-floating-icon">Confirm Password</label>
                    </div>
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


$("#staff_avatar").fileinput({
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
    defaultPreviewContent: '<img src="<?=base_url($staff["picture"])?>" style="height:185px;width:185px" alt="Your Avatar">',
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