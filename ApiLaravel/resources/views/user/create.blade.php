@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<div class="container">
    <div class="row">
        <div class="col-md-6">

        </div>
        <div class="col-md-6">
            <a href="/user" class="btn btn-primary" style="float: right;">Volver</a>

        </div>

    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>New User Local</h2>
                </div>
                <form action="/user" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                        @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                        @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}">
                        @if ($errors->has('password'))
                        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">City</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}">
                        @if ($errors->has('city'))
                        <small class="form-text text-danger">{{ $errors->first('city') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Company</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{ old('company') }}">
                        @if ($errors->has('company'))
                        <small class="form-text text-danger">{{ $errors->first('company') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary mb-2">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection