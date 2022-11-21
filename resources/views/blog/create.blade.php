@extends('layout.master')

@section('content')

<h1 class=""> Forum </h1>

<form action="" method="post">
    @csrf
        <div class="card-header">
            Ajotuer un article 
        </div>
        <div class="card-body">   
                <div class="control-group col-12">
                    <label for="nom">Titre</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="control-group col-12">
                    <label for="adresse">Article</label>
                    <input type="text" id="body" name="body"  class="form-control">

                </div>

                <div class="control-group col-12">
                
                    <input type="text" id="user_id" name="user_id" class="form-control"value="{{$user}}">

                </div>
              
              
              
        </div>
        <div class="card-footer">
            <input type="submit" class="btn btn-success">
        </div>
    </form>
@endsection