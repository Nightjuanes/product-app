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
        $validatedData = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'total' => 'required|numeric',
            'address' => 'required|string|max:255',
            'products' => 'required|array',
            'products.*.product_id' => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1'
        ]);
    
        $order = new Order();
        $order->client_id = $validatedData['client_id'];
        $order->total = $validatedData['total'];
        $order->status = 'pending';
        $order->address = $validatedData['address'];
        $order->save();
    
        // Asociar productos a la orden
        $products = $validatedData['products'];
        foreach ($products as $item) {
            $product = Product::find($item['product_id']);
            if ($product) {
                Log::info('Adjuntando producto a la orden', ['order_id' => $order->id, 'product_id' => $product->id, 'quantity' => $item['quantity']]);
                $order->products()->attach($item['product_id'], ['quantity' => $item['quantity']]);
            } else {
                Log::error('Producto no encontrado', ['product_id' => $item['product_id']]);
            }
        }
    
        return response()->json(['order' => $order], 201);
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
