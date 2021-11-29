<?php 
use App\Http\Controllers\ProductController;
$total=0;
if(Session::has('user'))
{
  $total= ProductController::cartItem();
}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="productController">E-Comm</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
      @if(Session::has('user'))
        <li class="active"><a href="products">Home <span class="sr-only">(current)</span></a></li>
        @else
        <li class="active"><a href="/">Home <span class="sr-only">(current)</span></a></li>
        @endif
        @if(Session::has('user'))
        <li><a href="myorders">Orders</a></li>
        @endif
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        @if(Session::has('user'))
        <li><a href="cartlist">Cart({{$total}})</a></li>
        @endif
        </li>
        @if(Session::has('user'))
        @else
        <li><a href="adminlogin">Admin Login</a></li>
        </li>
        @endif
        @if(Session::has('user'))
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">{{Session::get('user')['name']}}
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="customerprofile">Profile</a></li>
              <li><a href="/logout">Logout</a></li>
            </ul>
          </li>
          @else
          <li><a href="/">Login</a></li>
          <li><a href="{{ url('/customerProfile/create') }}">Register</a></li>
          @endif
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>