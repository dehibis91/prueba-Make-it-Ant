@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

    </div>

    <div class="row">
        <div class="col-md-6">
            <h1>Data Local</h1>
        </div>
        <div class="col-md-6">
            <a href="/user/create" class="btn btn-secondary" style="float: right;">Add New User</a>

        </div>

        
        <div class="col-md-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th class="col-md-1">ID</th>
                        <th class="col-md-2">Name</th>
                        <th class="col-md-2">Email</th>
                        <th class="col-md-2">City</th>
                        <th class="col-md-2">Company</th>
                        <th class="col-md-3">Actions</th>

                    </tr>
                </thead>
                @foreach($dataUser as $user)
                <tbody>
                    <tr>
                        <th scope="row">{{$user['id']}}</th>
                        <td>{{$user['name']}}</td>
                        <td>{{$user['email']}}</td>
                        <td>{{$user['city']}}</td>
                        <td>{{$user['company']}}</td>
                        <td>
                            <form action="/user/{{$user['id']}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <!--El boton submit ejecuta la acción del formulario-->
                                <a href="/user/{{$user['id']}}/edit" type="btn" class="btn btn-success btn-block">Edit</a>
                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Está seguro que desea eliminar ?')">Delete</button>
                                <a href="/user/{{$user->id}}/post/" type="btn" class="btn btn-success btn-block">View Post</a>
                            </form>
                        </td>

                    </tr>
                </tbody>
                @endforeach
            </table>

        </div>
        
    </div>
</div>
@endsection