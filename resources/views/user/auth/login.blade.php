<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('user/login.css')}}">
    <link rel="shortcut icon" type="image" href="./img/png-tr2.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/ba8d433517.js" crossorigin="anonymous"></script>
    <title>Login</title>
</head>
<body>
  <header>
    <a href="/" class="logo"><i class="bx bxs-washer"></i> Laundry</a>
    <!-- menu icon -->

    <div class="bx bx-menu" id="menu-icon"></div>
    <!--nav list-->
    <ul class="navbar">
        <li><a href="/" class="home-active">Home</a></li>
        <li><a href="#book">Book</a></li>
        <li><a href="#about">About</a></li>
    </ul>

    <!--login/signup-->

     
    <div class="login">
        <a href="/login">Login</a>
    </div>

</header>
  
      <section class="form-main">
          <div class="tab-content">
            <div class="tab-pane fade active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                 <h3 class="text-center mb-3 laundry-title"> 
                    Laundry Online Services 
                  </h3>
            
                 @if (Session::has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('error') }}
                    </div>
                 @endif
              <form action="/login" method="POST" class="form-container">
               @csrf
            
                <!-- Email input -->
                <div class="form-outline">
                   <input type="hidden" name="role" value="user">
                    <input type="email" name="email" id="registerEmail" class="inputform form-control " placeholder="Enter username or email">
                    @error('email')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>
                <!-- Password input -->
                <div class="form-outline">
                    <input type="password" name="password" id="registerPassword" class="inputform form-control" placeholder="Password">
                    @error('password')
                        <p class="text-danger"> {{$message}} </p>
                    @enderror
                </div>
             
                <br>
                <!-- Submit button -->
                <div class="btnlogin">
                  <button type="submit">Login</button>
                </div>
                <!-- Forgot Password -->
                 
                <div class="text-center logindetails">
                  <p>Don't have an account? 
                    <a href="{{route('register')}}">
                      Register now.
                    </a>
                  </p>
                </div>
              </form>
            </div>
          </div>
      </section>
</body>
</html>
