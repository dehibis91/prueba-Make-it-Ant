@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h1>Edit post {{$dataPost->title}}</h1>
        </div>
        <div class="col-md-6">
        <a href="/post" class="btn btn-primary" style="float: right;">Volver</a>

        </div>
        
    </div>
    <form method="POST" action="/post/{{$dataPost->id}}">
    @csrf
    @method('PUT')
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ old('title', $dataPost->title) }}" required autocomplete="name" autofocus>
            @if ($errors->has('title'))
            <small class="form-text text-danger">{{ $errors->first('title') }}</small>
            @endif

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Body</label>
            <input id="body" type="text" class="form-control @error('body') is-invalid @enderror" name="body" value="{{ old('body', $dataPost->body) }}" required autocomplete="body" autofocus>

            @if ($errors->has('body'))
            <small class="form-text text-danger">{{ $errors->first('body') }}</small>
            @endif
        </div>
        <div class="form-group">
        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
        </div>
    </form>
</div>
@endsection