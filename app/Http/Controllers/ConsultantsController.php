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
        $consultants = Consultant::search($request->name)->orderBy('id', 'DESC')->simplePaginate(6);

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
    public function destroy(Request $request, $id)
    {

        $consultant = Consultant::destroy($request->consultant_id);
        
        Flash::success("Consultor eliminado");

        return back();
    }
}
