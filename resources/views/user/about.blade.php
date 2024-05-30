@extends('user.layout')

@section('content')

<!-- about us-->

<div class="container-fluid p-0">
    <div class="row no-gutters">
        <div class="col-xs-12">
    <section class="about">
        <div class="bg-white">
        <div class="row">
        <div class="image">
            <img src="{{asset('user/img/bg3.jpg')}}" alt="">
            <div class="top-left">About Us</div>
            <h5><p>In today's fast-paced world, convenience and efficiency are paramount.
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
            </div>
        </div>
    </div>
    </div>
</div>
<hr>
    <br>
        <div class="content-1">
            <h3>Services</h3>
            <br>
            <div class="columns-3">
                <div class=""><img src="img/wash copy.png" style="width: 20%"></div>
                <div class=""><img src="img/fold copy.png" style="width: 25%"></div>
                <div class=""><img src="img/pickupdeliverylogo copy.png" style="width: 30%"></div>
            <div class="columns-4">
                <div class="fw-bold">○ Wash & Dry</div>
                <div class="fw-bold">○ Dry Cleaning</div>
                <div class="fw-bold">○ Pickup & Delivery</div>
            </div>
            <div class="columns-5">
                <div class="">Our wash and dry services provide a convenient and efficient solution for maintaining the cleanliness and freshness of your laundry, ensuring garments are expertly cleaned and promptly dried for your utmost convenience.</div>
                <div class="">Dry cleaning services offer professional garment cleaning using non-water-based solvents, providing an effective and gentle cleaning method for delicate fabrics and garments that cannot withstand traditional laundering.</div>
                <div class="">Effortlessly streamline your laundry routine with our convenient pickup and delivery services, ensuring fresh and clean garments delivered right to your doorstep.</div>
            </div>
        </div>

        </div>
    </section>
</div>

<form action="/save-rating" name="ratingForm" id="ratingForm" method="POST">
    @csrf
    <section class="customer-review">
        <div class="container">
            <h4 class="title1">Customer's Review</h4>
            <div class="review_head">
                <!-- Commented out for future use -->
            </div>

            <div class="star-rating">
                <h2 class="rating_title">Ratings</h2>
                <div class="star-icon"> 
                    <input type="radio" name="rating" id="rating5" value="1"><label for="rating5" class="fa fa-star" data-value="5"></label>
                    <input type="radio" name="rating" id="rating4" value="2"><label for="rating4" class="fa fa-star" data-value="4"></label>
                    <input type="radio" name="rating" id="rating3" value="3"><label for="rating3" class="fa fa-star" data-value="3"></label>
                    <input type="radio" name="rating" id="rating2" value="4"><label for="rating2" class="fa fa-star" data-value="2"></label>
                    <input type="radio" name="rating" id="rating1" value="5"><label for="rating1" class="fa fa-star" data-value="1"></label>
                </div>      
                <p class="customer-rating-error"></p>     
            </div>
            <div id="response-message"></div>
            <div id="response-message2"></div>
            <div>
                <p class="comment">How was your overall experience?</p>
                <textarea name="comment" id="comment" placeholder="Leave a comment"></textarea>
                <p></p>
            </div>

            <div>
                <button type="button" class="submitreview">Submit</button>
            </div> 

        </div>
    </section>
</form>

<script>
    $(document).ready(function() {
        $('.submitreview').click(function(event) {
            event.preventDefault(); // Prevent the default form submission

            var form = $('#ratingForm');
            var url = form.attr('action');
            var data = form.serialize(); // Serialize form data

            $.ajax({
                type: 'POST',
                url: url,
                data: data,
                success: function(response) {
                    // Handle the response from the server
                    $('#response-message').html('<div class="alert alert-success">' + response.message + '</div>');
                    $('#response-message2').html('<div class="alert alert-success">' + response.review + '</div>');
                },
                error: function(xhr) {
                    // Handle errors
                    $('#response-message').html('<div class="alert alert-danger">' + xhr.responseText + '</div>');
                }
            });
        });
    });
</script>

@endsection
{{-- 
@section('customJs')
<script type="text/javascript">
 $("#ratingForm").submit(function(event){
    event.preventDefault();
    
    $.ajax({
        url: '{{route("user.saveRating")}}',
        type: 'post',
        data: $(this).serializeArray(),
        dataType: 'json',
        success: function(response) {
            var errors = response.errors;

            if(response.status == false) {
                if(errors.name) {
                $("#name").addClass('is-invalid')
                .siblings("p")
                .addClass('invalid-feedback')
                .html(errros.name);
            } else {
                $("#name").removeClass('is-invalid')
                .siblings("p")
                .removeClass('invalid-feedback')
                .html('');
            }

            if(errors.email) {
                $("#email").addClass('is-invalid')
                .siblings("p")
                .addClass('invalid-feedback')
                .html(errros.email);
            } else {
                $("#email").removeClass('is-invalid')
                .siblings("p")
                .removeClass('invalid-feedback')
                .html('');
            }

            if(errors.comment) {
                $("#email").addClass('is-invalid')
                .siblings("p")
                .addClass('invalid-feedback')
                .html(errros.comment);
            } else {
                $("#comment").removeClass('is-invalid')
                .siblings("p")
                .removeClass('invalid-feedback')
                .html('');
            }

            if(errors.rating) {
                $(".customer-rating-error").html(errors.rating);
            } else {
                $(".customer-rating-error").html('');
            }
            }




        }

    });

 });

</script>
@endsection --}}

