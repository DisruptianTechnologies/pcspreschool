   <div class="header-navbar-shadow"></div>
    <nav class="header-navbar main-header-navbar navbar-expand-lg navbar navbar-with-menu fixed-top ">
      <div class="navbar-wrapper">
        <div class="navbar-container content">
          <div class="navbar-collapse" id="navbar-mobile">
            <div class="mr-auto float-left bookmark-wrapper d-flex align-items-center">
              <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu d-xl-none mr-auto"><a class="nav-link nav-menu-main menu-toggle hidden-xs" href="#"><i class="ficon bx bx-menu"></i></a></li>
              </ul>
            </div>
            <ul class="nav navbar-nav float-right">

              <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-expand"><i class="ficon bx bx-fullscreen"></i></a></li>

              <li class="dropdown dropdown-user nav-item"><a class="dropdown-toggle nav-link dropdown-user-link" href="#" data-toggle="dropdown">
                  <div class="user-nav d-sm-flex d-none"><span class="user-name"><?=$this->session->userdata("staff_name")?></span><span class="user-status text-muted">Available</span></div><span><img class="round" src="<?=base_url($this->session->userdata("picture"))?>" alt="avatar" height="40" width="40"></span></a>
                <div class="dropdown-menu dropdown-menu-right pb-0"><a class="dropdown-item" href="<?=base_url("superadmin/editself/").$this->session->userdata("admin_id")?>"><i class="bx bx-user mr-50"></i> Edit Profile</a>
                  <div class="dropdown-divider mb-0"></div><a class="dropdown-item" href="<?=base_url("superadmin/logout")?>"><i class="bx bx-power-off mr-50"></i> Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  