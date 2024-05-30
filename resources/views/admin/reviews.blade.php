<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="{{asset('admin-css/style.css')}}" />
    <title>Admin Dashboard</title>
</head>

<body>
    <div class="d-flex" id="wrapper">
        <!-- Sidebar -->
        <div class=" " id="sidebar-wrapper">   
            <div class="sidebar-heading text-left py-3 primary-text fs-4 fw-bold text-light border-bottom"><i class='fas fa-user-circle me-2'></i><a>ADMIN</a>
                   <h4 class="mb-0 text-center fs-6">Laundry Services</h4></div>
            <div class="list-group list-group-flush my-3">

                <a href="dashboard" class="list-group-item list-group-item-action bg-transparent text-white active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="order" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fa fa-book me-2"></i>Bookings</a>
                <a href="fabric" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fas fa-air-freshener me-2"></i>Fabric Conditioner</a>
                <a href="detergent" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fas fa-pump-soap me-2"></i>Detergent</a>
                <a href="transaction-history" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fas fa-history me-2"></i>Transaction History</a>
                    <a href="reviews" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                        <i class="fas fa-history me-2"></i>Customer Reviews</a>

            </div>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4" style="background-image: url('/admin-css/img/bg.jpg');">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-gray fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-lightgray">Dashboard</h2>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                {{-- @if ( Auth::guard('admin')->check() ) --}}
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-gray fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user me-2"></i>Admin
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><h3 class="email-sa-admin"></h3></li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('admin.logout') }}" 
                                         onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                                     Logout
                                    </a>
                                    <form action="{{ route('admin.logout') }}" id="adminLogoutForm"
                                    method="POST">@csrf</form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container-fluid px-4">
                <table>
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Rating</th>
                            <th>Comment</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reviews as $review)
                        <tr>
                            <td>{{ $review->user->name }}</td>
                            <td>{{ $review->rating }}</td>
                            <td>{{ $review->comment }}</td>
                            <td>
                                <form action="/admin/reviews/approve/{{ $review->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-primary" type="submit">Approve</button>
                                </form>
                                <form action="/admin/reviews/decline/{{ $review->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary">Decline</button>
                                </form>
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
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