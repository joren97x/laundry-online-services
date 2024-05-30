<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/delivery.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="{{asset('rider/style.css')}}">
    <title>Rider's Login</title>
</head>
<body>
    <div class="form-login">
        <div class="container">
            <div class="row  justify-content-md-center">
                <div class="col-md-offset-4 col-md-4 col-sm-offset-3 col-sm-6">

                    <form class="form-horizontal" action="/login" method="POST">
                        @csrf
                        <div class="form-icon">
                            <i class="fas fa-shipping-fast"></i>
                            <h3 class="form-title">Rider's Login</h3>

                            <div class="form-group">
                                <span class="input-icon"><i class="bx bxs-user"></i></span>
                                <input type="hidden" name="role" value="rider">
                                <input class="form-control" type="email" name="email" placeholder="email/username" value="{{ old('login_id') }}">
                                @error('email')
                                    <p class="text-danger"> {{$message}} </p>
                                @enderror
                            </div>
                           
                            <div class="form-group">
                                <span class="input-icon"><i class="bx bx-lock"></i></span>
                                <input class="form-control" type="password" name="password" placeholder="password">
                                @error('password')
                                    <p class="text-danger"> {{$message}} </p>
                                @enderror
                            </div>
                            <button class="btn-signin" type="submit" value="login">login</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
</html>