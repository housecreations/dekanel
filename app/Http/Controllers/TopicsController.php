<?php

namespace App\Http\Controllers;

use App\SubTopic;
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

        $workshops = $product->topics()->search($request->name)->orderBy('position', 'ASC')->paginate(10);

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

        if(Topic::orderBy('position', 'desc')->first())
            $last_position = Topic::orderBy('position', 'desc')->first()->position;
        else
            $last_position = 0;

        $workshop->position = $last_position + 1;

        $workshop->save();

        Flash::success("Taller registrado");

        return back()->with('product', $product);
    }

    public function changePosition(Request $request){

        if($request->ajax()){

            $select_topic = Topic::wherePosition($request->select_id)->first();
            $other_topic = Topic::wherePosition($request->other_id)->first();

            $aux = $select_topic->position;

            $select_topic->position = $other_topic->position;
            $select_topic->save();
            $other_topic->position = $aux;
            $other_topic->save();
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

            $workshop = Topic::find($id);

            return response()->json(['workshop' => $workshop]);
        }
    }

    public function showDescription(Request $request, $id)
    {
        if($request->ajax()){

            $workshop = Topic::find($id);
            $workshopDescriptions = $workshop->subTopics;

            return response()->json(['workshopDescriptions' => $workshopDescriptions]);
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

    public function updateDescription(Request $request, $id)
    {

        $options = $request->except('_token', '_method', 'workshop_id');

        $workshop = Topic::find($request->workshop_id);

        $workshop->subTopics()->delete();

        foreach ($options as $option){

            $description = new SubTopic();
            $description->title = $option;
            $description->topic_id = $workshop->id;
            $description->save();


        }

        Flash::success("Taller actualizado");

        return back()->with('product', $workshop->product)->with('workshop', $workshop);


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
