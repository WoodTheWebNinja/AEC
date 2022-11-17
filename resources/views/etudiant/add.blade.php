@extends('layout.master')

@section('content')

<h1 class=""> Ajouter  Un Eleve </h1>

<form action="" method="post">
    @csrf
        <div class="card-header">
            Formulaire
        </div>
        <div class="card-body">   
                <div class="control-group col-12">
                    <label for="nom">Nom Étudiant</label>
                    <input type="text" id="nom" name="nom" class="form-control">
                </div>
                <div class="control-group col-12">
                    <label for="adresse">adresse</label>
                    <input type="text" id="adresse" name="adresse" class="form-control">

                </div>
                <div class="control-group col-12">
                    <label for="phone">phone</label>
                    <input type="text" id="phone" name="phone" class="form-control">

                </div>

                <div class="control-group col-12">
                    <label for="email">email</label>
                    <input type="text" id="email" name="email" class="form-control">

                </div>

                <div class="control-group col-12">
                    <label for="date_de_naissance">date_de_naissance</label>
                    <input type="date" id="date_de_naissance" name="date_de_naissance" class="form-control">

                </div>


                <div class="control-group col-12">
                    <label for="villes">Ville</label>
                    <select name="villes_id" id="villes" class="form-control">
                        <option value="">Selectionnez une ville</option>
                    @foreach($villes as $villes)
                        <option value="{{$villes->id}}">{{$villes->nom}}</option>
                    @endforeach
                    </select>
                </div>
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection