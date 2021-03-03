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
	<?php $this->load->view("parent/inc/header")?>
  <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
<?php $this->load->view("parent/inc/sidebar")?>; 
   <!-- END: Main Menu-->

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
    <div class="col-xl-3 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
		<?php if ($unseenNotes != 0): ?>
		<span class="badge badge-pill badge-danger badge-up"><?=$unseenNotes?></span>
		<?php endif;?>
          <h3 class="greeting-text">Notes</h3>
          <p class="mb-0">Sent by the PreSchool</p>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end">
				<i class='bx bx-notepad' style="font-size:100px" width="100%"></i>
                <p>You have <?=$unseenNotes?> unread notes.</p>
		  
            </div>
			  <a href="<?=base_url("parent/notes")?>">
                <button type="button" class="btn btn-primary glow">View Notes</button>
			 </a>
		  </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
		<?php if ($unseenPtm != 0): ?>
		<span class="badge badge-pill badge-danger badge-up"><?=$unseenPtm?></span>
		<?php endif;?>
          <h3 class="greeting-text">Ptm</h3>
          <p class="mb-0">Upcoming Ptm </p>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end">
				<i class='bx bx-task' style="font-size:100px" width="100%"></i>
                <p>You have <?=$unseenPtm?> upcoming PTM</p>
		  
            </div>
			  <a href="<?=base_url("parent/ptm")?>">
                <button type="button" class="btn btn-primary glow">View Ptm</button>
			 </a>
		  </div>
        </div>
      </div>
    </div>

    <div class="col-xl-3 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
		<?php if ($calendarEvent != 0): ?>
		<span class="badge badge-pill badge-danger badge-up"><?=$calendarEvent?></span>
		<?php endif;?>
          <h3 class="greeting-text">Events</h3>
          <p class="mb-0">Any upcoming event</p>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end">
				<i class='bx bx-calendar' style="font-size:100px" width="100%"></i>
                <p>You have <?=$calendarEvent?> upcoming events.</p>
		  
            </div>
			  <a href="<?=base_url("parent/events")?>">
                <button type="button" class="btn btn-primary glow">View events</button>
			 </a>
		  </div>
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="greeting-text">Child Activities</h3>
          <p class="mb-0">Activities done by child</p>
        </div>
        <div class="card-content">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-end">
				<i class='bx bxs-report' style="font-size:100px" width="100%"></i>
            </div>
			  <a href="<?=base_url("parent/activities")?>">
                <button type="button" class="btn btn-primary glow">View Activities</button>
			 </a>
		  </div>
        </div>
      </div>
    </div>
  </div>
<!-- Cards End-->
<div class="row">
<?php foreach($childAttendance as $outkey=>$child):?>
    <div class="col-12">
      <div class="card">
			<div class="row" id="table-striped">
			  <div class="col-12">
				<div class="card">
				  <div class="card-header">
					<h4 class="card-title">Attendance Status(<?=ucwords($this->session->userdata("childData")["first_name"][$outkey])?>)</h4>
					<div class="heading-elements">
					<a href="<?=base_url("parent/attendance/").$this->session->userdata("childData")["id"][$outkey]?>">
						<button type="button" class="btn btn-outline-secondary">More</button>
					  </a>
					  </div>
				  </div>
					<!-- table striped -->
					<div class="table-responsive">
					  <table class="table table-striped mb-0">
						<thead>
						  <tr>
							<th>Sr. No</th>
							<th>Child Name</th>
							<th>Class</th>
							<th>Date</th>
							<th>Status</th>
						  </tr>
						</thead>
						<tbody>
						<?php foreach ($child as $key=>$attendData): ?>
						  <tr>
							<td class="text-bold-500"><?=$key+1?></td>
							<td><?=ucwords($attendData["child_name"])?></td>
							<td><?=ucwords($attendData["class_name"])?></td>
							<td><?=$attendData["attendance_date"]?></td>
							<td class="text-bold-500">
									<?php if($attendData["status"]==0):?>
									<?="Absent"?>
									<?php elseif ($attendData["status"] == 1): ?>
									<?="Present"?>
									<?php elseif ($attendData["status"] == 2): ?>
									<?="Leave"?>
									<?php endif;?>
							</td>

						  </tr>
						  <?php endforeach;?>
						</tbody>
					  </table>
					</div>
				  </div>
				</div>
			  </div>
			</div>
				</div>
  <?php endforeach;?>

    </div>
	
    <!-- Latest Update Starts -->
    <div class="col-xl-4 col-md-6 col-12 dashboard-latest-update">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center pb-50">
          <h4 class="card-title">Latest Update</h4>
          <div class="dropdown">
            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button" id="dropdownMenuButtonSec"
              data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              2019
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonSec">
              <a class="dropdown-item" href="#">2019</a>
              <a class="dropdown-item" href="#">2018</a>
              <a class="dropdown-item" href="#">2017</a>
            </div>
          </div>
        </div>
        <div class="card-content">
          <div class="card-body p-0 pb-1">
            <ul class="list-group list-group-flush">
              <li
                class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                <div class="list-left d-flex">
                  <div class="list-icon mr-1">
                    <div class="avatar bg-rgba-primary m-0">
                      <div class="avatar-content">
                        <i class="bx bxs-zap text-primary font-size-base"></i>
                      </div>
                    </div>
                  </div>
                  <div class="list-content">
                    <span class="list-title">Total Products</span>
                    <small class="text-muted d-block">1.2k New Products</small>
                  </div>
                </div>
                <span>10.6k</span>
              </li>
              <li
                class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                <div class="list-left d-flex">
                  <div class="list-icon mr-1">
                    <div class="avatar bg-rgba-info m-0">
                      <div class="avatar-content">
                        <i class="bx bx-stats text-info font-size-base"></i>
                      </div>
                    </div>
                  </div>
                  <div class="list-content">
                    <span class="list-title">Total Sales</span>
                    <small class="text-muted d-block">39.4k New Sales</small>
                  </div>
                </div>
                <span>26M</span>
              </li>
              <li
                class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                <div class="list-left d-flex">
                  <div class="list-icon mr-1">
                    <div class="avatar bg-rgba-danger m-0">
                      <div class="avatar-content">
                        <i class="bx bx-credit-card text-danger font-size-base"></i>
                      </div>
                    </div>
                  </div>
                  <div class="list-content">
                    <span class="list-title">Total Revenue</span>
                    <small class="text-muted d-block">43.5k New Revenue</small>
                  </div>
                </div>
                <span>15.89M</span>
              </li>
              <li
                class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                <div class="list-left d-flex">
                  <div class="list-icon mr-1">
                    <div class="avatar bg-rgba-success m-0">
                      <div class="avatar-content">
                        <i class="bx bx-dollar text-success font-size-base"></i>
                      </div>
                    </div>
                  </div>
                  <div class="list-content">
                    <span class="list-title">Total Cost</span>
                    <small class="text-muted d-block">Total Expenses</small>
                  </div>
                </div>
                <span>1.25B</span>
              </li>
              <li
                class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                <div class="list-left d-flex">
                  <div class="list-icon mr-1">
                    <div class="avatar bg-rgba-primary m-0">
                      <div class="avatar-content">
                        <i class="bx bx-user text-primary font-size-base"></i>
                      </div>
                    </div>
                  </div>
                  <div class="list-content">
                    <span class="list-title">Total Users</span>
                    <small class="text-muted d-block">New Users</small>
                  </div>
                </div>
                <span>1.2k</span>
              </li>
              <li
                class="list-group-item list-group-item-action border-0 d-flex align-items-center justify-content-between">
                <div class="list-left d-flex">
                  <div class="list-icon mr-1">
                    <div class="avatar bg-rgba-danger m-0">
                      <div class="avatar-content">
                        <i class="bx bx-edit-alt text-danger font-size-base"></i>
                      </div>
                    </div>
                  </div>
                  <div class="list-content">
                    <span class="list-title">Total Visits</span>
                    <small class="text-muted d-block">New Visits</small>
                  </div>
                </div>
                <span>4.6k</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
    <!-- Earning Swiper Starts -->
    <div class="col-xl-4 col-md-6 col-12 dashboard-earning-swiper" id="widget-earnings">
      <div class="card">
        <div class="card-header border-bottom d-flex justify-content-between align-items-center">
          <h5 class="card-title"><i class="bx bx-dollar font-medium-5 align-middle"></i> <span class="align-middle">Earnings</span></h5>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-content">
          <div class="card-body py-1 px-0">
            <!-- earnings swiper starts -->
            <div class="widget-earnings-swiper swiper-container p-1">
              <div class="swiper-wrapper">
                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="repo-design">
                  <i class="bx bx-pyramid mr-1 font-weight-normal font-medium-4"></i>
                  <div class="swiper-text">
                    <div class="swiper-heading">Repo Design</div>
                    <small class="d-block">Gitlab</small>
                  </div>
                </div>
                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="laravel-temp">
                  <i class="bx bx-sitemap mr-50 font-large-1"></i>
                  <div class="swiper-text">
                    <div class="swiper-heading">Designer</div>
                    <small class="d-block">Women Clothes</small>
                  </div>
                </div>
                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="admin-theme">
                  <i class="bx bx-check-shield mr-50 font-large-1"></i>
                  <div class="swiper-text">
                    <div class="swiper-heading">Best Sellers</div>
                    <small class="d-block">Clothing</small>
                  </div>
                </div>
                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center" id="ux-devloper">
                  <i class="bx bx-devices mr-50 font-large-1"></i>
                  <div class="swiper-text">
                    <div class="swiper-heading">Admin Template</div>
                    <small class="d-block">Global Network</small>
                  </div>
                </div>
                <div class="swiper-slide rounded swiper-shadow py-50 px-2 d-flex align-items-center"
                  id="marketing-guide">
                  <i class="bx bx-book-bookmark mr-50 font-large-1"></i>
                  <div class="swiper-text">
                    <div class="swiper-heading">Marketing Guide</div>
                    <small class="d-block">Books</small>
                  </div>
                </div>
              </div>
            </div>
            <!-- earnings swiper ends -->
          </div>
        </div>
        <div class="main-wrapper-content">
          <div class="wrapper-content" data-earnings="repo-design">
            <div class="widget-earnings-scroll table-responsive">
              <table class="table table-borderless widget-earnings-width mb-0">
                <tbody>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-10.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Jerry Lter</h6>
                          <span class="font-small-2">Designer</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-info progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="80"
                          aria-valuemax="100" style="width:33%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-warning">- $280</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-11.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Pauly uez</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-success progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="10" aria-valuemin="80"
                          aria-valuemax="100" style="width:10%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-11.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lary Masey</h6>
                          <span class="font-small-2">Marketing</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-primary progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80"
                          aria-valuemax="100" style="width:15%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-12.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lula Taylor</h6>
                          <span class="font-small-2">Degigner</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-danger progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80"
                          aria-valuemax="100" style="width:35%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wrapper-content" data-earnings="laravel-temp">
            <div class="widget-earnings-scroll table-responsive">
              <table class="table table-borderless widget-earnings-width mb-0">
                <tbody>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-9.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Jesus Lter</h6>
                          <span class="font-small-2">Designer</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-info progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80"
                          aria-valuemax="100" style="width:28%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-info">- $280</span></td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-10.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Pauly Dez</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-success progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80"
                          aria-valuemax="100" style="width:90%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-success">+ $83</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-11.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lary Masey</h6>
                          <span class="font-small-2">Marketing</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-primary progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80"
                          aria-valuemax="100" style="width:15%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-12.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lula Taylor</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-danger progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80"
                          aria-valuemax="100" style="width:35%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-danger">- $310</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wrapper-content" data-earnings="admin-theme">
            <div class="widget-earnings-scroll table-responsive">
              <table class="table table-borderless widget-earnings-width mb-0">
                <tbody>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-25.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Mera Lter</h6>
                          <span class="font-small-2">Designer</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-info progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="52" aria-valuemin="80"
                          aria-valuemax="100" style="width:52%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-info">- $180</span></td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-15.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Pauly Dez</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-success progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80"
                          aria-valuemax="100" style="width:90%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-success">+ $553</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-11.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">jini mara</h6>
                          <span class="font-small-2">Marketing</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-primary progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80"
                          aria-valuemax="100" style="width:15%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-12.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lula Taylor</h6>
                          <span class="font-small-2">UX</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-danger progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80"
                          aria-valuemax="100" style="width:35%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-danger">- $150</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wrapper-content" data-earnings="ux-devloper">
            <div class="widget-earnings-scroll table-responsive">
              <table class="table table-borderless widget-earnings-width mb-0">
                <tbody>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-16.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Drako Lter</h6>
                          <span class="font-small-2">Designer</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-info progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="38" aria-valuemin="80"
                          aria-valuemax="100" style="width:38%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-danger">- $280</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-1.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Pauly Dez</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-success progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80"
                          aria-valuemax="100" style="width:90%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-11.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lary Masey</h6>
                          <span class="font-small-2">Marketing</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-primary progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80"
                          aria-valuemax="100" style="width:15%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-primary">+ $125</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-2.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lvia Taylor</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-danger progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="75" aria-valuemin="80"
                          aria-valuemax="100" style="width:75%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-danger">- $360</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="wrapper-content" data-earnings="marketing-guide">
            <div class="widget-earnings-scroll table-responsive">
              <table class="table table-borderless widget-earnings-width mb-0">
                <tbody>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-19.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">yono Lter</h6>
                          <span class="font-small-2">Designer</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-info progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="28" aria-valuemin="80"
                          aria-valuemax="100" style="width:28%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-primary">- $270</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-11.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Pauly Dez</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-success progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="90" aria-valuemin="80"
                          aria-valuemax="100" style="width:90%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-success">+ $853</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-12.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lary Masey</h6>
                          <span class="font-small-2">Marketing</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-primary progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="15" aria-valuemin="80"
                          aria-valuemax="100" style="width:15%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-primary">+ $225</span>
                    </td>
                  </tr>
                  <tr>
                    <td class="pr-75">
                      <div class="media align-items-center">
                        <a class="media-left mr-50" href="#">
                          <img src="<?=base_url("px-includes/app-assets/images/portrait/small/avatar-s-25.jpg")?>" alt="avatar"
                            class="rounded-circle" height="30" width="30">
                        </a>
                        <div class="media-body">
                          <h6 class="media-heading mb-0">Lula Taylor</h6>
                          <span class="font-small-2">Devloper</span>
                        </div>
                      </div>
                    </td>
                    <td class="px-0 w-25">
                      <div class="progress progress-bar-danger progress-sm mb-0">
                        <div class="progress-bar" role="progressbar" aria-valuenow="35" aria-valuemin="80"
                          aria-valuemax="100" style="width:35%;"></div>
                      </div>
                    </td>
                    <td class="text-center"><span class="badge badge-light-danger">- $350</span>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Marketing Campaigns Starts -->
    <div class="col-xl-8 col-12 dashboard-marketing-campaign">
      <div class="card marketing-campaigns">
        <div class="card-header d-flex justify-content-between align-items-center pb-1">
          <h4 class="card-title">Marketing campaigns</h4>
          <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
        </div>
        <div class="card-content">
          <div class="card-body pb-0">
            <div class="row">
              <div class="col-md-9 col-12">
                <div class="d-inline-block">
                  <!-- chart-1   -->
                  <div class="d-flex market-statistics-1">
                    <!-- chart-statistics-1 -->
                    <div id="donut-success-chart"></div>
                    <!-- data -->
                    <div class="statistics-data my-auto">
                      <div class="statistics">
                        <span class="font-medium-2 mr-50 text-bold-600">25,756</span><span
                          class="text-success">(+16.2%)</span>
                      </div>
                      <div class="statistics-date">
                        <i class="bx bx-radio-circle font-small-1 text-success mr-25"></i>
                        <small class="text-muted">May 12, 2019</small>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="d-inline-block">
                  <!-- chart-2 -->
                  <div class="d-flex mb-75 market-statistics-2">
                    <!-- chart statistics-2 -->
                    <div id="donut-danger-chart"></div>
                    <!-- data-2 -->
                    <div class="statistics-data my-auto">
                      <div class="statistics">
                        <span class="font-medium-2 mr-50 text-bold-600">5,352</span><span
                          class="text-danger">(-4.9%)</span>
                      </div>
                      <div class="statistics-date">
                        <i class="bx bx-radio-circle font-small-1 text-success mr-25"></i>
                        <small class="text-muted">Jul 26, 2019</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-3 col-12 text-md-right">
                <button class="btn btn-sm btn-primary glow mt-md-2 mb-1">View Report</button>
              </div>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- table start -->
          <table id="table-marketing-campaigns" class="table table-borderless table-marketing-campaigns mb-0">
            <thead>
              <tr>
                <th>Campaign</th>
                <th>Growth</th>
                <th>Charges</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="<?=base_url("px-includes/app-assets/images/icon/fs.png")?>" alt="card" height="24"
                    width="24">Fastrack Watches
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>30%</span>
                </td>
                <td class="py-1">$5,536</td>
                <td class="text-success py-1">Active</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu"></span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="<?=base_url("px-includes/app-assets/images/icon/puma.png")?>" alt="card" height="24"
                    width="24">Puma Shoes
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>15.5%</span>
                </td>
                <td class="py-1">$1,569</td>
                <td class="text-success py-1">Active</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="<?=base_url("px-includes/app-assets/images/icon/nike.png")?>" alt="card" height="24"
                    width="24">Nike Air Jordan
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>70.30%</span>
                </td>
                <td class="py-1">$23,859</td>
                <td class="text-danger py-1">Closed</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="<?=base_url("px-includes/app-assets/images/icon/one-plus.png")?>" alt="card"
                    height="24" width="24">Oneplus 7 pro
                </td>
                <td class="py-1">
                  <i class="bx bx-trending-up text-success align-middle mr-50"></i><span>10.4%</span>
                </td>
                <td class="py-1">$9,523</td>
                <td class="text-success py-1">Active</td>
                <td class="text-center py-1">
                  <div class="dropdown">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="py-1 line-ellipsis">
                  <img class="rounded-circle mr-1" src="<?=base_url("px-includes/app-assets/images/icon/google.png")?>" alt="card"
                    height="24" width="24">Google Pixel 4 xl
                </td>
                <td class="py-1"><i class="bx bx-trending-down text-danger align-middle mr-50"></i><span>-62.38%</span>
                </td>
                <td class="py-1">12,897</td>
                <td class="text-danger py-1">Closed</td>
                <td class="text-center py-1">
                  <div class="dropup">
                    <span
                      class="bx bx-dots-vertical-rounded font-medium-3 dropdown-toggle nav-hide-arrow cursor-pointer"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" role="menu">
                    </span>
                    <div class="dropdown-menu dropdown-menu-right">
                      <a class="dropdown-item" href="#"><i class="bx bx-edit-alt mr-1"></i> edit</a>
                      <a class="dropdown-item" href="#"><i class="bx bx-trash mr-1"></i> delete</a>
                    </div>
                  </div>
                </td>
              </tr>
            </tbody>
          </table>
          <!-- table ends -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Dashboard Ecommerce ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    </div>
    <!-- demo chat-->
   <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
	<?php $this->load->view("parent/inc/footer")?>

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
    <!-- END: Page JS-->

  </body>
  <!-- END: Body-->

</html>