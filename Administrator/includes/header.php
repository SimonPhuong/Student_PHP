<div class="header-search"></div>

<button class="close-toggle sidebar-toggle">
    <i class="fa fa-toggle-off" aria-hidden="true"></i>
</button>

<div class="header-controls">
    <div class="header-control-item">
        <div class="item-content dropdown">
            <a class="nav-link __clock_nav mt-0" href="javascript:void(0)">
                <span class="clock company_name_clock fs-16" id="clock" onload="currentTime()"></span>
            </a>
        </div>
    </div>


    <div class="header-control-item d-none d-lg-block">
        <div class="item-content">
            <button class="mt-0 noti-color sm-btn-with-radius" type="button" id="topbar_notifications"
                data-bs-toggle="dropdown" aria-expanded="false">
                <span class="noti-btn" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Thông báo"> <i
                        class="las la-bell"></i></span>

            </button>

            <div class="dropdown-menu dropdown-menu-end topbar-dropdown-menu ot-card pv-32 ph-16 topbar_notifications"
                aria-labelledby="topbar_notifications">
                <div class="topbar-dropdown-header">
                    <h1>Thông báo</h1>
                </div>
                <div class="topbar-dropdown-content">
                    <p>Không tìm thấy thông báo nào.</p>
                    <div class="d-flex align-items-center">
                        <a class="topbar-dropdown-footer ot-btn-primary w-100 " href="#">
                            Xem tất cả thông báo
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-control-item">
        <div class="item-content">
            <div class="profile-navigate mt-0 cursor-pointer" id="profile_expand" data-bs-toggle="dropdown"
                role="navigation" aria-expanded="false">
                <div class="profile-info md-none">
                    <h6>Administrator</h6>
                    <p> Name</p>
                </div>
                <div class="profile-photo">
                    <img src="./assets/images/users/avatar-1.jpg" alt="profile">
                </div>
            </div>
            <div class="dropdown-menu dropdown-menu-end profile-expand-dropdown top-navbar-dropdown-menu ot-card pa-0"
                aria-labelledby="profile_expand" style="">
                <div class="profile-expand-container">
                    <div class="profile-expand-list d-flex flex-column">
                        <a class="profile-expand-item profile-border" href="#">
                            <span>My profile</span>
                        </a>
                        <a class="profile-expand-item" href="#" data-bs-toggle="tooltip" data-bs-placement="right"
                            data-bs-title="Thông báo">
                            <span><i class="las la-bell"></i>Notification</span>
                        </a>
                        <a class="profile-expand-item profile-border" href="#">
                            <span><i class="las la-cog"></i> Settings</span>
                        </a>
                        <a class="profile-expand-item " href="">
                            <span>Log out</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>