@extends('layouts.app')

@section('content')

<div class="container">
  <div class="col m12">
    <h3 class="header center " style="padding:-5px">Bienvenido f</i></h3>

  </div>
  <h2>Posts</h2>
@foreach($dataUser->posts as $post)
    <h3>{{ $post->title }}</h3>
    <p>
        {{ $post->body }}
    </p>
@endforeach
</div>

@endsection