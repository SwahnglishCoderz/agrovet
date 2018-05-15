<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/img/avatar.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Sentinel::getUser()->first_name }} {{Sentinel::getUser()->last_name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
              <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
              </button>
            </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="/"><i class="fa fa-home"></i> <span>Home</span></a></li>
            <li class="treeview">
                <a href="#"><i class="fa fa-gear"></i> <span>Manufacturer</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/manufacturer/create"><i class="fa fa-circle"></i> Add Manufacturer</a></li>
                    <li><a href="/manufacturer/view"><i class="fa fa-circle"></i> View Manufacturers</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-info"></i> <span>Product Types</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/type/create"><i class="fa fa-circle"></i> Add Type</a></li>
                    <li><a href="/type/view"><i class="fa fa-circle"></i> View Types</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-shopping-basket"></i> <span>Product</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/product/create"><i class="fa fa-circle"></i> Add Product</a></li>
                    <li><a href="/product/view"><i class="fa fa-circle"></i> View Product</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-bar-chart"></i> <span>Stock</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/stock/create"><i class="fa fa-circle"></i> Add Stock</a></li>
                    <li><a href="/stock/view"><i class="fa fa-circle"></i> View Stock</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-dollar"></i> <span>Prices</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/price/create"><i class="fa fa-circle"></i> Add Price</a></li>
                    <li><a href="/price/view"><i class="fa fa-circle"></i> View Prices</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-pie-chart"></i> <span>Sales</span>
                    <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/sale/create"><i class="fa fa-circle"></i> Add Sale</a></li>
                    <li><a href="/sale/view"><i class="fa fa-circle"></i> View Sales</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>