@extends('common.customermaster')
@section("content")
<div class="custom-product">
     <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>Result for Products</h4>
            <a class="btn btn-success" href="ordernow">Order Now</a> <br> <br>
            @foreach($products as $item)
            <div class=" row searched-item cart-list-devider">
             <div class="col-sm-3">
                <a href="detail/{{$item->id}}">
                    <img class="trending-image" src="/image/{{ $item->src }}">
                  </a>
             </div>
             <div class="col-sm-4">
                    <div class="">
                      <h2>{{$item->title}}</h2>
                      <h4>{{$item->price}}</h4>
                      <h5>{{$item->description}}</h5>
                    </div>
             </div>
             <div class="col-sm-3" id="cart-remove-button">
                <a href="/removecart/{{$item->cart_id}}" class="btn btn-warning" >Remove to Cart</a>
             </div>
            </div>
            @endforeach
          </div>
     </div>
</div>
@endsection