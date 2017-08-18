<?php
/**
 * Created by PhpStorm.
 * User: adailson
 * Date: 17/08/17
 * Time: 16:06
 */

namespace App\Http\Controllers;


use App\Client;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function index()
    {
        return son_response(Client::all());
    }

    public function show($id)
    {
        if(!($client = Client::find($id))){
            throw new ModelNotFoundException("Cliente requisitado não existe");
        }
        return $client;
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           'name' => 'required',
           'email' => 'required',
           'phone' => 'required',
        ]);
        $client = Client::create($request->all());
        return response()->json($client,201);
    }

    public function update(Request $request,$id)
    {
        if(!($client = Client::find($id))){
            throw new ModelNotFoundException("Cliente requisitado não existe");
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);

        $client->fill($request->all());
        $client->save();
        return response()->json($client,200);
    }

    public function destroy($id)
    {
        if(!($client = Client::find($id))){
            throw new ModelNotFoundException("Cliente requisitado não existe");
        }
        $client->delete();
        return response()->json("",204);
    }
}