<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Product;

use Laracasts\Flash\Flash;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::search($request->name)->orderBy('id', 'DESC')->paginate(6);

        return view('admin.products.index', ['products' => $products]);
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

        $product = new Product();
        $product->name = $request->name;


        $pos = strpos($request->description, '</cut>');

        if ($pos !== false){

            $desc = explode('</cut>', $request->description);
            $product->description = $desc[0].$desc[1];
            $product->short_description = $desc[0];
        }else{
            $product->description = $request->description;
            $product->short_description = $product->description;
        }


        if ($request->file('image_url')) {

            $file = $request->file('image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/products/';
            $file->move($path, $name);

        }

        $product->image_url = $name;

        if ($request->file('consultant_image_url')) {

            $file = $request->file('consultant_image_url');
            $consultant_name = 'Dekanel_Consulant_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/products/';
            $file->move($path, $consultant_name);

        }

        $product->consultant_image_url = $consultant_name;

        $product->save();

        Flash::success("Producto registrado");

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

            $product = Product::find($id);

            return response()->json(['product' => $product]);
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
        $product = Product::find($request->edit_product_id);


        $pos = strpos($request->edit_description, '</cut>');

        if ($pos !== false){

            $desc = explode('</cut>', $request->edit_description);
            $product->description = $desc[0].$desc[1];
            $product->short_description = $desc[0];
        }else{
            $product->description = $request->edit_description;
            $product->short_description = $product->description;
        }

        $product->name = $request->edit_name;

        if ($request->file('edit_image_url')) {
            $file = $request->file('edit_image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/products/';
            $file->move($path, $name);

            $product->image_url = $name;

        }
        if ($request->file('edit_consultant_image_url')) {
            $file = $request->file('edit_consultant_image_url');
            $consultant_name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/products/';
            $file->move($path, $consultant_name);

            $product->consultant_image_url = $consultant_name;

        }


        $product->save();

        Flash::success("Producto actualizado");

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

        $product = Product::destroy($request->product_id);

        Flash::success("Producto eliminado");

        return back();
    }
}
