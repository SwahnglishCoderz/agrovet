<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            @yield('header')
        </h1>
        <ol class="breadcrumb">
            @yield('navigate')
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!--------------------------
          | Your Page Content Here |
          -------------------------->
        @yield('content')

    </section>
    <!-- /.content -->
</div>