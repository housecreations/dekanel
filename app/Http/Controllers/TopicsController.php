<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Product;
use App\Topic;

use Laracasts\Flash\Flash;


class TopicsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {


        $product = Product::find($id);

        $workshops = $product->topics()->search($request->name)->orderBy('id', 'DESC')->paginate(6);

        return view('admin.products.workshops.index', ['workshops' => $workshops, 'product' => $product]);
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

        $product = Product::find($request->product_id);

        $workshop = new Topic();
        $workshop->name = $request->name;

        if ($request->file('image_url')) {

            $file = $request->file('image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/workshops/';
            $file->move($path, $name);
            $workshop->image_url = $name;

        }

        $workshop->product_id = $product->id;

        $workshop->save();

        Flash::success("Taller registrado");

        return back()->with('product', $product);
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

            $workshop = Topic::find($id);

            return response()->json(['workshop' => $workshop]);
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
        $workshop = Topic::find($request->edit_workshop_id);

        if ($request->file('edit_image_url')) {
            $file = $request->file('edit_image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/workshops/';
            $file->move($path, $name);

            $workshop->image_url = $name;

        }

        $workshop->name = $request->edit_name;
        $workshop->save();

        Flash::success("Taller actualizado");

        return back()->with('product', $workshop->product);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $workshop = Topic::find($request->workshop_id);
        $product = $workshop->product;
        $workshop->delete();

        Flash::success("Taller eliminado");

        return back()->with('product', $product);
    }
}
