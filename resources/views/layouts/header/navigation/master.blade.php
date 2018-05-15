<!-- Header Navbar: style can be found in header.less -->
<nav class="navbar navbar-static-top">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            {{--<!-- Messages: style can be found in dropdown.less-->
            @include('layouts.header.navigation.messages-menu')
            <!-- Notifications: style can be found in dropdown.less -->
            @include('layouts.header.navigation.notifications-menu')
            <!-- Tasks: style can be found in dropdown.less -->
            @include('layouts.header.navigation.tasks-menu')--}}
            <!-- User Account: style can be found in dropdown.less -->
            @include('layouts.header.navigation.user-menu')
            <!-- Control Sidebar Toggle Button -->
            <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
    </div>

</nav>