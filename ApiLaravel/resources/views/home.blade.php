@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h1>Data of Api</h1>
        </div>
        <div class="col-md-3">
            <a href='/save'><button>Guardar data en Base de datos</button></a>
        </div>
        <div class="col-md-3">
            <a href='/post'><button>Ir al dasboard</button></a>
        </div>
        
        @foreach($postArray  as $post)
            <div class="col-md-6">
                <ul class="list-group mt-2 mb-4">                    
                    <li class="list-group-item active">{{$post['id']}} - {{$post['title']}}</li>
                    <li class="list-group-item ">{{$post['body']}}</li>
                </ul>
            </div>
        @endforeach
    </div>
</div>
@endsection
