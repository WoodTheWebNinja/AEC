@extends('layout.master')
@section('title','index')

@section('content')


        
    <div class="student__Title">

    <h1> Liste des Étudiants </h1>
    </div>

    <div class="btn"> <a href="etudiant-create"> Ajouter Un article  </a></div>


    <div class="list__student">
       

        
    <?php  foreach($etudiants as $etudiants ): ?>

    <article class="tile_student" >
        <a href="/etudiant/{{ $etudiants ->id}}">    
        <p class=""> <strong>id:</strong>  {{ $etudiants ->id}}</p> 
        <p class=""> <strong>Nom:</strong>  {{ $etudiants ->nom}}</p> 
        <p class=""> <strong>Adresse:</strong>  {{ $etudiants->phone }} </p> 
        <p class=""> <strong>City:</strong>  {{ $etudiants->villeID }} </p> 


    </a> 
    </article>
    <?php  endforeach ?>

  
    </div>


    </body>
    </html>

@endsection