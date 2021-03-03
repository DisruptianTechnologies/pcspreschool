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
    <title>Preschool Web Admin</title>
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
	<link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/vendors/css/dropify/css/dropify.min.css")?>">   

    <!-- END: Custom CSS-->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.js" type="text/javascript"></script>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
	<?php $this->load->view("superadmin/inc/header")?>
  <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
<?php $this->load->view("superadmin/inc/sidebar")?>;    <!-- END: Main Menu-->

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
          <h4 class="card-title">Add Preschool</h4>
          <h4 class="card-title"><?=$this->session->flashdata('error');?></h4>
        </div>
        <div class="card-content">
          <div class="card-body">
            <?=form_open_multipart("superadmin/editingpreschool","class='form' id='editpreschool'")?>
              <div class="form-body">
                <div class="row">
				  <!--Column-->
                  <div class="col-md-6 col-12">
					 <div class="row">
					<div class="col-md-6 col-12">					 
                      <label for="dropsinglepdfimage">Logo</label>
					  <input type="file" class="dropify" name="logo" data-default-file="<?=base_url($preschool['logo'])?>" data-max-file-size="6M" data-allowed-file-extensions="png jpg jpeg webp" id="dropsinglepdfimage"/>
					  </div>
					 </div>
                  </div>
                  <div class="col-md-6 col-12">
				  <div class="row">
				  <div class="col-12">
				  <h3 class="pb-1">Basic Info</h3>
				  </div>
				  <div class="col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="first-name-floating-icon" class="form-control" name="preschool_name" placeholder="Preschool Name" value="<?=$preschool["name"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="first-name-floating-icon">Preschool Name</label>
                    </div>
                  </div>
                  </div>
                  </div>
				  


				  <!--Column-->

				<!--Column Start-->
                  <div class="col-12">
					  <hr/>
					  <label>Contact Address</label>				
				  </div>
				   <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
					<textarea class="form-control" id="address" name="address" for="editpreschool" rows="2" placeholder="Address"><?=$preschool["address"]?></textarea>
                      <div class="form-control-position">
                        <i class="bx bx-envelope"></i>
                      </div>
                      <label for="address">Address</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="country-floating-icon" class="form-control" name="country" placeholder="Country" value="<?=$preschool["country"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-globe"></i>
                      </div>
                      <label for="country-floating-icon">Country</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="city-floating-icon" class="form-control" name="state" placeholder="State" value="<?=$preschool["state"]?>">
                      <div class="form-control-position">
                        <i class="bx bxs-city"></i>
                      </div>
                      <label for="city-floating-icon">State</label>
                    </div>
                  </div>
                  <div class="col-12 col-md-6">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="contact-floating-icon" class="form-control" name="zipcode" placeholder="Zipcode" value="<?=$preschool["zipcode"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-building-house"></i>
                      </div>
                      <label for="contact-floating-icon">Zipcode</label>
                    </div>
                  </div>
				  
                  <div class="col-12">
					  <hr/>
					  <label>Payment</label>				
				  </div>
					<div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="text" id="paytm-floating-icon" class="form-control" name="paytm_id" placeholder="PayTm Merchant ID" value="<?=$preschool["paytm_merchant_id"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                      <label for="paytm-floating-icon">PayTm Merchant ID</label>
                    </div>
                  </div>
				  
                  <div class="col-12">
					  <hr/>
					  <label>Mail	</label>				
				  </div>
				  <div class="col-md-6 col-12">
                    <div class="form-label-group position-relative has-icon-left">
                      <input type="email" id="smtp-floating-icon" class="form-control" name="smtp_mail" placeholder="SMTP Mail Address" value="<?=$preschool["smtp_mail_address"]?>">
                      <div class="form-control-position">
                        <i class="bx bx-envelope"></i>
                      </div>
                      <label for="smtp-floating-icon">SMTP Mail Address</label>
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
	<?php $this->load->view("superadmin/inc/footer")?>

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
	<script src="<?=base_url("px-includes/app-assets/vendors/js/dropify/dropify.js")?>"></script>

    <script src="<?=base_url("px-includes/app-assets/js/scripts/pages/dashboard-ecommerce.min.js")?>"></script>
    <script src="<?=base_url("px-includes/app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js")?>"></script>
    <!-- END: Page JS-->
<script>
$(".dropify").dropify();
</script>
  </body>
  <!-- END: Body-->

</html>