@extends('layout.master')
@section('title','Etudiant')

@section('content')
    <body>
    <div class="card  text-center ">
        <div class="card-header">

        <h1> Fiche Etudiant </h1>
        </div>
    </div>

        <div class="card">

            <article class="card-body" >
            
                <p class=""> <strong>id:</strong>  {{ $etudiant ->id}}</p> 
                <p class=""> <strong>Nom:</strong>  {{ $etudiant ->nom}}</p> 
                <p class=""> <strong>email:</strong>  {{ $etudiant->email }} </p> 
                <p class=""> <strong>Date de Naissance:</strong>  {{ $etudiant->date_de_naissance }} </p> 
                <p class=""> <strong>Adresse:</strong>  {{ $etudiant->phone }} </p> 
                <a href="{{route('etudiant.edit', $etudiant->id)}}" class="btn btn-success">Mettre a jour</a>
               <!--   <a href="/etudiant-edit/{{$etudiant ->id}}" class="btn btn-primary">Mettre a jour</a>  -->
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Effacer
                    </button>      
        
            </article>


        </div>

        <div class="card-footer text-center"> 
   
      <a href="/index" class="btn btn-primary btn-lg">Liste Étudiants</a>
        </div>



        <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{route('etudiant.edit', $etudiant->id)}}"  method="post">
                            @method('DELETE')
                            @csrf
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Effacer</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Etes-vous certain d'effacer cet Étudiant : <p>{{ $etudiant ->nom }}</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Effacer</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>



</body>














@endsection