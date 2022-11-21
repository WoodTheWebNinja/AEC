<?php

namespace App\Http\Controllers;
use App\Models\Villes;
use App\Models\Etudiant;
use Illuminate\Http\Request;
use DB;

class CreateController extends Controller
{
    // Add student part 1 (Formulaire)
    public function create(){
        $villes = new Villes;
        $villes = $villes->selectVille('DESC');
        return view('etudiant.add', ['villes' =>  $villes]);
    }
    
    // Add DB part 2

    public function store(Request $request)
    {
        //print_r($_POST);
        
        $newEtudiant = Etudiant::create([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'villeID' => $request->villes_id
           
        ]);
            
        return redirect(route('etudiant', $newEtudiant->id));
    }







}
