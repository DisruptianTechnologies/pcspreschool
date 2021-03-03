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
	<link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/app-assets/css/pages/app-chat.min.css")?>">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="<?=base_url("px-includes/assets/css/style.css")?>">
    <!-- END: Custom CSS-->
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.7.9/angular.js" type="text/javascript"></script>

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern boxicon-layout no-card-shadow 2-columns  navbar-sticky footer-static content-left-sidebar chat-application  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    <!-- BEGIN: Header-->
	<?php $this->load->view("staff/inc/header")?>
  <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
<?php $this->load->view("staff/inc/sidebar",array("classes"=>$classData,"setting"=>$setting))?>;    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content" ng-controller="communicate_controller">
      <div class="content-area-wrapper">
        <div class="sidebar-left">
          <div class="sidebar">
		  <div class="chat-sidebar card">
			  <span class="chat-sidebar-close">
				<i class="bx bx-x"></i>
			  </span>
		  <div class="chat-sidebar-search position-relative">
			<div class="d-flex align-items-center">
			  <div class="chat-sidebar-profile-toggle">
				<div class="avatar">
				  <img src="<?=base_url($this->session->userdata("picture"))?>" alt="user_avatar" height="36" width="36">
				</div>
			  </div>
			  <fieldset class="form-group position-relative has-icon-left mx-75 mb-0">
				<input type="text" class="form-control round" id="chat-search" placeholder="Search">
				<div class="form-control-position">
				  <i class="bx bx-search-alt text-dark"></i>
				</div>
			  </fieldset>
			</div>
		  </div>	
		     <div class="chat-sidebar-list-wrapper pt-2">
			<ul class="chat-sidebar-list">
			  <li ng-repeat="staff in staffs" role="button" >
				<div class="d-flex align-items-center" ng-click="selectStaff(staff)">
				  <div class="avatar m-0 mr-50"><img src=<?=base_url()?>{{staff.picture}} height="36"
					  width="36" alt="img">
				  </div>
				  <div class="chat-sidebar-name">
					<h6 class="mb-0">{{staff.staff_name}}</h6><span class="text-muted"></span>
				  </div>
				</div>
			  </li>
			  </ul>
			 </div>
			 </div>
			 </div>
		   </div>
        <div class="content-right">
          <div class="content-overlay"></div>
          <div class="content-wrapper">
            <div class="content-header row">
            </div>	
            <div class="content-body" ng-init="selectStaffName=''"><!-- app chat overlay -->
			<div class="chat-overlay"></div>		
			<section class="chat-window-wrapper">
			  <div class="chat-start" ng-class="{'d-none':selectStaffName.length>1}">
				<span class="bx bx-message chat-sidebar-toggle chat-start-icon font-large-3 p-3 mb-1"></span>
				<h4 class="d-none d-lg-block py-50 text-bold-500">Select a contact to start a chat!</h4>
				<button class="btn btn-light-primary chat-start-text chat-sidebar-toggle d-block d-lg-none py-50 px-1">Start
				  Conversation!</button>
				  
			    </div>
		  <div class="chat-area">
			<div class="chat-header">
			  <header class="d-flex justify-content-between align-items-center border-bottom px-1 py-75">
				<div class="d-flex align-items-center">
				  <div class="chat-sidebar-toggle d-block d-lg-none mr-1"><i class="bx bx-menu font-large-1 cursor-pointer"></i>
				  </div>
				  <div class="avatar chat-profile-toggle m-0 mr-1">
					<img src="<?=base_url()?>{{selectStaffPicture}}" alt="avatar" height="36" width="36" />
				  </div>
				  <h6 class="mb-0">{{selectStaffName}}</h6>
				</div>
	<!--			<div class="chat-header-icons">
				  <span class="chat-icon-favorite">
					<i class="bx bx-star font-medium-5 cursor-pointer"></i>
				  </span>
				  <span class="dropdown">
					<i class="bx bx-dots-vertical-rounded font-medium-4 ml-25 cursor-pointer dropdown-toggle nav-hide-arrow cursor-pointer"
					  id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
					</i>
					<span class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
					  <a class="dropdown-item" href="JavaScript:void(0);"><i class="bx bx-pin mr-25"></i> Pin to top</a>
					  <a class="dropdown-item" href="JavaScript:void(0);"><i class="bx bx-trash mr-25"></i> Delete chat</a>
					  <a class="dropdown-item" href="JavaScript:void(0);"><i class="bx bx-block mr-25"></i> Block</a>
					</span>
				  </span>
				</div>-->
			  </header>
			</div>
			<!-- chat card start -->
			<div class="card chat-wrapper shadow-none">
			  <div class="card-content">
				<div class="card-body chat-container">
				  <div class="chat-content">
					<div ng-repeat="message in messages" class="chat" ng-class="{'chat-left': message.sent=='<?=SENDERSTAFF?>'}">
					  <div class="chat-avatar">
						<!--<a class="avatar m-0">
						  <img src="<?=base_url()?>{{selectParentPicture}}" alt="avatar" height="36"
							width="36" />
						</a>-->
					  </div>
					  <div class="chat-body">
						<div class="chat-message">
						  <p>{{message.message}}</p>
						  <span class="chat-time">{{message.create_timestamp}}</span>
						</div>
					  </div>
					</div>
				</div>
				</div>
			  </div>
			  <div class="card-footer chat-footer border-top px-2 pt-1 pb-0 mb-1">
				<form class="d-flex align-items-center" ng-submit="sendMessage()">
				  <input type="text" ng-model="messageData" class="form-control chat-message-send mx-1" placeholder="Type your message here...">
				  <button type="submit" class="btn btn-primary glow send d-lg-flex"><i class="bx bx-paper-plane"></i>
					<span class="d-none d-lg-block ml-1">Send</span></button>
				</form>
			  </div>
			</div>
			<!-- chat card ends -->
		  </div>
				
			  </div>			
           </div>		   
           </div>		   
        </div>		   
		   
	  </div>
    </div>
<!-- Dashboard Ecommerce ends -->

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
	<script src="<?=base_url("px-includes/app-assets/js/scripts/pages/app-chat.min.js")?>"></script>


	<script>
	var app = angular.module('myApp', []);
	app.controller('communicate_controller', function($scope,$http) {
	var url="<?=base_url()?>api/staffdata/employed";
	$http.get(url).then(function (response) {
	$scope.staffs=response.data[0];
	console.log(response.data);
	}, function (response) {
	console.log(response);

	});
		
	$scope.selectStaff=function(staff)
	{	
		$scope.selectStaffName=staff.staff_name;
		$scope.selectStaffPicture=staff.picture;
		$scope.selectStaffId=staff.staff_id;
		$scope.hiddenStaff=staff;
		var url="<?=base_url()?>api/communicate/staff";
		var data={
		staffId:$scope.selectStaffId
		};
		$http.post(url,data).then(function (response) {
		$scope.messages=response.data;
		console.log(response);

		}, function (response) {
		console.log(response);

		// this function handles error

		});
	}
	$scope.sendMessage = function(){
		var url="<?=base_url()?>api/sendmessagestaff/admin";
		var data={
			message:$scope.messageData,
			staffId:$scope.selectStaffId,
		};
		console.log(data);
		$http.post(url,data).then(function (response) {
		$scope.messageData=null;
		$scope.selectStaff($scope.hiddenStaff);
		console.log(response.data);

		}, function (response) {
		$scope.messageData=null;
		$scope.selectParent($scope.hiddenParent);
		console.log(response);
		// this function handles error

		});
		
	}

	
		
	
	});

</script>
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

</html>