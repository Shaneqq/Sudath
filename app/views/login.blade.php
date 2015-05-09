<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Login Form</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        {{HTML::style('assets/bootstrap/css/bootstrap.min.login.css')}}
        {{HTML::style('assets/bootstrap/css/bootstrap-responsive.min.css')}}
        {{HTML::style('assets/plugins/font-awesome/css/font-awesome.min.css')}}
        {{HTML::style('assets/dist/css/style-metro.css')}}
        {{HTML::style('assets/dist/css/style.css')}}
        {{HTML::style('assets/dist/css/style-responsive.css')}}
        {{HTML::style('assets/dist/css/default.css')}}
        {{HTML::style('assets/dist/css/login-soft.css')}}

        <link rel="shortcut icon" href="favicon.ico" />
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="login">
        <!-- BEGIN LOGO -->

        
        <div class="logo">
            <!-- PUT YOUR LOGO HERE -->
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
            <form class="form-vertical login-form" action="{{URL::route('account-sign-in-post')}}" method="post">
                <h3 class="form-title">Login to your account</h3>
                <div class="alert alert-error hide">
                    <button class="close" data-dismiss="alert"></button>
                    <span>Enter any username and password.</span>
                </div>
                
                @if(Session::has('incorrectpassword'))
                <p>{{'errorr'}}</p>
                @endif
                <div class="control-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    <label class="control-label visible-ie8 visible-ie9">Username</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-user"></i>
                            <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label visible-ie8 visible-ie9">Password</label>
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-lock"></i>
                            <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="Password" name="password"/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    &nbsp&nbsp&nbsp&nbsp
                    <label class="checkbox">
                        <input type="checkbox" name="remember" value="1"/> Remember me
                    </label>
                    <button type="submit" class="btn blue pull-right">
                        Login <i class="m-icon-swapright m-icon-white"></i>
                    </button>            
                </div>
                <div class="forget-password">
                    <h4>Forgot your password ?</h4>
                    <p>
                        no worries, click <a href="javascript:;"  id="forget-password">here</a>
                        to reset your password.
                    </p>
                </div>
                {{Form::token()}}
            </form>
            <!-- END LOGIN FORM -->        
            <!-- BEGIN FORGOT PASSWORD FORM -->
            <form class="form-vertical forget-form" action="index.html" method="post">
                <h3 >Forget Password ?</h3>
                <p>Enter your e-mail address below to reset your password.</p>
                <div class="control-group">
                    <div class="controls">
                        <div class="input-icon left">
                            <i class="icon-envelope"></i>
                            <input class="m-wrap placeholder-no-fix" type="text" placeholder="Email" autocomplete="off" name="email" />
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn">
                        <i class="m-icon-swapleft"></i> Back
                    </button>
                    <button type="submit" class="btn blue pull-right">
                        Submit <i class="m-icon-swapright m-icon-white"></i>
                    </button>            
                </div>
            </form>
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <!-- END LOGIN -->
        <!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
   
         {{HTML::script('assets/dist/js/app2.js')}}
        {{HTML::script('assets/dist/js/login-soft.js')}}
     {{HTML::script('assets/plugins/jquery-1.10.1.min.js')}}
        {{HTML::script('assets/plugins/jQueryUI/jquery-ui-1.10.1.custom.min.js')}}
        
        {{HTML::script('assets/plugins/jquery.validate.min.js')}}
        {{HTML::script('assets/plugins/jquery.backstretch.min.js')}}
        {{HTML::script('assets/plugins/select2.min.js')}}
        {{HTML::script('assets/bootstrap/js/bootstrap.min.js')}}
       

        <script>
            jQuery(document).ready(function () {
                App.init();
                Login.init();
            });
        </script>
        <!-- END JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>