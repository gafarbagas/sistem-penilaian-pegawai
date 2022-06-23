<ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    @auth
    @if (auth()->user()->level == 'Admin')
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url ('/')}}">
        <div class="sidebar-brand-icon">
            <i><img style="width:60px" src="/admin/img/BG-BIRU.png"/></i>
        </div>
        <div class="sidebar-brand-text mx-3">Head Trainer</div>
    </a>
    @elseif (auth()->user()->level == 'Visitor')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url ('/visitor')}}">
            <div class="sidebar-brand-icon">
                <i><img style="width:60px" src="/admin/img/BG-BIRU.png"/></i>
            </div>
            <div class="sidebar-brand-text mx-3">Visitor</div>
        </a>
    @elseif (auth()->user()->level == 'Trainer')
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url ('/training/icp')}}">
            <div class="sidebar-brand-icon">
                <i><img style="width:60px" src="/admin/img/BG-BIRU.png"/></i>
            </div>
            <div class="sidebar-brand-text mx-3">Trainer</div>
        </a>
    @endif
        
            <!-- Divider -->
            <hr class="sidebar-divider my-0">

        @if (auth()->user()->level == 'Admin')

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{Request::is('/')?' active':''}}">
                <a class="nav-link" href="{{url ('/')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item {{Request::is('trainer*')?' active':''}}">
                <a class="nav-link" href="{{url ('/trainer')}}">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Trainer</span></a>
            </li>
            <li class="nav-item {{Request::is('training*')?' active':''}}">
                <a class="nav-link" href="{{url ('/training/isp')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Training</span></a>
            </li>
            <li class="nav-item {{Request::is('employee*')?' active':''}}">
                <a class="nav-link" href="{{url ('/employee')}}">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Employee</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
                    aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Category</span>
                </a>
                <div id="collapsePages" class="collapse show" aria-labelledby="headingPages"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Category:</h6>
                        <a class="collapse-item nav-item {{Request::is('category*')?' active':''}}" href="{{url ('/category')}}">Product</a>
                        <a class="collapse-item nav-item {{Request::is('product*')?' active':''}}" href="{{url ('/product')}}">Jenis</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{Request::is('report*')?' active':''}}">
                <a class="nav-link" href="{{url ('/reportAdmin')}}">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Report</span></a>
            </li>

        @elseif(auth()->user()->level == 'Trainer')

            <li class="nav-item {{Request::is('training*')?' active':''}}">
                <a class="nav-link" href="{{url ('/training/isp')}}">
                    <i class="fas fa-fw fa-users"></i>
                    <span>Training</span></a>
            </li>

            <li class="nav-item {{Request::is('report*')?' active':''}}">
                <a class="nav-link" href="{{url ('/reportTrainer')}}">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Report</span></a>
            </li>


        @elseif(auth()->user()->level == 'Visitor')
            <li class="nav-item {{Request::is('visitor')?' active':''}}">
                <a class="nav-link" href="{{url ('/visitor')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

        @endif
    @endauth

    



    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>