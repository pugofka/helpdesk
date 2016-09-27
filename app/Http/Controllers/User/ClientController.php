<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\UserController;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Http\Requests;

class ClientController extends UserController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('pages.clients', compact('clients'));
    }


    public function getAllUserClients(){
        $clients = Client::with('contracts')->get();

        if (count($clients) === 0) {
            return response()->json(['message' => 'Could not find clients'], 200);
        }

        //return response($clients->toArray(), 200);
        return response()->json(['message' => 'Clients retrieved successfully', 'data' => $clients->toArray()], 200);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $id->delete();

        return response()->json(['message' => 'Клиент успешно удален', 200]);
    }
}
