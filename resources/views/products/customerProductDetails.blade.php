@extends('common.customermaster')
@section("content")
<div class='content-wrapper'>
    <section class='content'>
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                <img class="detail-img" src="/image/{{ $productDetails->src }}" alt="">
                </div>
                <div class="col-sm-6">
                    <a href="/productController">Go Back</a>
                <h2>{{$productDetails['name']}}</h2>
                <h3>Price : {{$productDetails['price']}}</h3>
                <h4>Details: {{$productDetails['description']}}</h4>
                <h4>category: {{$productDetails['category']}}</h4>
                <br><br>
                <form action="/add_to_cart" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value={{$productDetails['id']}}>
                <button class="btn btn-primary">Add to Cart</button>
                </form>
                <br><br>
                <button class="btn btn-success">Buy Now</button>
                <br><br>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection