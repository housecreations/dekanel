<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Client;

use Laracasts\Flash\Flash;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $clients = Client::search($request->name)->orderBy('position', 'asc')->paginate(20);

        return view('admin.clients.index', ['clients' => $clients]);
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
        if ($request->file('logo_url')) {

            $file = $request->file('logo_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/clients/';
            $file->move($path, $name);

        }

        $client = new Client();

        $client->logo_url = $name;


        if(Client::orderBy('position', 'desc')->first())
            $last_position = Client::orderBy('position', 'desc')->first()->position;
        else
            $last_position = 0;

        $client->position = $last_position + 1;


        $client->save();

        Flash::success("Cliente registrado");

        return back();
    }



    public function changePosition(Request $request){

        if($request->ajax()){

            $select_client = Client::wherePosition($request->select_id)->first();
            $other_client = Client::wherePosition($request->other_id)->first();

            $aux = $select_client->position;

            $select_client->position = $other_client->position;
            $select_client->save();
            $other_client->position = $aux;
            $other_client->save();
            return response()->json(['status' => 'success']);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        if($request->ajax()){

            $client = Client::find($id);

            return response()->json(['client' => $client]);
        }
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
        $client = Client::find($request->edit_client_id);

        if ($request->file('edit_logo_url')) {
            $file = $request->file('edit_logo_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/clients/';
            $file->move($path, $name);

            $client->logo_url = $name;

        }



        $client->save();

        Flash::success("Cliente actualizado");

        return back();


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $Client = Client::destroy($request->client_id);

        Flash::success("Cliente eliminado");

        return back();
    }
}
