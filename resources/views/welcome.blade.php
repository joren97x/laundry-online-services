<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/laundry.png" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('visitor/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/boxicons/2.1.4/css/boxicons.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Laundry Online Services</title>
</head>
<body>

      
    <!-- navbar -->
    <header>
        <a href="#" class="logo"><i class="bx bxs-washer"></i> Laundry</a>
        <!-- menu icon -->

        <div class="bx bx-menu" id="menu-icon"></div>
        <!--nav list-->
        <ul class="navbar">
            <li><a href="#home" class="home-active">Home</a></li>
            <li><a href="#book">Book</a></li>
            <li><a href="#about">About</a></li>
        </ul>

        <!--login/signup-->

         
        <div class="login">
            <a href="/login">Login</a>
        </div>

    </header>

    <!-- HOME -->
    <section class="main" id="main">
            <div class="main-text">
                <h1>WE OFFER THE BEST
                    <br> <span>LAUNDRY SERVICES</span>
                </h1>
                <p>
                    <h2>- WASH & DRY -</h2>
                    <br class="br">We come to get the clothes and we return
                    <br class="br">them clean to your Home.
                </p>
                <br>
                <a href="/login" class="btn btn-primary">Book Now</a>
            </div>
            <div class="main_image">
                <img src="{{asset('visitor/img/laundry.png')}}" alt="">
            </div>
    </section>   
     <!-- END HOME -->


    <!--about us SECTION-->
    <section class="about-us">
       <div class="heading">
           <h1> About Us</h1>
       </div>
       <div class="container">
            <div class="container-content">
                <h5><p>
                    The Laundry Online System is here to revolutionize the way you manage your laundry
                    needs. Whether you're a busy professional, a student with a hectic schedule,
                    or simply someone seeking a hassle-free laundry experience, our platform offers
                    the perfect solution.
                    <br><br>
                    Our Laundry Online System is designed to provide you with a seamless and convenient 
                    way to handle your laundry from start to finish. Say goodbye to the days of lugging
                    heavy bags of dirty clothes to the local Laundromat or dealing with the stress of
                    coordinating drop-off and pick-up times. With our user-friendly online platform,
                    you can take control of your laundry with just a few clicks.</p></h5>
                <button class="about-btn">Learn more</button>
            </div>
                <div class="container-image">
                    <img src="{{asset('visitor/img/4.jpg')}}" alt="">
                </div>
        </div> 
        
          
       </div>
    </section>

     <footer class="footer">
        <div class="social">
            <a href="#"><i class="bx bxl-facebook-circle"></i></a>
            <a href="#"><i class="bx bxl-instagram"></i></a>
            <a href="#"><i class="bx bxl-twitter"></i></a>
            <a href="#"><i class="bx bxl-gmail"></i></a>
        </div>

        <ul class="list">
            <li>
                <a href="home">Home</a>
            </li>
            <li>
                <a href="about">About Us</a>
            </li>
            <li>
                <a href="book">Booking</a>
            </li>
           <p class="copyright">
                Online Laundry System @2023
           </p>
            
        </ul>
     </footer>
  
  
    
</body>
</html>