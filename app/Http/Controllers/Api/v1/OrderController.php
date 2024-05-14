<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;

use App\Http\Controllers\Api\v1\ProductController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Order::all();
    }
    public function store(Request $request)
    
{
    $requestData = $request->all();

    $order = new Order();
    $order->user_id = $requestData['user_id'];
    $order->total = $requestData['total'];
    $order->product_id=5;

    $order->save();

    $productData = $request->input('products');
    var_dump($productData);
    die();
    foreach ($productData as $item) {
        $product = Product::find($item['product_id']);
        if ($product) {
            $order->products()->attach($product->id, ['quantity' => $item['quantity']]);
        }
    }
    
}

    
    

     
    public function show(Request $request)
    {
        $id = $request->id;
        $order = Order::find($id);

        $order -> load(['user','products']);
        return $order;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $order->fill($request->all());
        $order->save();
        return $request->all();

        $product_id = $request->input('product_id');
    
        $order->products()->attach($product_id, ['quantity' => $request->input('quantity')]);
        return $order;
    }

    public function destroy(Order $order)
    {
        //
    }
}
