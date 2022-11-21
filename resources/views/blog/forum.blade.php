@extends('layout.master')

@section('content')



<div class="container">
        <div class="row">
            <div class="col-12 text-center pt-2">
                <h1 class="display-one">
                 Forum 
                </h1>
                <hr>
                <div class="row">
                    <div class="col-md-8">
                        <p>Forum pour les etudiants par des etudiants  </p>
                    </div>
                    <div class="col-md-4">
                    <p>Créer votre Forum </p>
                        <a href="{{ route('blog.create')}}" class="btn btn-primary">Ajouter</a>
                    </div>
                </div>    
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Liste des articles</h4>
                    </div>
                    <div class="card-body" >
                        <ul>
                        @forelse($posts as $post)
                            <li><a href="{{ route('blog.show', $post->id)}}">{{ $post->title }}</a></li>
                        @empty
                            <li class="text-danger">Aucun article de blog disponible</li>    
                        @endforelse
                        </ul>
                    </div>

                </div>
                                
            </div>
        </div>
    </div>

@endsection