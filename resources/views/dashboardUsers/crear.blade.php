@extends('layouts.template')

@section('title', 'Agregar usuario al dashboard')

@section('content')
  <h1> Agregar user a dashboard </h1>
  <form action="{{route('dashboards.user.store', [$idDashboard, $idUser])}}" method="POST">
    @csrf
  
    <label> 
      id User
      <input type="number" name="idUser">
    </label>

    <br>
    <label>
      id Dashboard
      <input type="number" name="idDashboard">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
