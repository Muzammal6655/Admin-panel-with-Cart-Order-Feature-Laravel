@extends('common.customermaster')
@section("content")
<div class="custom-product">
     <div class="col-sm-12">
        <div class="trending-wrapper">
            <h2>My Orders </h2>
            @foreach($orders as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="/image/{{ $item->src }}">
                  </a>
             </div>
             <div class="col-sm-6">
                    <div class="">
                      <h2>Name : {{$item->title}}</h2>
                      <h5>Delivery Status : {{$item->status}}</h5>
                      <h5>Address : {{$item->address}}</h5>
                      <h5>Payment Status : {{$item->payment_status}}</h5>
                      <h5>Payment Method : {{$item->payment_method}}</h5>
                    </div>
             </div>
            </div>
            @endforeach
          </div>
     </div>
</div>
@endsection 