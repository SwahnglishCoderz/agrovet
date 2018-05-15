<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <img src="/img/avatar.png" class="user-image" alt="User Image">
        <span class="hidden-xs">{{ Sentinel::getUser()->first_name }} {{Sentinel::getUser()->last_name}}</span>
    </a>
    <ul class="dropdown-menu">
        <!-- User image -->
        <li class="user-header">
            <img src="/img/avatar.png" class="img-circle" alt="User Image">

            <p>
                {{ Sentinel::getUser()->first_name }} {{Sentinel::getUser()->last_name}} - {{Sentinel::getUser()->roles()->first()->name}}
                <small>Member since {{Sentinel::getUser()->created_at}}</small>
            </p>
        </li>
        <!-- Menu Body -->
        {{--<li class="user-body">
            <div class="row">
                <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                </div>
                <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                </div>
            </div>
            <!-- /.row -->
        </li>--}}
        <!-- Menu Footer-->
        <li class="user-footer">
            <div class="pull-left">
                <a href="#" class="btn btn-default btn-flat">Profile</a>
            </div>
            <div class="pull-right">
                <form method="POST" action="/logout" id="logout-form">
                    {{ csrf_field() }}
                    <a href="#" class="btn btn-default btn-flat" onclick="document.getElementById('logout-form').submit()">Sign Out</a>
                </form>
            </div>
        </li>
    </ul>
</li>