<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('user/style.css')}}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/fontawesome.min.css"/>
    <script src="https://kit.fontawesome.com/ba8d433517.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="qrcode.js"></script>

    <title>Laundry Online Services</title>
</head>
<body>
    <div class="home-section">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{ url('/home') }}" id="logo">Laun<span>dry</span></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="mynavbar">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{  url('/home') }}" id="first-child">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{  url('/user/book') }}" id="second-child">Booking</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('user/order') }}" id="second-child">Orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ url('user/about') }}" id="second-child">About Us</a>
              </li>

            </ul>
            
                @csrf
                @method('DELETE')

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle text-gray fw-bold" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                              <i class="fas fa-user me-2"></i> 
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                              <li><h3 class="email-sa-admin"></h3></li>
                              <li>
                                  <a class="dropdown-item" href="{{route('logout')}}" 
                                       onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();">
                                   Logout
                                  </a>
                                  <form action="{{route('logout')}}" id="adminLogoutForm"
                                  method="POST">@csrf</form>
                              </li>
                          </ul>
                      </li>
                  </ul>
              </div>
           
        </div>
      </nav>
      <!--home start-->
        @yield('content')
      <!--home end-->
    </div>
</body>
</html>
