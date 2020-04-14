<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Web Test | Register</title>
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

                    <div class="mb-1">
                        <p class="text-muted text-center">Create your account now.</p>

                        <form class="form-horizontal m-t-30" action="\registerAction" method="POST">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="username">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="Enter name" required>
                            </div>

                            <div class="form-group">
                                <label for="useremail">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Enter email" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" name="password" placeholder="Enter password" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="confirm-password">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Enter password" required>
                            </div>

                            <div class="form-group row m-t-20">
                                <div class="col-12 text-right">
                                    <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>

            <div class="m-t-40 text-center">
                <p class="text-muted">Already have an account ? <a href="/login" class="text-white"> Login </a> </p>
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