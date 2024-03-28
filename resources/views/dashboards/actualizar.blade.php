@extends('layouts.template')

@section('title', 'Actualizar dashboard')

@section('content')
  <h1> Actualizar dashboard </h1>
  <form action="{{route('dashboards.update', $dashboard)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <label> 
      Title
      <input type="text" name="title">
    </label>

    <br>
    <label>
      owner
      <input type="number" name="owner">
    </label>

    <br>
    <label>
      avatar
      <input type="file" name="avatar">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
