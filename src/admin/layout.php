<script>
    NProgress.configure({
        showSpinner: false
    });
    NProgress.start();
</script>

<div class="mobile-sticky-body-overlay"></div>

<div class="wrapper">

    <!--
          ====================================
          ——— LEFT SIDEBAR WITH FOOTER
          =====================================
        -->
    <aside class="left-sidebar bg-sidebar">
        <div id="sidebar" class="sidebar sidebar-with-footer">
            <!-- Aplication Brand -->
            <div class="app-brand">
                <a href="/admin/index.php">
                    <svg class="brand-icon" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid" width="30" height="33" viewBox="0 0 30 33">
                        <g fill="none" fill-rule="evenodd">
                            <path class="logo-fill-blue" fill="#7DBCFF" d="M0 4v25l8 4V0zM22 4v25l8 4V0z" />
                            <path class="logo-fill-white" fill="#FFF" d="M11 4v25l8 4V0z" />
                        </g>
                    </svg>
                    <span class="brand-name">Sciences University</span>
                </a>
            </div>
            <!-- begin sidebar scrollbar -->
            <div class="sidebar-scrollbar">

                <!-- sidebar menu -->
                <ul class="nav sidebar-inner" id="sidebar-menu">
                    <?php if($_SESSION['role'] == 'admin'): ?>
                        <li class="<?= $_SERVER['PHP_SELF'] == '/admin/users/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/users/index.php?page=1">
                            <i class="mdi mdi-account-group"></i>
                            <span class="nav-text">Users</span> <b class="caret"></b>
                        </a>

                    </li>
                    <?php endif; ?>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/news/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/news?page=1">
                            <i class="mdi mdi-newspaper"></i>
                            <span class="nav-text">News</span> <b class="caret"></b>
                        </a>

                    </li>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/events/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/events?page=1">
                            <i class="mdi mdi-view-dashboard-outline"></i>
                            <span class="nav-text">Events</span> <b class="caret"></b>
                        </a>

                    </li>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/sliders/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/sliders/index.php?page=1">
                            <i class="mdi mdi-page-next-outline"></i>
                            <span class="nav-text">Hero Slider</span> <b class="caret"></b>
                        </a>

                    </li>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/nav_links/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/nav_links/index.php?page=1">
                            <i class="mdi mdi-link-variant"></i>
                            <span class="nav-text">Navbar Links</span> <b class="caret"></b>
                        </a>

                    </li>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/social_links/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/social_links/index.php?page=1">
                            <i class="mdi mdi-link-variant"></i>
                            <span class="nav-text">Social Links</span> <b class="caret"></b>
                        </a>

                    </li>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/messages/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/messages/index.php?page=1">
                            <i class="mdi mdi-message-outline"></i>
                            <span class="nav-text">Messages</span> <b class="caret"></b>
                        </a>

                    </li>
                    <li class="<?= $_SERVER['PHP_SELF'] == '/admin/meta_contents/index.php' ? 'active' : '' ?>">
                        <a class="sidenav-item-link" href="/admin/meta_contents/index.php?page=1">
                            <i class="mdi mdi-settings-outline"></i>
                            <span class="nav-text">Site Settings</span> <b class="caret"></b>
                        </a>
                    </li>
                </ul>

            </div>

            <hr class="separator" />

            <!-- <div class="sidebar-footer">
                <div class="sidebar-footer-content">
                    <h6 class="text-uppercase">
                        Cpu Uses <span class="float-right">40%</span>
                    </h6>
                    <div class="progress progress-xs">
                        <div class="progress-bar active" style="width: 40%;" role="progressbar"></div>
                    </div>
                    <h6 class="text-uppercase">
                        Memory Uses <span class="float-right">65%</span>
                    </h6>
                    <div class="progress progress-xs">
                        <div class="progress-bar progress-bar-warning" style="width: 65%;" role="progressbar"></div>
                    </div>
                </div>
            </div> -->
        </div>
    </aside>

    <div class="page-wrapper">
        <!-- Header -->
        <header class="main-header " id="header">
            <nav class="navbar navbar-static-top navbar-expand-lg justify-content-between">
                <!-- Sidebar toggle button -->
                <button id="sidebar-toggler" class="sidebar-toggle">
                    <span class="sr-only">Toggle navigation</span>
                </button>
                <!-- search form -->
                

                <div class="navbar-right ">
                    <ul class="nav navbar-nav">
                        
                        
                        <!-- User Account -->
                        <li class="dropdown user-menu">
                            <button href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                <?php if ($media) : ?>
                                    <img src="/images/entities/<?= $media['id'] ?>/<?= $media['name'] ?>" class="user-image" alt="User Image" />
                                <?php else : ?>
                                    <img src="/images/user.png" class="user-image" alt="User Image" />
                                <?php endif ?> <span class="d-none d-lg-inline-block"> <?= $_SESSION['name'] ?></span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <!-- User image -->
                                <li class="dropdown-header">
                                    <?php if ($media) : ?>
                                        <img src="/images/entities/<?= $media['id'] ?>/<?= $media['name'] ?>" class="user-image" alt="User Image" />
                                    <?php else : ?>
                                        <img src="/images/user.png" class="user-image" alt="User Image" />
                                    <?php endif ?> <div class="d-inline-block">
                                        <?= $_SESSION['name'] ?> <small class="pt-1"><?= $_SESSION['email'] ?></small>
                                    </div>
                                </li>

                                
                                <li>
                                <a href="/admin/users/view.php?id=<?= $_SESSION['user_id'] ?>">
                                     <i class="mdi mdi-settings"></i> Account Setting </a>
                                </li>

                                <li class="dropdown-footer">
                                    <a href="/admin/users/logout.php"> <i class="mdi mdi-logout"></i> Log Out </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>


        </header>

        <!--         
    </div>
</div> -->