<?php

namespace App\Http\Controllers;

use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Http\Request;

use App\Http\Requests;

use App\CarouselImage;

use Laracasts\Flash\Flash;

class AdminController extends Controller
{
    public function index()
    {

        $images = CarouselImage::orderBy('position', 'ASC')->get();

        return view('admin.index')->with('images', $images);

    }

    public function changePosition(Request $request){

        if($request->ajax()){

            $select_carousel = CarouselImage::wherePosition($request->select_id)->first();
            $other_carousel = CarouselImage::wherePosition($request->other_id)->first();


            $aux = $select_carousel->position;

            $select_carousel->position = $other_carousel->position;
            $select_carousel->save();
            $other_carousel->position = $aux;
            $other_carousel->save();
            return response()->json(['status' => 'success']);
        }

    }

    public function changeColor(Request $request){

        if($request->ajax()){



            $select_carousel = CarouselImage::wherePosition($request->id)->first();

            $select_carousel->color_code = $request->color_code;

            $select_carousel->save();

            return response()->json(['status' => 'success']);
        }

    }

    public function storeCarousel(Request $request)
    {

        $image = new CarouselImage();

        if ($request->file('image_url')) {

            $file = $request->file('image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/carousel/';
            $file->move($path, $name);
            $image->image_url = $name;

        }

        if(CarouselImage::orderBy('position', 'desc')->first())
            $last_position = CarouselImage::orderBy('position', 'desc')->first()->position;
        else
            $last_position = 0;

        $image->position = $last_position + 1;

        $image->position_class = $request->position_class;
        $image->text = $request->text;
        $image->color_code = "rgba(255,255,255,1)";
        $image->save();

        Flash::success("Imagen guardada");

        return back();
    }

    public function updateCarousel(Request $request)
    {
        $image = CarouselImage::find($request->edit_image_id);

        if ($request->file('edit_image_url')) {
            $file = $request->file('edit_image_url');
            $name = 'Dekanel_' . time() . "." . $file->getClientOriginalExtension();
            $path = 'images/carousel/';
            $file->move($path, $name);

            $image->image_url = $name;

        }

        $image->position_class = $request->edit_position_class;
        $image->text = $request->edit_text;

        $image->save();

        Flash::success("Imagen actualizada");

        return back();


    }


    public function show(Request $request, $id)
    {
        if($request->ajax()){

            $carousel = CarouselImage::find($id);

            return response()->json(['carousel' => $carousel]);
        }
    }

    public function destroyCarousel(Request $request)
    {
        $image = CarouselImage::find($request->delete_image_id);

        $image->delete();

        Flash::success("Imagen eliminada");

        return back();


    }
}
