<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cliente;

class ClientController extends Controller
{
  
    public function index()// 

    {
        

        return Cliente::with(['orders', 'order_product'])->get();
    }
    public function store(Request $request)
    {
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number' => 'required|string|max:15',
            // Agrega aquí otras validaciones necesarias
        ]);

        // Crear el cliente
        $client = Client::create($validatedData);

        return response()->json($client, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Obtener el cliente por su ID
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        return response()->json($client, 200);
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
        // Validar la solicitud
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'number' => 'sometimes|required|string|max:15',
            // Agrega aquí otras validaciones necesarias
        ]);

        // Obtener el cliente por su ID
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        // Actualizar el cliente
        $client->update($validatedData);

        return response()->json($client, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Obtener el cliente por su ID
        $client = Client::find($id);

        if (!$client) {
            return response()->json(['error' => 'Cliente no encontrado'], 404);
        }

        // Eliminar el cliente
        $client->delete();

        return response()->json(['message' => 'Cliente eliminado correctamente'], 200);
    }
}