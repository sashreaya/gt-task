
<!-- Left Sidebar End -->
<header id="page-topbar" class="ishorizontal-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <button type="button" class="btn btn-sm px-3 font-size-16 d-lg-none header-item" data-bs-toggle="collapse" data-bs-target="#topnav-menu-content">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <div class="topnav">
                <nav class="navbar navbar-light navbar-expand-lg topnav-menu">

                    <div class="collapse navbar-collapse" id="topnav-menu-content">
                        <ul class="navbar-nav">
                            
                            <li class="nav-item">
                                <a class="nav-link dropdown-toggle arrow-none" <?php if(Auth::user()->id==2): ?>href="<?php echo e(url('/home')); ?>" <?php endif; ?> id="topnav-dashboard" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class='bx bx-tachometer'></i>
                                    <span data-key="t-dashboards">Dashboard</span>
                                </a>
                            </li>
                           
                            <li class="nav-item dropdown">
                                <a class="nav-link arrow-none" <?php if(Auth::user()->id==1): ?> href="<?php echo e(url('admin/index')); ?>" <?php endif; ?> id="topnav-pages" role="button">
                                    <i class='bx bx-grid-alt'></i>
                                    <span data-key="t-apps">Admin</span>
                                </a>
                                
                            </li>
                            
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
            <a href="<?php echo e(route('logout')); ?>"
            onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class='bx bx-log-out text-muted font-size-18 align-middle me-1'></i>
                <span class="align-middle">Logout</span>
            </a>
            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                <?php echo csrf_field(); ?>
            </form>
    </div>
</div>
</header>
<?php /**PATH D:\xampp\htdocs\gt-task\resources\views/layouts/header.blade.php ENDPATH**/ ?>