<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">
            <li class="sidebar-search">
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
                </div>
                <!-- /input-group -->
            </li>
            <li>
                <a href="{{route('/')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>
            <li>
                <a href="{{route('user')}}"><i class="fa fa-user fa-fw"></i> Users</span></a>
            </li>
            <li>
                <a href="{{route('student')}}"><i class="fa fa-table fa-fw"></i> Student</a>
            </li>
            <li>
                <a href="{{route('book')}}"><i class="fa fa-book fa-fw"></i> Book</a>
            </li>
            <li>
                <a href="{{route('issue')}}"><i class="fa fa-wrench fa-fw"></i> Issue Book</span></a>
            </li>
            <li>
                <a href="{{route('report')}}"><i class="fa fa-sitemap fa-fw"></i> Reports</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-paw fa-fw"></i> More<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('faculty')}}">Faculty</a>
                    </li>
                    <li>
                        <a href="{{route('role')}}">Role</a>
                    </li>
                </ul>
                <!-- /.nav-second-level -->
            </li>
        </ul>
    </div>
    <!-- /.sidebar-collapse -->
</div>
<!-- /.navbar-static-side -->
</nav>