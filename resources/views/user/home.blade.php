@extends('user.layout')

@section('content')

<section class="home">
    <div class="content">
        <h1>WE OFFER THE BEST
            <br> <span>LAUNDRY SERVICES</span>
        </h1>
        <p><h2>- WASH & DRY -</h2>
            <br>
            <span>We come to get the clothes and we return</span>
            <br><span>them clean to your home.</span>
        </p>
        <br>
        <div id="btn">
            <button type="button"><a href="{{url('/user/book')}}" class="btn a">Book Now</a></button>
        </div>
    </div>
    <div class="img">
        <img src="{{asset('user/img/laundry.png')}}" alt="">
    </div>
</section>

@endsection
