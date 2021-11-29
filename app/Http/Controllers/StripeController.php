<?php

namespace App\Http\Controllers;

use Stripe;
use Session;

use Illuminate\Http\Request;

class StripeController extends Controller
{
    public function call(Request $request) {
        \Stripe\Stripe::setApiKey('sk_test_51Jx7EgSGhE45WcYKYr4Zadz7eZ1tXlu3O5uqnmYkuy18bMSP3lQD3jR7rLzepbNEicofmna3rFrKPDIj8wlzu0O200ZjFdnblQ');
        $customer = \Stripe\Customer::create(array(
          'name' => 'test',
          'description' => $request->name,
          'email' => 'email@gmail.com',
          'source' => $request->input('stripeToken'),
           "address" =>["city" => "San Francisco", "country" => "US", "line1" => "510 Townsend St", "postal_code" => "98140", "state" => "CA"]

      ));
        try {
            \Stripe\Charge::create ( array (
                    "amount" => 300 * 100,
                    "currency" => "usd",
                    "customer" =>  $customer["id"],
                    "description" =>$request->name
            ) );
            Session::flash ( 'success-message', 'Payment done successfully !' );
            return redirect( 'stripeform' );
        } catch ( \Stripe\Error\Card $e ) {
            Session::flash ( 'fail-message', $e->get_message() );
            return view ( 'cardForm' );
        }
    }
}
