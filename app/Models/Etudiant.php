<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Illuminate\Database\Eloquent\Factories\ModelNotFoundException;

class Etudiant extends Model
{
   use HasFactory;

   protected $fillable = [
    'nom',
    'adresse',
    'phone',
    'date_de_naissance',
    'villeID',
    'user_id'

];
public function VilleEtudiant(){
    return $this->hasOne('App\Models\Villes', 'id', 'Ville_id');
}
public function EtudiantHasUser(){
    return $this->hasOne('App\Models\User', 'id', 'user_id');
}


}

/*
    public static function find($slug)
        {
            $path = resource_path("students/{$slug}.html");

            if (!file_exists($path)) {
                throw new ModelNotFoundException();
            }

            return cache()->remember("student.{$slug}",1200, fn()=> file_get_contents($path));
        }
*/