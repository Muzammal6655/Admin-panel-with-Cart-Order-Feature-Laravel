@extends('common.master')
@section('content')
    <div class="content-wrapper">
        <section class='content'>
            <div style='text-align:center; background: darkgrey; color: white; padding:10px;'>
                <h1>
                    Order Details
                </h1>
            </div>
        @foreach($data as $item)
            <div class='container'>
                <div class='row' style="border-bottom: solid 1px darkgray;">
                    <div class='col-3'>
                    <a href="#">
                        <img class="trending-image" src="/image/{{ $item->src }}" class='img-fluid' width='200px' style='padding:20px;'>
                    </a>
                    </div>
                    <div class='col-3'>
                        <div class="" style="padding:20px;">
                        <h3>{{$item->title}}</h3>
                        <h5>{{$item->price}}</h5>
                        <p>{{$item->description}}</hp>
                        </div>
                    </div>
                    <div class='col-6'>
                        <div class="" style="padding:20px;">
                        <h3>{{$item->name}}</h3>
                            <h4>{{$item->email}}</h4>
                            <h5>Deliver Address: {{$item->address}}</h5>
                            <h6>Payment method: {{$item->payment_method}}</h6>
                            <p>Delivery Status: {{$item->status}}</p>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
        </section>
    </div>
@endsection