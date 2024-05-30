@extends('user.layout')

@section('content')

<!-- modal -->


<div class="modal fade" id="completeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <form action="/user/book" method="POST">
        @csrf
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5 text-dark" id="exampleModalLabel">Checkout</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="removeLocalStorage()" aria-label="Close"></button>
        </div>

        <div class="modal-body checkout">
          <div class="payment-detail">
            <div class="details-body">
              Detergent :
            </div>
            <div class="details-body" id="detergent">
              
            </div>
            <input type="hidden" name="detergent_id" id="form_detergent_id">
            
          </div>
          <div class="payment-detail text-white">
            <div class="details-body">
              Fabric Conditioner : 
            </div>
            <div class="details-body" id="fabric">
              
            </div>
            <input type="hidden" name="fabric_id" id="form_fabric_id">
            
          </div>
          <div class="payment-detail text-white">
            <div class="details-body" id="weightInModal">
               1 kilo
            </div>
            <input type="hidden" name="weight" id="form_weight">
            
            <div class="details-body" id="sub_total">
              250
            </div>
          </div>
        <hr>
          <div class="payment">
           <label>Payment Method</label>
           <div class="payment-options">
            <select id="payment-method" name="payment_option" id="form_payment_option">
                <option value="none">Select Payment Method</option>
                <option value="cashondelivery">Cash On Delivery</option>
                <option value="gcash">GCash</option>
                <option value="paypal">PayPal</option>
                <option value="creditcard">Credit Card</option>
            </select>
         </div>





              {{-- <select id="payment" name="payment_option" id="form_payment_option">
                <option value="none">Select Payment Method</option>
                <option value="cash on delivery">Cash on Delivery</option>
                <option value="gcash">GCash</option>
              </select> --}}
          </div>

          <div id="popup" class="popup">
            <img src="img/qr-code.jpg" alt="GCash" class="popup-content">
          </div>

            
            <hr>
            <h5>Payment Details</h5>
            <div class="payment-detail">
              <div class="details-body">
                 Sub-total:
              </div>
              <div class="details-body text-white" id="sub_total2">
                250
              </div>
            </div>
            <div class="payment-detail">
              <div class="details-body text-white">
                 Delivery Fee:
              </div>
              <div class="details-body text-white">
                50
              </div>
            </div>
            <hr>
            <p class="text-white">Notice:
              Our detergent and fabric conditioner are intended for laundry use only.
              Products from various manufacturers may vary.</p>
             <div class="totalpayment">
              <div class="payment-total">
                Total Amount:
            </div>
            <div class="payment-total" id="total_amount">
             300
          </div>
          <input type="hidden" id="form_total_amount" name="total_amount">
             </div>
        </div>
        <div class="modal-footer bg-light p-1">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="removeLocalStorage()">Cancel</button>
                <button type="submit" class="btn btn-primary">Checkout</button>
        </div>
      </div>
    </div>


</form>
</div>

  <main class="products">
    <h2 class="section-heading">Available Detergent</h2>
        @error('detergent_id')
        <div class="alert alert-danger" role="alert">
          Please select detergent.
          </div>
        @enderror
          @foreach($detergent as $data)

    <div class="fabric-list">
      <div class="card">
         <img src="{{asset('/image/detergent/'.$data->image)}}">
        <h5 class="card-title">
           {{ $data->detergent_name ?? '' }}
        </h5>
        <button id="addDetergentBtn{{$data->id}}" onclick="addDetergent({{$data}})" class="checkbtn"><i class="fa-solid fa-plus add-to-check"></i></button>
      </div>
      @endforeach 
    </div>



      <h2 class="section-heading">Available Fabric</h2>
      @error('fabric_id')
        <div class="alert alert-danger" role="alert">
            Please select fabric conditioner.
        </div>
      @enderror
   @foreach($fabric as $data)
      <div class="fabric-list">
        <div class="card">
          <img src="{{asset('image/fabric/'.$data->image)}}">
          <h5 class="card-title">
            {{ $data->fabric_name ?? '' }}
          </h5>
          <button id="addFabricBtn{{$data->id}}"  onclick="addFabric({{$data}})"  class="checkbtn"><i class="fa-solid fa-plus add-to-check"></i></button>
        </div> 
        @endforeach 
      </div>
   
      
     
     
          
    
          </main>

            <div class="input-weight"> 
         <h2 class="laundry-title">Laundry Weight</h2>
      <center><input type="number" class="input-kilo" id="input_weight" placeholder="Input kilo"></center>
       @error('weight')
       <div class="alert alert-danger text-center" role="alert">
          Required weight field.
        </div>
      @enderror
        <button type="button" id="bbtn" onclick="setWeightInModal()" data-bs-toggle="modal" data-bs-target="#completeModal">
           Continue to Checkout
        </button>
      </div>

    </div>
  </div>

  @endsection

  <script>

    let previousFabric = 0
    let previousDetergent = 0
    function addFabric(fabric) {
        document.getElementById("addFabricBtn"+fabric.id).disabled = true
        document.getElementById("addFabricBtn"+fabric.id).innerHTML = "Selected"
        if(previousFabric != 0) {
            document.getElementById("addFabricBtn"+previousFabric).disabled = false
            document.getElementById("addFabricBtn"+previousFabric).innerHTML = "Select"
        }
        document.getElementById('form_fabric_id').value = fabric.id
        document.getElementById('fabric').innerText = fabric.fabric_name


        previousFabric = fabric.id
    }

    function addDetergent(detergent) {
        document.getElementById("addDetergentBtn"+detergent.id).disabled = true
        document.getElementById("addDetergentBtn"+detergent.id).innerHTML = "Selected"
        if(previousDetergent != 0) {
            document.getElementById("addDetergentBtn"+previousDetergent).disabled = false
            document.getElementById("addDetergentBtn"+previousDetergent).innerHTML = "Select"
        }
        document.getElementById('detergent').innerText = detergent.detergent_name
        document.getElementById('form_detergent_id').value = detergent.id
        previousDetergent = detergent.id
    }

    function setWeightInModal() {
        console.log('yeah go')
        localStorage.setItem('checkout_modal_opened', true)
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

    function removeLocalStorage() {
        localStorage.removeItem('checkout_modal_opened')
    }

 
   
  </script>