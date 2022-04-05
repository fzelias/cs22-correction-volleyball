<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::where("id", "!=", 1)->get();
        return view("back.equipes.all", compact("equipes"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("back.equipes.create");
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
            "pays" => "required|max:255",
            "continent" => "required|max:255",
            "attaquant" => "required|integer",
            "central" => "required|integer",
            "defenseur" => "required|integer",
            "remplacant" => "required|integer",
        ]);

        $equipe = new Equipe;
        $equipe->nom = $request->nom;
        $equipe->pays = $request->pays;
        $equipe->continent = $request->continent;
        $equipe->attaquant = $request->attaquant;
        $equipe->central = $request->central;
        $equipe->defenseur = $request->defenseur;
        $equipe->remplacant = $request->remplacant;
        $equipe->created_at = now();

        $equipe->save();

        return redirect()->route("equipe.index")->with("success", "L'équipe a bien été créée !");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function show(Equipe $equipe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function edit(Equipe $equipe)
    {
        return view("back.equipes.edit", compact("equipe"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipe $equipe)
    {
        $request->validate([
            "nom" => "required|max:255",
            "pays" => "required|max:255",
            "continent" => "required|max:255",
            "attaquant" => "required|integer",
            "central" => "required|integer",
            "defenseur" => "required|integer",
            "remplacant" => "required|integer",
        ]);

        $equipe->nom = $request->nom;
        $equipe->pays = $request->pays;
        $equipe->continent = $request->continent;
        $equipe->attaquant = $request->attaquant;
        $equipe->central = $request->central;
        $equipe->defenseur = $request->defenseur;
        $equipe->remplacant = $request->remplacant;
        $equipe->created_at = now();

        $equipe->save();

        return redirect()->route("equipe.index")->with("success", "L'équipe a bien été modifiée !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Equipe  $equipe
     * @return \Illuminate\Http\Response
     */
    public function destroy(Equipe $equipe)
    {
        foreach ($equipe->joueurs as $joueur) {
            $joueur->equipe_id = 1;
            $joueur->save();
        }
        $equipe->delete();
        return redirect()->back()->with("success", "L'équipe a bien été supprimée !");
    }
}
