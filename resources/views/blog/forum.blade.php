@extends('layout.master')

@section('content')

@php $locale = session()->get('locale'); @endphp
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">@lang('lang.text_hello') {{ $email }}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        @guest  
            <a class="nav-link" href="{{route('user.registration')}}">Registration</a>
            <a class="nav-link" href="{{route('login')}}">Login</a>
        @else
          
            <a class="nav-link" href="{{route('logout')}}">Logout</a>
        @endguest
            <a class="nav-link @if($locale=='en') bg-secondary @endif" href="{{route('lang', 'en')}}">En <i class="flag flag-canada"></i></a>    
            <a class="nav-link @if($locale=='fr') bg-secondary @endif" href="{{route('lang', 'fr')}}">Fr <i class="flag flag-france"></i></a> 
            
      </div>
    </div>
  </div>
</nav>

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
                            <a href="{{ route('blog.show', $post->id)}}">{{ $post->title }}
                            
                                <div class="card-body">  {{ $post->body }}    </div>
                            
                            </a>

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