<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Web Test | Login</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Themesbrand" name="author" />
        <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico')}}">

        <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
        <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">
    </head>

    <body>

        <!-- Background -->
        <div class="account-pages"></div>
        <!-- Begin page -->
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center m-0">
                        <a href="index.html" class="logo logo-admin"><img src="{{ asset('admin/assets/images/logo.png')}}" height="30" alt="logo"></a>
                    </h3>

                    <div class="p-3">
                        <h4 class="text-muted font-18 m-b-5 text-center">Welcome Back !</h4>
                        <p class="text-muted text-center">Sign in to continue to Agroxa.</p>

                        <form class="form-horizontal m-t-30" action="/loginAction" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-white-50">Don't have an account ? <a href="/register" class="text-white"> Signup Now </a> </p>
                <p class="text-muted">© 2018 Agroxa. Crafted with <i class="mdi mdi-heart text-primary"></i> by Themesbrand</p>
            </div>

        </div>

        <!-- END wrapper -->
            

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('admin/assets/js/waves.min.js')}}"></script>

        <script src="{{ asset('admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.js')}}"></script>

    </body>

</html>