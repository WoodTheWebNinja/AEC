<?php

namespace App\Http\Controllers;
use App\Models\Villes;
use Illuminate\Http\Request;
use App\Models\Etudiant;

class EtudiantPostController extends Controller
{


 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etudiants = Etudiant::all();
       // return $posts; 
       // $posts = BlogPost::select()->where("user_id", "=" ,"1")->get();
       return  view('index', ['etudiants' =>$etudiants ,]); 
    }






     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Etudiant  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $etudiant = Etudiant::find($id);    
          // return $etudiant
        return  view('etudiant', ['etudiant' =>   $etudiant]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Etudiant  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $villes = new Villes;
        $villes = $villes->selectVille('DESC');
        $etudiant = Etudiant::find($id); 
      //  $villeID = Etudiant::find('$villeID');   
        $villesEtudiant  =  Villes::find($etudiant ->villeID); 
     

        return view('etudiant.edit', ['etudiant' => $etudiant , 'villes' => $villes, 
        'villesEtudiant' =>$villesEtudiant, ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
         * @param  \App\Models\Etudiant  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Etudiant $Etudiant)
    {
        $Etudiant->update([
            'nom' => $request->nom,
            'adresse' => $request->adresse,
            'phone' => $request->phone,
            'email' => $request->email,
            'date_de_naissance' => $request->date_de_naissance,
            'villeID' => $request->villes_id
           
        ]);
            
        return redirect(route('etudiant', $Etudiant->id));
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Etudiant  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Etudiant $Etudiant)
    {
        $Etudiant->delete();
        return redirect(route('index'));
    }




}
