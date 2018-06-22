@extends('layouts.app')

@section('title','Trainer Edit')

@section('content')

    <form class="form-group" method ="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data" >
        {{ method_field('PUT') }}
        {{csrf_field()}}

        <div class="form-group">
            <label for="">Nombre</label>
            <input type="text" name="name" class="form-control" value="{{$trainer->name}}">
        </div>

        <div class="form-group">
            <label for="">Descripcion</label>
            <input type="text" name="description" value="{{$trainer->description}}" class="form-control">
        </div>

        <div class="form-group">
            <label for="">Avatar</label>
            <input type="file" name="avatar">
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>

@endsection()