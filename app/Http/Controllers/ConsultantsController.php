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
        $consultants = Consultant::search($request->name)->orderBy('id', 'DESC')->paginate(6);

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
        $consultant->speciality = $request->speciality;
        $consultant->profile_image_url = $name;
        $consultant->save();

        Flash::success("Consultor registrado");

        return back();
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
        $consultant->speciality = $request->edit_speciality;
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
