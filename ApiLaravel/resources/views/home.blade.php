@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-6">
            <h1>Bienvenido</h1>
        </div>
        <p>Haz clic en los botones para sincronizar a la Bd la data desde el api para usuario y sus post</p>
        <div class="col-md-3">
            <a href='/user/save'><button>Guardar data de Usuarios</button></a>
        </div>
        <div class="col-md-3">
            <a href='/post/save'><button>Guardar data de post</button></a>
        </div>
        <div class="col-md-3">
            <a href='/user'><button>Ir al dasboard usuario</button></a>
        </div>
        

    </div>
</div>
@endsection
