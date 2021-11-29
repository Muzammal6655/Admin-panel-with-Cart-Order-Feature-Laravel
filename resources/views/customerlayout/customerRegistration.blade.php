@extends('common.customermaster')
@section('content')
<div class='content-wrapper'>
    <section class="content">
        <div class="container custom-login">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                <form action="{{ url('customerProfile') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name" >
                        <span style="color:red;">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-3">
                        <label for="Email1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="Email1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="Password1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="Password1">
                    </div>
                    <button type="Submit" class="btn btn-primary" data-bs-toggle="tooltip" style="margin-top:10px" data-bs-placement="left" title="Submit">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection