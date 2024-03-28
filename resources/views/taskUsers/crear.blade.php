@extends('layouts.template')

@section('title', 'Agregar usuario al task')

@section('content')
  <h1> Agregar user a task </h1>
  <form action="{{route('tasks.user.store', [$idTask, $idUser])}}" method="POST">
    @csrf
  
    <label> 
      id User
      <input type="number" name="idUser">
    </label>

    <br>
    <label>
      id task
      <input type="number" name="idDashboard">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
