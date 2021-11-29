<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('/css/style1.css') }}" />
<script src="https://js.stripe.com/v3/"></script>
    <title>Document</title>
</head>
<body>
@if ($message = Session::get('success'))
    <div class="success">
        <strong>{{ $message }}</strong>
    </div>
@endif
 
 
@if ($message = Session::get('error'))
    <div class="error">
        <strong>{{ $message }}</strong>
    </div>
@endif
 
<form action="charge" method="post" id="payment-form">
{{ csrf_field() }}
    <div class="form-row">
        <p><input type="text" name="amount" placeholder="Enter Amount" /></p>
        <p><input type="email" name="email" placeholder="Enter Email" /></p>
        <label for="card-element">
        Credit or debit card
        </label>
        <div id="card-element">
        <!-- A Stripe Element will be inserted here. -->
        </div>
       
        <!-- Used to display form errors. -->
        <div id="card-errors" role="alert"></div>
    </div>
    <p><button>Submit Payment</button></p>
</form>
<script>
var publishable_key = '{{ env('STRIPE_KEY') }}';
</script>
<script src="{{ asset('/js/card.js') }}"></script>
    
</body>
</html>