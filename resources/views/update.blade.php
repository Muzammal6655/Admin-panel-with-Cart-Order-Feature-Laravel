@extends('common.master')
@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="card-body"> 
                <form action="{{ url('admin/profile/' .$data->id) }}" method="post">
                    {!! csrf_field() !!}
                    @method("PATCH")
                    <input type="hidden" name="id" id="id" value="{{$data->id}}" id="id" />
                    <label>Name</label></br>
                    <input type="text" name="name" id="name" value="{{$data->name}}" class="form-control"></br>
                    <label>Email</label></br>
                    <input type="email" name="email" id="email" value="{{$data->email}}" class="form-control"></br>
                    <label>Password</label></br>
                    <input type="password" name="password" id="password" placeholder="password" class="form-control"></br>
                    <input type="submit" value="Update" class="btn btn-success"></br>
                </form>
            </div>
        </section>
    </div>
@endsection