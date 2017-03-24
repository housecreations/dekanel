<?php

namespace App\Http\Controllers;

use App\Consultant;
use App\Http\Requests;
use App\Product;
use App\Client;
use App\CarouselImage;
use Illuminate\Http\Request;

use App\ApplicationInformation;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $initial_config = ApplicationInformation::all();

        if ($initial_config->isEmpty()){

            $initial_config = new ApplicationInformation();
            $initial_config->option = 'title';
            $initial_config->value = '';
            $initial_config->label = 'Título de la página';
            $initial_config->save();


            $initial_config = new ApplicationInformation();
            $initial_config->option = 'address';
            $initial_config->value = '';
            $initial_config->label = 'Dirección';
            $initial_config->save();

         /*   $initial_config = new ApplicationInformation();
            $initial_config->option = 'logo_url';
            $initial_config->value = '';
            $initial_config->label = 'Logo de la página';
            $initial_config->save();*/

            $initial_config = new ApplicationInformation();
            $initial_config->option = 'phone_number';
            $initial_config->value = '';
            $initial_config->label = 'Teléfono';
            $initial_config->save();

            $initial_config = new ApplicationInformation();
            $initial_config->option = 'email';
            $initial_config->value = '';
            $initial_config->label = 'Correo electrónico';
            $initial_config->save();

            $initial_config = new ApplicationInformation();
            $initial_config->option = 'facebook_url';
            $initial_config->value = '';
            $initial_config->label = 'Página de Facebook';
            $initial_config->save();

            $initial_config = new ApplicationInformation();
            $initial_config->option = 'linked_in_url';
            $initial_config->value = '';
            $initial_config->label = 'Perfil de LinkedIn';
            $initial_config->save();

        }


        $products = Product::all();

        $consultants = Consultant::all();

        $clients = Client::all();

        $carousel = CarouselImage::all();

        return view('welcome_home', ['products' => $products, 'consultants' => $consultants, 'clients' => $clients, 'carousel' => $carousel]);
    }

    public function productShow($slug)
    {

        $product = Product::findBySlug($slug);

        return view('products')->with('product', $product);

    }
}
