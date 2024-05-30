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
    <title>Register</title>
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

     
      <section class="Register">
        <div class="registerbackground">
          <div class="tab-content-register">
            <div class="register-pane fade active show" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                 <h3 class="text-center mb-3 title">Laundry Online Services</h3>
                 <p class="text-center" style="font-size:80%">Create your account by filling the form below.</p>
      
                 @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('success') }}
                    </div>
                 @endif
              <form action=" {{route('register')}} " method="post">
               @csrf

               @error('name')
               <div class="d-block text-danger" style="margin-top: 0px; margin-bottom: 0px; font-size: 10px">
                   {{ $message }}
               </div>
              @enderror

                <div class="form-outline-register mb-0"><div class="row mb-1">
                    <label class="form-label" for="registerName" style="margin-left: 0px;"></label>
                     <input type="name" name="name" id="registerName" class="form-control" placeholder="Full Name">
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 42.4px;"></div><div class="form-notch-trailing"></div></div></div>

                <!-- Email input -->
                @error('email')
                <div class="d-block text-danger" style="margin-top: 0px; margin-bottom: 0px;  font-size: 10px">
                    {{ $message }}
                </div>
               @enderror
                <div class="form-outline-register mb-4"><div class="row mb-1">
                    <label class="form-label" for="registerEmail" style="margin-left: 0px;"></label>
                         <input type="email" name="email" id="registerEmail" class="form-control" placeholder="Username or Email">
                <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 40px;"></div><div class="form-notch-trailing"></div></div></div>
  
                <!-- Password input -->
                @error('password')
                <div class="d-block text-danger" style="margin-top: 0px; margin-bottom: 0px;  font-size: 10px">
                    {{ $message }}
                </div>
               @enderror
               <input type="hidden" name="role" value="user">
                <div class="form-outline-register mb-4"><div class="row mb-1">
                    <label class="form-label" for="registerPassword" style="margin-left: 0px;"></label>
                        <input type="password" name="password" id="registerPassword" class="form-control" placeholder="Password">
                        <div class="footer-register">
                          <p class="text-center">
                            By signing up, you agree to our Terms , Privacy Policy and Cookies Policy.
                          </p> 
                        </div>
                
              
               <!-- Submit button -->
               <div class="row mb-3">
                <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
                <br><br> 
                 <div class="text-center registerDetails">
                    <p> Already have an account? 
                      <a href="/login">
                        Login now
                      </a>
                    </p>
                  </div>
              </form>
            </div>
          </div>
         
        </div>
      </section>
</body>
</html>
