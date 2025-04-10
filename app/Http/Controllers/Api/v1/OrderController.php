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

        $order->total = $requestData['total'];
        $order->nombre = $requestData['nombre'];
        $order->cedula = $requestData['cedula'];
        $order->telefono = $requestData['telefono'];
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
    public function update()
    {
    
    }

    public function destroy(Order $order)
    {
        //
    }
    public function updateStatus($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Actualizar el estado de la orden (cambiar 'status' según tus necesidades)
        $order->status = 'approved'; // Por ejemplo, cambiando el estado a 'approved'
        $order->save();

        return response()->json(['message' => 'Order status updated successfully']);
    }
    public function aproved(){
        $orders = Order::where('status', 'approved')->get();
        return response()->json($orders);
    }

    public function pending(){
        $orders = Order::where('status', 'pending')->get();
        return response()->json($orders);
    }
    public function porcedula(  Request $request ){
       // Validar la solicitud y asegurarse de que se proporcione la cédula
    $request->validate([
        'cedula' => 'required|string',
    ]);
    // Obtener las órdenes por cédula
    $orders = Order::where('cedula', $request->cedula)->get();

    // Retornar las órdenes en formato JSON
    return response()->json($orders, 200);
    }


}
