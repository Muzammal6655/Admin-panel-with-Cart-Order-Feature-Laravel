@extends('common.master')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row  justify-content-md-center" style="padding: 20px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Update Product Details</div>
                        <div class="card-body">
                            <form action="{{  url('admin/product/' .$productedit->id) }}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                @method("PATCH")
                                <div class="form-group">
                                    <label for="Product title">Product Title</label>
                                    <input type="text" class="form-control" id="Product title" name="title" value='{{$productedit->title}}' aria-describedby="title">
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" value='{{$productedit->price}}' name="price">
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input style="height: 200px;" type="text" class="form-control" id="description" value='{{$productedit->description}}' name="description">
                                </div>
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <div>
                                        <img src="/image/{{ $productedit->src }}" width="100px" alt=""> 
                                        <input type="file" class="form-control-file" id="image" name="src" value="{{$productedit->src}}">
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection