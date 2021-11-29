@extends('common.customermaster')
@section('content')
<div class='content-wrapper'>
    <section class="content">
        <div class="container custom-login">
            <div class="row">
                <div class="col-sm-4 col-sm-offset-4">
                <form action="customerlogin" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="Submit" class="btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="left" title="Submit">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection