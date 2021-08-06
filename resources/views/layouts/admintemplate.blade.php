<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="{{asset('backend_assets/css/styles.css')}}" rel="stylesheet" />
        <script src="{{asset('backend_assets/js/font-awesome-5.15.3.js')}}"></script>
        {{-- Custom CSS --}}
        <link href="{{asset('backend_assets/css/custom.css')}}" rel="stylesheet" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Satisfy&display=swap" rel="stylesheet"> --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        {{-- <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet"> --}}
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Navbar Brand-->
            <a class="navbar-brand ps-3" href="index.html">
                <span class="my-font">K&H Food Court</span>
            </a>
            <!-- Sidebar Toggle-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    {{-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button> --}}
                </div>
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        {{-- <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li> --}}
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="index.html">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-tachometer-alt"></i>
                                </div>
                                Dashboard
                            </a>
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="sb-nav-link-icon">
                                    <i class="fas fa-columns"></i>
                                </div>
                                Data Management
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="{{route('categories.index')}}">Category</a>
                                    <a class="nav-link" href="{{route('items.index')}}">Item</a>
                                </nav>
                            </div>
                            <a class="nav-link" href="{{route('orders.index')}}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-shopping-basket" style="color:white"></i>
                                </div>
                                Order Management
                            </a>
                            <a class="nav-link" href="{{route('users.index')}}">
                                <div class="sb-nav-link-icon">
                                    <i class="fa fa-users" style="color:white"></i>
                                </div>
                                User Management
                            </a>
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <span class="user-name">{{Auth::user()->name}}<span>
                        </div>
                    </nav>
                </div>
                @yield('content')
            </div>
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                <button class="close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                            <div class="modal-footer">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Cancel</button>
                                <!-- <a class="btn btn-primary" href="login.html">Logout</a> -->
                                <input type="submit" class="btn btn-primary" name="btnlogout" value="Logout">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('backend_assets/js/scripts.js')}}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
            <script src="{{asset('backend_assets/assets/demo/chart-area-demo.js')}}"></script>
            <script src="{{asset('backend_assets/assets/demo/chart-bar-demo.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="{{asset('backend_assets/js/datatables-simple-demo.js')}}"></script>
            <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
            <script src="{{asset('backend_assets/js/datatables-simple-demo.js')}}"></script>
            <script src="{{asset('backend_assets/jquery/jquery.min.js')}}"></script>
            {{-- Custom JS --}}
            @yield('script')
            <script type="text/javascript">
            $(document).ready(function(){
            $(function() {
            var path = "http://localhost:8000" + location.pathname;
            $("a[href='" + path + "']").addClass('active');
            console.log(path);
            })
            })
            </script>
        </body>
    </html>