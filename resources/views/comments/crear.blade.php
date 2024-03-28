@extends('layouts.template')

@section('title', 'Crear comment')

@section('content')
  <h1> Crear comment </h1>
  <form action="{{route('comments.store')}}" method="POST">
    @csrf
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
