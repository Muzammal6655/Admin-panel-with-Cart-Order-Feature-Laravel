@extends('common.customermaster')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="card text-center">
            <div class="card-header">
                <h1>Profile</h1>
            </div>
            <div class="card-body">
                <h5 class="" style="text-align: center;">Name: {{$data->name}}</h5>
                <p class="card-text">Email: {{$data->email}}</p>
                <a href="{{ url('/customerProfile/' . $data->id .'/edit') }}" class="btn btn-primary">Edit Details</a>
            </div>
        </div>
    </section>
</div>
@endsection