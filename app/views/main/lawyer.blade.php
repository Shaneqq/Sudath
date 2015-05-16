<!DOCTYPE html>
<html>
   
    <head>
        <meta charset="UTF-8">
         
        <title>Lawyer | Page1</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        {{HTML::style('assets/bootstrap/css/bootstrap.min.css')}}
        {{HTML::style('https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css')}}
        {{HTML::style('http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css')}}
        {{HTML::style('assets/dist/css/AdminLTE.min.css')}}
        {{HTML::style('assets/dist/css/skins/_all-skins.min.css')}}


    </head>
    <!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
    <body class="skin-blue layout-top-nav">
        <div class="wrapper">

            <header class="main-header">               
                <nav class="navbar navbar-static-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a href="../../index2.html" class="navbar-brand"><b>Lawyer</b></a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="navbar-collapse">
                            <ul class="nav navbar-nav">
                                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                                <li><a href="#">Link</a></li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
                                        <li><a href="#">Action</a></li>
                                        <li><a href="#">Another action</a></li>
                                        <li><a href="#">Something else here</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">Separated link</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">One more separated link</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="navbar-form navbar-left" role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
                                </div>
                            </form>

                            <div class="navbar-custom-menu">
                                <ul class="nav navbar-nav">
                                    <!-- User Account: style can be found in dropdown.less -->
                                    <li class="dropdown user user-menu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                            <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image"/>
                                            <span class="hidden-xs">{{Auth::user()->get()->username}}</span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <!-- User image -->
                                            <li class="user-header">
                                                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
                                                <p>
                                                    Alexander Pierce - Web Developer
                                                    <small>Member since Nov. 2012</small>
                                                </p>
                                            </li>
                                            <!-- Menu Body -->
                                            <li class="user-body">
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Followers</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Sales</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Friends</a>
                                                </div>
                                            </li>
                                            <!-- Menu Footer-->
                                            <li class="user-footer">
                                                <div class="pull-left">
                                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                                </div>
                                                <div class="pull-right">
                                                    <a href="{{URL::route('account-sign-out')}}" class="btn btn-default btn-flat">Sign out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </header>
            <!-- Full Width Column -->
            <div class="content-wrapper">
                <div class="container-fluid">
                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <h1>
                            Page1
                            <small>Page1</small>
                        </h1>
                    </section>

                    <!-- Main content -->
                    <section class="content">


                    </section><!-- /.content -->


                </div><!-- /.container -->
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                <div class="container-fluid">
                    <div class="pull-right hidden-xs">
                        <b>Version</b> 2.0
                    </div>
                    <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
                </div><!-- /.container -->
            </footer>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        {{HTML::script('assets/plugins/jQuery/jQuery-2.1.3.min.js')}}
        {{HTML::script('assets/bootstrap/js/bootstrap.min.js')}}
        <!-- Bootstrap 3.3.2 JS -->
        {{HTML::script('assets/plugins/slimScroll/jquery.slimScroll.min.js')}}
        <!-- SlimScroll -->
        {{HTML::script('assets/plugins/fastclick/fastclick.min.js')}}
        <!-- FastClick -->
        {{HTML::script('assets/dist/js/app.min.js')}}
        <!-- AdminLTE App -->
        {{HTML::script('assets/dist/js/demo.js')}}
        <!-- AdminLTE for demo purposes -->
  
    </body>
</html>
