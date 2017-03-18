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

        $images = CarouselImage::all();

        return view('admin.index')->with('images', $images);

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

        $image->save();

        Flash::success("Imagen actualizada");

        return back();


    }

    public function destroyCarousel(Request $request)
    {
        $image = CarouselImage::find($request->delete_image_id);

        $image->delete();

        Flash::success("Imagen eliminada");

        return back();


    }
}
