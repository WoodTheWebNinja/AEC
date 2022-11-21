@extends('layout.master')
@section('content')
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 pt-4">
                    <div class="card">
                        <h3 class="card-header text-center">
                            Enregistrer
                        </h3>
                        <div class="card-body">
                            @if(session('success'))
                                <div class="alert alert-success">
                                    {{session('success')}}
                                </div>
                            @endif
                            <form action="{{route('user.store')}}" method="post">
                                @csrf                               

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Nom Étudiant" class="form-control" name="nom" value="{{old('nom')}}">
                                    @if ($errors->has('nom'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('nom')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="adresse" class="form-control" name="adresse" value="{{old('adresse')}}">
                                    @if ($errors->has('adresse'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('adresse')}}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <input type="text" placeholder="Téléphone" class="form-control" name="phone" value="{{old('phone')}}">
                                    @if ($errors->has('phone'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('phone')}}
                                        </div>
                                    @endif
                                </div>

                             

                                <div class="form-group mb-3">
                                    <input type="date" placeholder="Date de naissance" class="form-control" name="date_de_naissance" value="{{old('date_de_naissance')}}">
                                    @if ($errors->has('date_de_naissance'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('date_de_naissance')}}
                                        </div>
                                    @endif
                                </div>


                                <div class="form-group mb-3">
                                    <select name="villes_id" id="villes" class="form-control">
                                        <option value="">Selectionnez une ville</option>
                                    @foreach($villes as $villes)
                                        <option value="{{$villes->id}}">{{$villes->nom}}</option>
                                    @endforeach
                                    </select>
                                </div>

                                
                                <div class="form-group mb-3">
                                    <input type="email" placeholder="email" class="form-control" name="email" value="{{old('email')}}">
                                    @if ($errors->has('email'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('email')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group mb-3">
                                    <input type="password" placeholder="password" class="form-control" name="password">
                                    @if ($errors->has('password'))
                                        <div class="text-danger mt-2">
                                            {{$errors->first('password')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="d-grid mx-auto">
                                    <input type="submit" value="Sauvegarder" class="btn btn-dark btn-block">
                                </div>
                            </form>       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection