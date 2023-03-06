<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientSaveRequest;

class ClientController extends Controller
{
    public function store(ClientSaveRequest $request)
    {
        try {
            Client::create($request->all());

            return response()->json([
                'message' => 'Cliente cadastrado com sucesso',
                'success' => true
            ]);
        } catch (\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'success' => false
            ]);
        }
    }

    public function index(Request $request)
    {
        $clients = Client::orderBy('name', 'asc');
        if($request->name){
            $clients->name($request->name);
        }

        if($request->cpf){
            $clients->cpf($request->cpf);
        }

        return response()->json([
            'data' => $clients->get(),
            'message' => '',
            'success' => true
        ]);
    }

    public function destroy($id)
    {
        try {
            Client::destroy($id);

            return response()->json([
                'message' => 'Cliente removido com sucesso',
                'success' => true
            ]);

        } catch (\Exception $ex) {
            return response()->json([
                'message' => $ex->getMessage(),
                'success' => false
            ]);
        }
    }
}
