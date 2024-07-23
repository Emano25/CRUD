<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Attribut;
use App\Models\Category;
use App\Models\Hotels;
use App\Models\User;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Storage;
use Nette\Utils\Image;

class HotelController extends Controller
{
    public function index(Request $request)
    {
        // User::create([
        //     'name'=>'King',
        //     'email'=>'emmanuelosse83@gmail.com',
        //     'password'=> FacadesHash::make('0000')
        // ]);



        $hotels = Hotels::all();
         $hotels = Hotels::with('attributs')->get();
        //  dd($hotels);
        $categories = category::all();

        return view('index', [
            'hotels' => $hotels,
            'categories' => $categories,

        ]);
    }

    public function create()
    {

        return View('.create', ['categories' => Category::all()],
        ['attributs'=> Attribut::all()]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            // Ajoutez d'autres règles de validation au besoin
        ]);

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);

        $hotel = new Hotels([
            'nom_hotel' => $request->input('nom_hotel'),
            'nom_chambre' => $request->input('nom_chambre'),
            'description' => $request->input('description'),
            'prix' => $request->input('prix'),
            'nombre_lits' => $request->input('nombre_lits'),
            'max_adultes' => $request->input('max_adultes'),
            'max_enfants' => $request->input('max_enfants'),
            'statut' => $request->input('statut'),
            'image_path' => 'images/' . $imageName,
        ]);

        // Associez la catégorie à l'hôtel
        $hotel->category()->associate($request->input('category_id'));
        $hotel->save();

        if ($request->has('attributs')) {
            $hotel->attributs()->attach($request->input('attributs'));
        }


        return redirect()->route('hotel.index');
    }



    public function update(Hotels $hotel, Request $request, )
    {
        // Validez et traitez les autres champs du formulaire

        if ($request->hasFile('image')) {
            // Supprimez l'ancienne image du stockage
            Storage::delete('images/' . $hotel->image_path);

            // Traitez la nouvelle image
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Redimensionnez ou modifiez l'image selon vos besoins
            $resizedImage = Image::make($image->getRealPath())
                ->resize(300, 200)
                ->encode($image->getClientOriginalExtension());

            // Enregistrez l'image redimensionnée
            Storage::put('images/' . $imageName, $resizedImage);

            // Mettez à jour le chemin de l'image dans la base de données
            $hotel->update(['image_path' => 'images/' . $imageName]);
        }

        // Reste du code de mise à jour des champs
        $hotel->update($request->all());


        return redirect()->route('hotel.index');
    }


    public function edit(Hotels $hotel)
    {
        $categories = Category::all();
        return view('.edit', [
            'hotel' => $hotel,
            'categories' => $categories
        ]);
    }

    public function delete($id)
    {

        Hotels::destroy($id);
        return back();
    }




}
