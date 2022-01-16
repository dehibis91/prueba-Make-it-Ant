@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-6">
        <h1>New post Local</h1>
        </div>
        <div class="col-md-6">
        <a href="/post" class="btn btn-primary" style="float: right;">Volver</a>

        </div>
        
    </div>
    <form action="/post" method="POST">
    @csrf
        <div class="form-group">
            <label for="exampleFormControlInput1">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
            @if ($errors->has('title'))
            <small class="form-text text-danger">{{ $errors->first('title') }}</small>
            @endif

        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Body</label>
            <textarea class="form-control" id="body" name="body" rows="3" value="{{ old('title') }}"></textarea>
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