@extends('layouts.template')

@section('title', 'Actualizar user')

@section('content')
  <h1> Actualizar user </h1>
  <form action="{{route('users.update', $user)}}" method="POST" enctype="multipart/form-data">
    @csrf

    @method('PUT')
    <label> 
      name
      <input type="text" name="name">
    </label>

    <br>
    <label>
      lastname
      <input type="text" name="lastname">
    </label>

    <br>
    <label>
      email
      <input type="text" name="email">
    </label>

    <br>
    <label>
      password
      <input type="text" name="password">
    </label>

    <br>
    <label>
      avatar
      <input type="file" name="avatar">
    </label>

    <br>
    <label>
      rol
      <input type="text" name="rol">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
