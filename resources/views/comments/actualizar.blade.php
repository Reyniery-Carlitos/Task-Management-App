@extends('layouts.template')

@section('title', 'Actualizar comment')

@section('content')
  <h1> Actualizar comment </h1>
  <form action="{{route('comments.update', $comment)}}" method="POST">
    @csrf
    @method('PUT')
    <label> 
      Content
      <input type="text" name="content">
    </label>

    <br>
    <label>
      task
      <input type="number" name="task">
    </label>

    <br>
    <label>
      user
      <input type="number" name="user">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
