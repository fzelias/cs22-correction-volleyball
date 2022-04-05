<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use App\Models\Joueur;
use App\Models\Photo;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JoueurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $joueurs = Joueur::all();
        return view("back.joueurs.all", compact("joueurs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        $equipes = Equipe::all();
        return view("back.joueurs.create", compact("roles", "equipes"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nom" => "required|max:255",
            "prenom" => "required|max:255",
            "age" => "required|integer",
            "genre" => "required|max:10",
            "email" => "required|max:255",
            "tel" => "required|max:255",
            "pays" => "required|max:255",
            "role_id" => "required",
            "equipe_id" => "required",
            "img" => "required"
        ]);

        $joueur = new Joueur;

        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->age = $request->age;
        $joueur->genre = $request->genre;
        $joueur->email = $request->email;
        $joueur->tel = $request->tel;
        $joueur->pays = $request->pays;
        $joueur->role_id = $request->role_id;
        $joueur->equipe_id = $request->equipe_id;
        $joueur->created_at = now();

        $joueur->save();

        $photo = new Photo;
        $photo->img = $request->file("img")->hashName();
        $photo->joueur_id = $joueur->id;
        $photo->save();

        $request->file("img")->storePublicly("img", "public");

        return redirect()->route("joueur.index")->with("success", "Le joueur a bien été créé !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function show(Joueur $joueur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function edit(Joueur $joueur)
    {
        $roles = Role::all();
        $equipes = Equipe::all();
        return view("back.joueurs.edit", compact("joueur", "roles", "equipes"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Joueur $joueur)
    {
        $request->validate([
            "nom" => "required|max:255",
            "prenom" => "required|max:255",
            "age" => "required|integer",
            "genre" => "required|max:10",
            "email" => "required|max:255",
            "tel" => "required|max:255",
            "pays" => "required|max:255",
            "role_id" => "required",
            "equipe_id" => "required",
        ]);

        $joueur->nom = $request->nom;
        $joueur->prenom = $request->prenom;
        $joueur->age = $request->age;
        $joueur->genre = $request->genre;
        $joueur->email = $request->email;
        $joueur->tel = $request->tel;
        $joueur->pays = $request->pays;
        $joueur->role_id = $request->role_id;
        $joueur->equipe_id = $request->equipe_id;
        $joueur->updated_at = now();

        if ($request->file("img")) {
            Storage::disk("public")->delete("img/" . $joueur->photo->img);
            $joueur->photo->img = $request->file("img")->hashName();
            $joueur->photo->save();
            $request->file("img")->storePublicly("img", "public");
        }

        $joueur->save();

        return redirect()->route("joueur.index")->with("success", "Le joueur a bien été modifié !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Joueur  $joueur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Joueur $joueur)
    {
        Storage::disk("public")->delete("img/" . $joueur->photo->img);
        $joueur->delete();
        return redirect()->back()->with("success", "Le joueur a bien été supprimé !");
    }
}
