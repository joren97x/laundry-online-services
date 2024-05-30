@extends('user.layout')

@section('content')

<!--order start-->
<main class="order-details">
<table class="table" >
  <thead>
  <tr>
    <th>Booking No.</th>
    <th>Name</th>
    <th>Payment Method</th>
    <th>Fab-Con</th>
    <th>Detergent</th>
    <th>Total Amount</th>
    <th>Status</th>
  </tr>
  </thead>
  
  
  <tbody>
    @if (count($orders) == 0)
      <tr>
        <td colspan="7" class="text-center">No orders found. <a href="/user/book">Book now!</a> </td>
      </tr>
    @endif
  @foreach ($orders as $order)
  <tr>
    <td> {{ $order->id }} </td>
    <td> {{ $order->user->name }} </td>
    <td> {{ $order->payment_option }} </td>
    <td> {{ $order->fabric->fabric_name }} </td>
    <td> {{ $order->detergent->detergent_name }}</td>
    <td> {{ $order->total_amount }} </td>
    <td>
      <button class="btn btm-sm btn-primary" style="font-size : 12px;height:40px;width:90px" onclick="changeData({{ $order }})" data-bs-toggle="modal" data-bs-target="#statusModal">View Status</button>
    </td>
  </tr>
  @endforeach

  </tbody>
 
</table>
</main>

  <div class="modal fade " id="statusModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Status</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <section class="step-book">
            <div class="step-book-list">
              <li class="step-book-item" id="status1">
                <span class="progress-count">1</span>
                <span class="progress-label">Pending</span>
              </li>
        
              <li class="step-book-item" id="status2">
                <span class="progress-count">2</span>
                <span class="progress-label">Pick-up</span>
              </li>
        
              <li class="step-book-item" id="status3">
                <span class="progress-count">3</span>
                <span class="progress-label">Process</span>
              </li>
        
              <li class="step-book-item" id="status4">
                <span class="progress-count">4</span>
                <span class="progress-label">Delivered</span>
              </li>
        
              <li class="step-book-item" id="status5">
                <span class="progress-count">5</span>
                <span class="progress-label">Complete</span>
              </li>
            </div>
          </section>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

<!--order end-->

@endsection

<script>

    function changeData(order) {
        
        for(let i = 1; i <= 5; i++) {
            document.getElementById('status'+i).classList.remove('current-item')
        }

        switch(order.status) {
            case 'pending':
                document.getElementById('status1').classList.add('current-item')
                break;
            case 'pick up':
                document.getElementById('status2').classList.add('current-item')
                break;
            case 'process':
                document.getElementById('status3').classList.add('current-item')
                break;
            case 'delivery':
                document.getElementById('status4').classList.add('current-item')
                break;
            case 'complete':
                // document.getElementById('status5').classList.add('current-item')
                break;
        }
    }

  </script>
