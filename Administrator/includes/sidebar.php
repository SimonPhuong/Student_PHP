<div class="sidebar-header">
    <div class="sidebar-logo">
        <a href="dashboard.php" class="img-tag sidebar_logo">
            <div class="full-logo">
                <h2 style="color:#fff">Loc Ninh <span style="color:#7fc1fc">HS</span></h2>
            </div>
            <div class="half-logo">
                <h2 style="color:#fff">LN<span style="color:#7fc1fc">H</span></h2>
            </div>
        </a>
    </div>
    <button class="half-expand-toggle sidebar-toggle">
        <img src="https://hrm.zen-s.com/public/assets/images/icons/collapse-arrow.svg" alt="">
    </button>
    <button class="close-toggle sidebar-toggle">
        <img src="https://hrm.zen-s.com/public/assets/images/icons/collapse-arrow.svg" alt="">
    </button>
</div>

<?php
$currentUrl = basename($_SERVER['REQUEST_URI']);
?>
<!--- Sidemenu -->
<div class="sidebar-menu">
    <div class="sidebar-menu-section">
        <ul class="sidebar-dropdown-menu parent-menu-list">



            <li class="sidebar-menu-item">
                <a href="dashboard.php"
                    class="parent-item-content <?php echo ($currentUrl == 'dashboard.php') ? 'active' : ''; ?>">
                    <i class="las la-home "></i>
                    <span class="on-half-expanded">Dashboard</span>
                </a>
            </li>


            <li class="sidebar-menu-item">
                <a href="javascript:void(0)"
                    class="parent-item-content has-arrow <?php echo in_array($currentUrl, ['student.php', 'create.student.php']) ? 'active' : 'in-active'; ?>">
                    <i class="las la-user-alt"></i>
                    <span class="on-half-expanded">
                        Students
                    </span>
                </a>
                <ul class="child-menu-list mm-collapse <?php echo in_array($currentUrl, ['student.php', 'create.student.php']) ? 'mm-show' : ''; ?>"
                    style="">
                    <li class="nav-item <?php echo ($currentUrl == 'student.php') ? 'active' : 'in-active'; ?>">
                        <a href="student.php">
                            <span>Student List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'create.student.php') ? 'active' : ''; ?>">
                        <a href="create.student.php" class=" ">
                            <span>Student Add</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-item">
                <a href="javascript:void(0)"
                    class="parent-item-content has-arrow <?php echo in_array($currentUrl, ['teachers.php', 'create.teacher.php','assign-teaching.php']) ? 'active' : 'in-active'; ?>">
                    <i class="las la-chalkboard-teacher"></i>
                    <span class="on-half-expanded">
                        Teachers
                    </span>
                </a>
                <ul class="child-menu-list mm-collapse <?php echo in_array($currentUrl, ['teachers.php', 'create.teacher.php','assign-teaching.php']) ? 'mm-show' : ''; ?>"
                    style="">
                    <li class="nav-item <?php echo ($currentUrl == 'teachers.php') ? 'active' : 'in-active'; ?>">
                        <a href="teachers.php" class=" ">
                            <span>Teacher List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'create.teacher.php') ? 'active' : 'in-active'; ?>">
                        <a href="create.teacher.php" class=" ">
                            <span>Teacher Add</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'assign-teaching.php') ? 'active' : 'in-active'; ?>">
                        <a href="assign-teaching.php" class=" ">
                            <span>Assign Teaching</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-item">
                <a href="javascript:void(0)"
                    class="parent-item-content has-arrow <?php echo in_array($currentUrl, ['news.php', 'create.news.php','categories.php']) ? 'active' : 'in-active'; ?>">
                    <i class="las la-newspaper"></i>
                    <span class="on-half-expanded">
                        News
                    </span>
                </a>
                <ul class="child-menu-list mm-collapse <?php echo in_array($currentUrl, ['news.php', 'create.news.php','categories.php']) ? 'mm-show' : ''; ?>"
                    style="">
                    <li class="nav-item <?php echo ($currentUrl == 'news.php') ? 'active' : 'in-active'; ?>">
                        <a href="news.php" class=" ">
                            <span>News List</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'create.news.php') ? 'active' : 'in-active'; ?>">
                        <a href="create.news.php" class=" ">
                            <span>News Add</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'categoires.php') ? 'active' : 'in-active'; ?>">
                        <a href="categories.php" class=" ">
                            <span>Category</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-item">
                <a href="javascript:void(0)"
                    class="parent-item-content has-arrow <?php echo in_array($currentUrl, ['subjects.php', 'grades.php','classrooms.php']) ? 'active' : 'in-active'; ?>">
                    <i class="las la-tools"></i>
                    <span class="on-half-expanded">
                        School Systems
                    </span>
                </a>
                <ul class="child-menu-list mm-collapse <?php echo in_array($currentUrl, ['subjects.php', 'grades.php','classrooms.php']) ? 'mm-show' : ''; ?>"
                    style="">
                    <li class="nav-item <?php echo ($currentUrl == 'subjects.php') ? 'active' : 'in-active'; ?>">
                        <a href="subjects.php" class="">
                            <span class="on-half-expanded">Subjects</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'grades.php') ? 'active' : 'in-active'; ?>">
                        <a href="grades.php" class="">

                            <span class="on-half-expanded">Grades</span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo ($currentUrl == 'classrooms.php') ? 'active' : 'in-active'; ?>">
                        <a href="classrooms.php" class="">

                            <span class="on-half-expanded">Classrooms</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-menu-item">
                <a href="../../Admin/view/timetable.php" class="parent-item-content ">
                    <i class="las la-calendar-check"></i>
                    <span>Schedule</span> </a>
            </li>

            <li class="sidebar-menu-item">
                <a href="feedback.php"
                    class="parent-item-content <?php echo ($currentUrl == 'feedback.php') ? 'active' : 'in-active'; ?>">
                    <i class="las la-comment"></i>
                    <span class="on-half-expanded">Feedback</span>
                </a>
            </li>

            <li class="sidebar-menu-item">
                <a href="logout.php" class="parent-item-content">
                    <i class="las la-sign-out-alt"></i>
                    <span class="on-half-expanded">
                        Logout
                    </span>
                </a>
            </li>

        </ul>
    </div>
</div>