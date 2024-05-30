<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
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

                <a href="/rider/dashboard" class="list-group-item list-group-item-action bg-transparent text-gray active">
                    <i class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                <a href="/rider/bookings" class="list-group-item list-group-item-action bg-transparent text-primary fw-bold">
                    <i class="fa fa-book me-2"></i>Bookings</a>
                <a href="transaction-history" class="list-group-item list-group-item-action bg-transparent text-gray fw-bold">
                    <i class="fa fa-book me-2"></i>Transaction history</a>

            </div>
        </div>

        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <nav class="navbar navbar-expand-lg navbar-light py-4 px-4" style="background-image: url('/admin-css/img/bg.jpg');">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-gray fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0 text-lightgray">BOOKINGS</h2>
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
            <div class="btn-group ms-5 mt-5" role="group" aria-label="Basic example">
                <a href="/rider/bookings/pending">
                    <button type="button" class="btn btn-primary">New orders</button>
                </a> 
                <a href="/rider/bookings/pick-up">
                    <button type="button" class="btn mx-1 btn-secondary">Pick-up</button>
                </a> 
                <a href="/rider/bookings/process">
                    <button type="button" class="btn mx-1 btn-secondary">Process</button>
                </a> 
                <a href="/rider/bookings/delivery">
                    <button type="button" class="btn btn-secondary">Delivery</button>
                </a> 
            </div>

            <main class="order-details">
                <table class="table" >
                    <thead>
                        <tr>
                        <th>Bookings No.</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th> </th>
                        </tr>
                    </thead>

                        @foreach ($orders as $order)
                        <tbody>
                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->user->name }}</td>
                                <td>{{ $order->status }}</td>
                                <td>
                                    <button class="btn btn-primary" onclick="updateViewStatusModal({{$order}})" data-bs-toggle="modal" data-bs-target="#viewStatusModal">View Details</button>
                                    <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Proceed to process</button>
                                    <button class="btn btn-primary" onclick="updateData({{$order}})" data-bs-toggle="modal" data-bs-target="#editStatus">Edit</button>
                                </td>
                            </tr>
                        </tbody>

                        @endforeach
                    </table>
            </main>
            <div class="modal fade" id="editStatus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <form action="/riderapp/update-order" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Booking Status</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <p>Bookings No.: <span id="span_order_id"></span> </p>
                            <span>Weight </span>
                            <input type="text" class="form-control" placeholder="Weight sa labhonon" name="weight" value="weight" id="weight">
                            <input type="hidden" name="order_id" id="form_order_id">
                                <button class="button button1" name="status" value="pending">Pending</button>
                                <button class="button button1" name="status" value="process">Process</button>
                                <button class="button button1" name="status" value="complete">Complete</button>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div>
                </form>
              </div>
              <div class="modal fade" id="viewStatusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Booking status</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Name: <span id="name">John doe</span>
                        <div class="row">
                            <div class="col-6">Detergent
                                <p id="detergent"></p>
                            </div>
                            <div class="col-6">Facbric
                                <p id="fabric"></p>
                            </div>
                        </div>
                        Weight <span id="view_weight"></span>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
    </div>
    <!-- /#page-content-wrapper -->

    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };

    function setWeightInModal() {
    var weightInput = parseFloat(document.getElementById('input_weight').value);
    var minPricePerKilo = 250;
    var subtotal = Math.max(weightInput * minPricePerKilo, minPricePerKilo);

    if (weightInput > 1) {
        subtotal += 0 * (weightInput - 1);
    }

    document.getElementById('sub_total').innerHTML = subtotal;
    document.getElementById('sub_total2').innerHTML = subtotal;
    document.getElementById('total_amount').innerText = (subtotal) + 50;
    document.getElementById('form_total_amount').value = (subtotal) + 50;
    document.getElementById('form_weight').value = weightInput;
    document.getElementById('weightInModal').innerHTML = weightInput + ' kg';
}

    </script>
</body>

</html>