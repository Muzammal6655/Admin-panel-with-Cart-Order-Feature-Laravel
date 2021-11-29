@extends('common.master')
@section('content')
<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row  justify-content-md-center" style="padding: 20px;">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">Add New Products</div>
                        <div class="card-body">
                            <form action="{{ url('admin/product')}}" method="post" enctype="multipart/form-data">
                                {!! csrf_field() !!}
                                <div class="form-group">
                                    <label for="Product title">Product Title</label>
                                    <input type="text" class="form-control" id="Product title" name="title" aria-describedby="title" placeholder="Enter Product Name">
                                    <span style="color: red;">@error('title'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input type="text" class="form-control" id="price" placeholder="Product price " name="price">
                                    <span style="color: red;">@error('price'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea style="height: 200px;" type="text" class="form-control" id="description" placeholder="Product Description" name="description"></textarea>
                                    <span style="color: red;">@error('description'){{$message}}@enderror</span>
                                </div>
                                <div class="form-group">
                                    <label for="image">Product Image</label>
                                    <input type="file" class="form-control-file" id="image" name="src">
                                    <span style="color: red;">@error('src'){{$message}}@enderror</span>
                                </div>
                                <button type="submit" class="btn btn-success">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection