<?php

namespace App\Http\Controllers\Api\v1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ClientController extends Controller
{
  
    public function index()// 
    {
        $users = User::all();
        return response()->json($users);

        return User::with(['orders', 'order_product'])->get();
    }

    public function store(Request $request)
    {
        $users = new User;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->adress = $request->adress;
        $users->password = $request->password;  
        $users->save();

        return response()->json([
            "message" => "Cliente creado exitosamente"
        ]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $user = User::find($id);
        $user -> load(['orders']);
        return $user;

    }

    public function update(Request $request, string $id)
    {
        $users = User::find($id);
        
        $users->name = $request->name;
        $users->email = $request->email;
        $users->adress = $request->adress;
        $users->password = $request->password;  
    
        $users->save();

        return response()->json([
            "message" => "Cliente actualizado exitosamente"
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        
        return response()->json([
            "message" => "Cliente eliminado exitosamente"
        ]);

    }
}
