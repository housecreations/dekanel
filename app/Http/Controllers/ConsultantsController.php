<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Consultant;

use Laracasts\Flash\Flash;

class ConsultantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $consultants = Consultant::search($request->name)->orderBy('position', 'ASC')->paginate(10);

        return view('admin.consultants.index', ['consultants' => $consultants]);
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
        if ($request->file('profile_image_url')) {

            $file = $request->file('profile_image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/consultants/';
            $file->move($path, $name);

        }

        $consultant = new Consultant();
        $consultant->name = $request->name;
        $consultant->last_name = $request->last_name;
        $consultant->description = $request->description;
        $consultant->profile_image_url = $name;

        if(Consultant::orderBy('position', 'desc')->first())
            $last_position = Consultant::orderBy('position', 'desc')->first()->position;
        else
            $last_position = 0;

        $consultant->position = $last_position + 1;

        $consultant->save();

        Flash::success("Consultor registrado");

        return back();
    }


    public function changePosition(Request $request){

        if($request->ajax()){

            $select_consultant = Consultant::wherePosition($request->select_id)->first();
            $other_consultant = Consultant::wherePosition($request->other_id)->first();

            $aux = $select_consultant->position;

            $select_consultant->position = $other_consultant->position;
            $select_consultant->save();
            $other_consultant->position = $aux;
            $other_consultant->save();
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

        $consultant = Consultant::find($id);

        return response()->json(['consultant' => $consultant]);
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
        $consultant = Consultant::find($request->edit_consultant_id);

        if ($request->file('edit_profile_image_url')) {
            $file = $request->file('edit_profile_image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/consultants/';
            $file->move($path, $name);

            $consultant->profile_image_url = $name;

        }

        $consultant->name = $request->edit_name;
        $consultant->last_name = $request->edit_last_name;
        $consultant->description = $request->edit_description;

        $consultant->save();

        Flash::success("Consultor actualizado");

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

        $consultant = Consultant::destroy($request->consultant_id);

        Flash::success("Consultor eliminado");

        return back();
    }
}
