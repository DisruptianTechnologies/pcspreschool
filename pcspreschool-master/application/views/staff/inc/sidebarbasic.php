    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
      <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
          <li class="nav-item mr-auto"><a class="navbar-brand" href="<?=base_url("staff/home")?>">
              <div class="brand-logo"><img class="logo" src="<?=base_url($setting['logo'])?>"/></div>
              <h2 class="brand-text mb-0"><?=$setting['name']?></h2></a></li>
          <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="bx bx-x d-block d-xl-none font-medium-4 primary toggle-icon"></i></a></li>
        </ul>
      </div>
      <div class="shadow-bottom"></div>
      <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation" data-icon-style="">
          <li class=" nav-item"><a href="<?=base_url("staff/home")?>"><i class='bx bx-home-alt'></i><span class="menu-title" data-i18n="Home"><span class="text-bold-500">Home</span></span></a>
          </li>
		  
		  
		  <li class="nav-item has-sub"><a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="Classes">Meal Plan</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a href="<?=base_url("staff/mealplan")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="View Announcement">View Meal Plan</span></a>
              </li>
              <li class="is-shown"><a href="<?=base_url("staff/addmealplan")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Add Announcement">Add Meal Plan</span></a>
              </li>
            </ul>
          </li>
		  <li class="nav-item has-sub"><a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="Classes">Fees</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a href="<?=base_url("staff/fees")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="View Announcement">View Class Fees</span></a>
              </li>
              <li class="is-shown"><a href="<?=base_url("staff/viewfeespayment")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Add Announcement">Check Fee Payments</span></a>
              </li>
            </ul>
          </li>
		  
		  <li class="nav-item has-sub"><a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="Staff">Gallery</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a href="<?=base_url("staff/gallery")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="View Gallery">View Gallery</span></a>
              </li>
              <li class="is-shown"><a href="<?=base_url("staff/addgallery")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Add Gallery">Add Gallery</span></a>
              </li>
            </ul>
          </li>
		  
		<li class="nav-item has-sub"><a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="Classes">Classes</span></a>
            <ul class="menu-content" style="">
			<?php foreach($classes as $class):?>
              <li class="is-shown"><a href="<?=base_url("staff/selectedclass/").$class['id']?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="<?=ucfirst($class['name'])?>"><?=ucfirst($class['name'])?></span></a>
              </li>
			  <?php endforeach;?>

            </ul>
          </li>
		  
		  <li class="nav-item has-sub"><a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="Classes">Announcement</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a href="<?=base_url("staff/announcement")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="View Announcement">View Announcement</span></a>
              </li>
            </ul>
          </li>
		  <li class="nav-item has-sub"><a href="#"><i class="bx bx-file"></i><span class="menu-title" data-i18n="Calendar">Calendar</span></a>
            <ul class="menu-content" style="">
              <li class="is-shown"><a href="<?=base_url("staff/viewpreschoolactivity")?>"><i class="bx bx-right-arrow-alt"></i><span class="menu-item" data-i18n="Add Child">View Activity</span></a>
              </li>
            </ul>
          </li>
          <li class=" navigation-header"><span>Settings</span>
          </li>

        </ul>
      </div>
    </div>
  