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
                    <h2>Edit User Local</h2>
                </div>
                <form action="/user/{{$dataUser->id}}" method="POST">
                @csrf
                @method('PUT')
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Name</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="name" name="name" value="{{ old('name', $dataUser->name) }}" required autocomplete="name" autofocus>
                        @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dataUser->email) }}" required autocomplete="email" autofocus>
                        @if ($errors->has('name'))
                        <small class="form-text text-danger">{{ $errors->first('name') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password', $dataUser->password) }}" required autocomplete="password" autofocus>
                        @if ($errors->has('password'))
                        <small class="form-text text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">City</label>
                        <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $dataUser->city) }}" required autocomplete="city" autofocus>
                        @if ($errors->has('city'))
                        <small class="form-text text-danger">{{ $errors->first('city') }}</small>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Company</label>
                        <input type="text" class="form-control" id="company" name="company" value="{{ old('company', $dataUser->company) }}" required autocomplete="company" autofocus>
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