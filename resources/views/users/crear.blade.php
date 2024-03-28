@extends('layouts.template')

@section('title', 'Crear user')

@section('content')
  <h1> Crear user </h1>
  <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
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
      <input type="text" name="role">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
