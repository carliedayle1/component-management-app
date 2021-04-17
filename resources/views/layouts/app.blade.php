<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Component Management System</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">

    <style>
        #wrapper {
            overflow-x: hidden;
        }

        #sidebar-wrapper {
            min-height: 100vh;
            margin-left: -15rem;
            -webkit-transition: margin 0.25s ease-out;
            -moz-transition: margin 0.25s ease-out;
            -o-transition: margin 0.25s ease-out;
            transition: margin 0.25s ease-out;
        }

        #sidebar-wrapper .sidebar-heading {
            padding: 0.875rem 1.25rem;
            font-size: 1.2rem;
        }

        #sidebar-wrapper .list-group {
            width: 15rem;
        }

        #page-content-wrapper {
            min-width: 100vw;
        }

        #wrapper.toggled #sidebar-wrapper {
            margin-left: 0;
        }

        .adjustLeft {
            margin-left: 0px;
        }

        .adjustRight {
            margin-right: 0px;
        }

        .content {
            overflow: auto;
            max-height: 90vh;
            position: relative;
        }

        .center {
            margin: auto;
        }

        @media (min-width: 768px) {
            #sidebar-wrapper {
                margin-left: 0;
            }

            #page-content-wrapper {
                min-width: 0;
                width: 100%;
            }

            #wrapper.toggled #sidebar-wrapper {
                margin-left: -15.5rem;
            }

            .adjustLeft {
                margin-left: 50px;
            }

            .adjustRight {
                margin-right: 50px;
            }
        }

    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">

        <!-- Sidebar -->
        <div class="bg-light border-right" id="sidebar-wrapper">
            <div class="sidebar-heading">
                <h6>Hi {{Auth::user()->name}}!</h6>
            </div>
            <div class="list-group list-group-flush">

                <div class="accordion" id="accordionExample">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left" type="button" data-toggle="collapse"
                                    data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <strong> Components</strong>
                                </button>
                            </h2>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                            data-parent="#accordionExample">

                            <div class="list-group ">
                                <a href="/components" class="list-group-item list-group-item-action">Component list</a>
                                <a href="/borrowlogs" class="list-group-item list-group-item-action">Borrow Logs</a>
                                <a href="/components/create" class="list-group-item list-group-item-action">Add
                                    component</a>
                                <a href="/components/archives" class="list-group-item list-group-item-action">Archived
                                    components</a>
                                <a href="/components/transactions"
                                    class="list-group-item list-group-item-action">Transaction history</a>
                            </div>

                        </div>
                    </div>
                    @if(Auth::user()->account_type == 'admin')
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <strong> Reports</strong>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                            data-parent="#accordionExample">

                            <div class="list-group ">
                                <a href="/reports" class="list-group-item list-group-item-action">Report list</a>
                                <a href="/reports-archives" class="list-group-item list-group-item-action">Archived
                                    reports</a>
                                <a href="/reports-transactions"
                                    class="list-group-item list-group-item-action">Transaction history</a>
                            </div>

                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    <strong> Users</strong>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                            data-parent="#accordionExample">

                            <div class="list-group ">
                                <a href="/users" class="list-group-item list-group-item-action">User list</a>
                                <a href="/users/create" class="list-group-item list-group-item-action">Create user</a>
                            </div>

                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header" id="headingFour">
                            <h2 class="mb-0">
                                <button class="btn btn-block text-left collapsed" type="button" data-toggle="collapse"
                                    data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                    <strong> Rooms</strong>
                                </button>
                            </h2>
                        </div>
                        <div id="collapseFour" class="collapse" aria-labelledby="headingFour"
                            data-parent="#accordionExample">

                            <div class="list-group ">
                                <a href="/rooms" class="list-group-item list-group-item-action">Room list</a>
                                <a href="/rooms/create" class="list-group-item list-group-item-action">Create room</a>
                            </div>

                        </div>
                    </div>
                    @endif

                    <div class="card">
                        <div class="card-header" id="headingFive">
                            <h2 class="mb-0">
                                <a href='/notifications'
                                    class="btn btn-block text-left collapsed d-flex justify-content-between align-items-center"
                                    type="button">
                                    <strong>Notifications</strong> <span
                                        class="badge badge-pill badge-danger ml-3">150</span>
                                </a>
                            </h2>
                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">

            <nav class="navbar navbar-expand-lg navbar-light bg-primary border-bottom">
                <button class="btn btn-success btn-sm ml-2" id="menu-toggle"><svg xmlns="http://www.w3.org/2000/svg"
                        width="16" height="16" fill="currentColor" class="bi bi-filter-left" viewBox="0 0 16 16">
                        <path
                            d="M2 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm0-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5z" />
                    </svg></button>

                    <a class="navbar-brand ml-2 text-light" href="/home">Asset Tracking System</a>

                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
                        <li class="nav-item active">
                            <button class="btn btn-danger" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Logout</button>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container content py-5">
                @yield('content')
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>

   

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script> -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
   <script>
     $(document).ready( function () {
				$('.table').DataTable(
					{
					columnDefs: [
						{ orderable: false, targets: 0 }
					],
					order: [[1, 'asc']]
					}
				);
			} );

   </script>
   @stack('scripts')
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });

    </script>
</body>

</html>
