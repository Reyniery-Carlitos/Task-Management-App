@extends('layouts.template')

@section('title', 'Crear dashboard')

@section('content')
  <h1> Crear dashboard </h1>
  <form action="{{route('dashboards.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
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
