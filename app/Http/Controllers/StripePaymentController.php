<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

use Stripe;

class StripePaymentController extends Controller
{
    //Write Code for API Integration
    public function stripePost(Request $request){
        $data = json_decode($request->getContent());
        try{
            $stripe = new \Stripe\StripeClient(
                env('STRIPE_SECRET')
            );
            $res =  $stripe->tokens->create([
                'card' => [
                //   'number' => '4242424242424242',
                //   'exp_month' => 12,
                //   'exp_year' => 2023,
                //   'cvc' => '314',
                    'number' => $data->number,
                    'exp_month' => $data->exp_month,
                    'exp_year' => $data->exp_year,
                    'cvc' => $data->cvc,
                ],
              ]);

              Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

              $response = $stripe->charges->create([
                // 'amount' => 2000,
                // 'currency' => 'usd',
                // 'source' => 'tok_amex',
                // 'description' => 'My First Test Charge (created for API docs at https://www.stripe.com/docs/api)',
                    'amount' => $data->amount,
                    'currency' => 'clp',
                    'source' => $res->id,
                    'description' => $res->description,
              ]);
              $producto = Producto::findOrFail($data->id_producto);
              $producto->stock = $producto->stock - $data->cantidad;
              if($producto->stock  == 0){
                $producto->estado = 0;
              }
              $producto->save();
            return response()->json([$response->status], 201);
        }
        catch(Exception $ex){
            return response()->json([['response'=>'Error']], 500);
        }
    }
}
