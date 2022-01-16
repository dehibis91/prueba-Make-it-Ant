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
        <a href="/post/create" class="btn btn-secondary" style="float: right;">Add New Post</a>

        </div>
        
        @foreach($dataPost  as $post)
            <div class="col-md-6">
                <ul class="list-group mt-2 mb-4">                    
                    <li class="list-group-item active">{{$post['id']}} - {{$post['title']}}</li>
                    <li class="list-group-item ">{{$post['body']}}</li>
                <form action="/post/{{$post['id']}}" method="POST">
                    @csrf
                    @method('DELETE')<!--El boton submit ejecuta la acción del formulario-->
                    <a href="/post/{{$post['id']}}/edit" type="btn" class="btn btn-success btn-block">Edit</a>
                    <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Está seguro que desea eliminar ?')">Delete</button>
                </form>
                
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection
