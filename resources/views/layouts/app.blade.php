<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Web Test | Home</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Themesbrand" name="author" />
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico')}}">

    <link rel="stylesheet" href="{{ asset('admin/assets/plugins/morris/morris.css')}}">

    <!-- DataTables -->
    <link href="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/metismenu.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/icons.css')}}" rel="stylesheet" type="text/css">
    <link href="{{ asset('admin/assets/css/style.css')}}" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
        $client = new \GuzzleHttp\Client();
        $req = $client->request('GET','http://backend-dev.cakra-tech.co.id/api/user',[
            'headers' =>[
                'Authorization' => 'Bearer ' . Session::get('token'),
                'Accept' 		=> 'application/json'
            ]
        ]);
        $result = json_decode($req->getBody()->getContents(), true);
    ?>
        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo">
                        <span>
                            <img src="{{ asset('admin/assets/images/logo.png')}}" alt="" height="24">
                        </span>
                        <i>
                            <img src="{{ asset('admin/assets/images/logo-sm.png')}}" alt="" height="22">
                        </i>
                    </a>
                </div>

                <nav class="navbar-custom">

                    <ul class="navbar-right d-flex list-inline float-right mb-0">
                        <li class="dropdown notification-list">
                            <div class="dropdown notification-list nav-pro-img">
                                @foreach($result as $results)
                                <a class="dropdown-toggle nav-link arrow-none waves-effect nav-user waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                    <span class=" mr-2">{{$results['name']}}</span>
                                    <img src="{{ asset('admin/assets/images/users/user-4.jpg')}}" alt="user" class="rounded-circle">
                                </a>
                                @endforeach
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <!-- item-->
                                    <a class="dropdown-item" href="#" action="/changePassword/" data-toggle="modal" data-target="#changePassword{{$results['id']}}"><i class="mdi mdi-key-variant m-r-5"></i> Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item text-danger" href="/logout"><i class="mdi mdi-power text-danger"></i> Logout</a>
                                </div>
                            </div>
                        </li>

                    </ul>

                    <ul class="list-inline menu-left mb-0">
                        <li class="float-left">
                            <button class="button-menu-mobile open-left waves-effect waves-light">
                                <i class="mdi mdi-menu"></i>
                            </button>
                        </li>
                    </ul>

                </nav>

            </div>
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">
                <div class="slimscroll-menu" id="remove-scroll">

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu" id="side-menu">
                            <li class="menu-title">Main</li>
                            <li>
                                <a href="\home" class="waves-effect">
                                    <i class="mdi mdi-home"></i> <span> Dashboard </span>
                                </a>
                            </li>
                            <li>
                                <a href="/country" class="waves-effect">
                                    <i class="mdi mdi-flag-outline"></i> <span> Country </span>
                                </a>
                            </li>
                            <li>
                                <a href="/province" class="waves-effect">
                                    <i class="mdi mdi-city"></i><span> Province </span>
                                </a>
                            </li>
                            <li>
                                <a href="/city" class="waves-effect">
                                    <i class="mdi mdi-home-modern"></i><span> City </span>
                                </a>
                            </li>
                        </ul>

                    </div>
                    <!-- Sidebar -->
                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->
            @yield('content') 
            
            @foreach($result as $results)
            <div class="modal fade" id="changePassword{{$results['id']}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog confirm" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form id="formEdit" method="POST" action="/changePassword/" class="needs-validation" novalidate="">
                            {{ method_field('PUT') }} @csrf
                            <div class="modal-body">
                                <input type="hidden" value="{{$results['id']}}" name="id">
                                <label>Old Password :</label>
                                <input type="password" class="form-control" name="oldPassword">
                                <div class="invalid-feedback">
                                    Form Unit harus diisi!
                                </div>
                            </div>
                            <div class="modal-body">
                                <label>New Password :</label>
                                <input type="password" class="form-control" name="newPassword">
                                <div class="invalid-feedback">
                                    Form Unit harus diisi!
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <!-- END wrapper -->

        <!-- jQuery  -->
        <script src="{{ asset('admin/assets/js/jquery.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admin/assets/js/jquery.slimscroll.js')}}"></script>
        <script src="{{ asset('admin/assets/js/waves.min.js')}}"></script>

        <script src="{{ asset('admin/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>

        <!-- Peity JS -->
        <script src="{{ asset('admin/assets/plugins/peity/jquery.peity.min.js')}}"></script>

        <script src="{{ asset('admin/assets/plugins/morris/morris.min.js')}}"></script>
        <script src="{{ asset('admin/assets/plugins/raphael/raphael-min.js')}}"></script>

        <script src="{{ asset('admin/assets/pages/dashboard.js')}}"></script>

        <!-- Required datatable js -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.buttons.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/jszip.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/pdfmake.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/vfs_fonts.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.html5.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.print.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/buttons.colVis.min.js')}}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/responsive.bootstrap4.min.js')}}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js')}}"></script>

        <!-- App js -->
        <script src="{{ asset('admin/assets/js/app.js')}}"></script>

</body>

</html>