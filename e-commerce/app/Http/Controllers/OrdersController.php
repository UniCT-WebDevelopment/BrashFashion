<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class OrdersController extends Controller
{
    function store(Request $request){
        $cod_user = request('cod_user');
        $cods_product = request('product');

        $amount = 0;
        foreach($cods_product as $item){
            $products = DB::table('products')->where('id', $item)->first();
            $amount+=$products->price;
            
            $update_quantity_product = Product::findOrFail($item);
            $update_quantity_product->quantity -= 1;
            $update_quantity_product->save();
        }

        $user_address = DB::table('users')->where('id', $cod_user)->first();
        $address = $user_address->address;

        /* create a new record of orders */
        $order = new \App\Order();
        $order->cod_user = $cod_user;
        $order->amount = $amount;
        $order->address = $address;
        $order->status_order = 0;

        $order->save();

        /* create a new record of order_details */
        foreach($cods_product as $item){
            $order_details = new \App\Order_detail();

            $actualOrder = DB::table('orders')->where('cod_user', $cod_user)->latest()->first();
            $order_details->cod_order = $actualOrder->id;

            $order_details->cod_product = $item;
            $order_details->quantity = 1;

            $order_details->save();
        }

        /* refresh page */
        return redirect('/users/'.$cod_user.'/index');
    }
}
