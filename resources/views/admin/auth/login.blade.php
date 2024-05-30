<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('admin-css/style.css')}}">
    <title>Administrator</title>
</head>
<body>
    
        <form action="/login" method="post">
            @csrf
            @if (Session::get('fail'))
                <div class="alert alert-danger">
                    {{ Session::get('fail') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                </div>
            @endif

            <br>
        <div class="container">
            <div class="myform">
                <form>
            <div class="adminlogin">
                 <h1 class="sign">Administrator</h1>
        
            <label for="#"></label>
            <input type="hidden" name="role" value="admin">
            <input type="email" name="email" placeholder="Username" value=" {{ old('login_id')}}">
                @error('email')
                    <div class="d-block text-danger" style="margin: 5px 10px 5px 35px">
                        {{ $message }}
                    </div>
                @enderror
            <label for="#"></label>
            <input type="password" name="password" id="password"  placeholder="Password">
            @error('password')
            <div class="d-block text-danger" style="margin: 5px 10px 5px 35px">
                {{ $message }}
            </div>
        @enderror
                    
             <button class="button" type="submit">Login</a></button> 
           </form>
                </div>
            </div>
        </form>
        <div class="image">
            <img src="/admin-css/img/bglaundry.jpg">
          </div>
    </div>
</div>
</body>
</html>