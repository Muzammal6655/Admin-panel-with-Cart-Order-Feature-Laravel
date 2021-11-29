<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Project</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<body>
  
    {{View::make("common.customerheader")}}
    @yield('content')
    {{View::make('common.customerfooter')}}
    
    <style>
        .custom-login{
            hieght: 500%;
            padding: 100px;

        }
        .cart-class{
            margin-right:40px;
        }
        img.slider-img{
            height: 400px !important;
            margin:auto;
    }
        .custom-product{
        height: 600px
        }
        .slider-text{
            background-color: #35443585 !important;
        }
        .trending-image{
        height: 100px;
        }
        .trening-item{
            float: left;
            width: 25%;
            
        }
        .trending-wrapper{
            margin: 30px;
        }
        .detail-img{
        height: 200px;
        }
        .search-box{
        width: 500px !important
    }
        .cart-list-devider{
        border-bottom: 1px solid #ccc;
        margin-bottom: 20px;
        padding-bottom: 20px
    }
    #cart-remove-button{
        padding-top:30px;
        text-align:center;
    }
    </style>
    <script src="js/jquerry.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>