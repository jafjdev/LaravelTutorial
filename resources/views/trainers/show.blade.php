@extends('layouts.app')

@section('title','Trainer')

@section('content')

    <img  style="height :200px; width : 200px; background-color:#EFEFEF; margin:20px;"
          class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}" alt="">
    <h5 class="text-center ">{{$trainer->name}}</h5>
    <div class="text-center">
        <p>{{$trainer->description}}</p>
        <a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar.</a>
    </div>

@endsection()