<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.0/css/boxicons.min.css"/>
    <link rel="stylesheet" href="{{asset('rider/style.css')}}" />
    <title>Rider's Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class=" " id="sidebar-wrapper">   
            <div class="sidebar-heading text-left py-3 primary-text fs-4 fw-bold text-gray border-bottom"><i class='fas fa-user-circle me-2'></i><a>RIDER</a>
                   <h4 class="mb-0 text-center fs-6">Laundry Services</h4></div>
            <div class="list-group list-group-flush my-3">

                <a href="dashboard" class="list-group-item list-group-item-action bg-transparent text-gray fw-bold">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="bookings" class="list-group-item list-group-item-action bg-transparent text-gray fw-bold">
                    <i class="fa fa-book me-2"></i>Bookings</a>
                <a href="transaction-history" class="list-group-item list-group-item-action bg-transparent text-primary active">
                    <i class="fa fa-book me-2"></i>Transaction history</a>

            </div>
        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4" >
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-gray fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-lightgray">Transaction History</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-gray fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Rider
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><h3 class="email-sa-admin"></h3></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logoutRider') }}" 
                                         onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                                     Logout
                                    </a>
                                    <form action="{{ route('logoutRider') }}" id="adminLogoutForm"
                                    method="POST">@csrf</form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                

                
                    

            </nav>

            <main class="order-details">
                <table class="table" >
                    <thead>
                        <tr>
                        <th>Bookings No.</th>
                        <th>Name</th>
                        <th>Status</th>
                        </tr>
                    </thead>

                        @foreach ($orders as $order)
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->status }}</td>
                            </tr>
                        </tbody>

                        @endforeach
                    </table>
            </main>
        </div>
    </div>
    <!-- /#page-content-wrapper -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>