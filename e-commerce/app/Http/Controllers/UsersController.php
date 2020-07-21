<?php

namespace App\Http\Controllers;
use App\User;
use App\Product;
use App\Order;
use DB;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('/users/index', [
            'users' => $user,
            'product' => Product::all(),
            'orders' => Order::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new \App\User();
        $user->name = request('name');
        $user->surname = request('surname');
        $user->email = request('email');
        $user->password = request('password');
        $user->address = request('address');

        $user->save();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showInvoice(Order $order)
    {
        $actualOrder = Order::findOrFail($order->id);
        $actualOrderDetails = DB::table('orders')
                                ->join('order_details', 'orders.id', '=', 'order_details.cod_order')->where('orders.id', $actualOrder->id)
                                ->join('products', 'products.id', '=', 'order_details.cod_product') 
                                ->select('order_details.cod_product', 'order_details.quantity','products.name', 'products.price')
                                ->get();
        return view('/users/invoice', [
                                            "order" => $actualOrder,
                                            "order_detail" => $actualOrderDetails
                                       ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /* remove this order */
    public function removeOrder(Request $request){
        $cod_order = request('cod_order');

        $item_update = DB::table('order_details')
                                ->join('products', 'products.id', '=', 'order_details.cod_product')->where('order_details.cod_order', $cod_order)
                                ->update(['products.quantity' => '+1']);

        $data_remove = Order::findOrFail($cod_order);
        $data_remove->delete();
    }
}
