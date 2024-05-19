<?php

namespace App\Http\Controllers\Api\v1;

use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;

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
        // Obtener los datos de la solicitud
        $requestData = $request->all();
    
        // Crear una nueva orden
        $order = new Order();
        $order->user_id = $requestData['user_id'];
        $order->total = $requestData['total'];
        $order->status = 'pending';
        $order->address = $requestData['address'];
    
        $order->save();
    
        // Asociar productos a la orden en la tabla 'order_products'
        foreach ($requestData['products'] as $productData) {
            $product = Product::find($productData['product_id']);
            if ($product) {
                // Asociar el producto con la cantidad a la orden
                $order->products()->attach($product->id, ['quantity' => $productData['quantity']]);
            } else {
                // Manejar el caso en que el producto no se encuentra
                return response()->json(['error' => 'Producto no encontrado'], 404);
            }
        }
    
        // Retornar la respuesta con la orden creada
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
