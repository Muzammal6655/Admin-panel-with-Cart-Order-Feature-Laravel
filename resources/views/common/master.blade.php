<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/all.min.css')}}">
      <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <title>Admin Panel</title>
</head>
<body  class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    {{View::make('common.side-bar')}}
    {{View::make('common.header')}}
      @yield('content')
    {{View::make('common.footer')}}
  </div>
    <script src="js/jquerry.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>