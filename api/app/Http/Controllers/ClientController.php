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
}
