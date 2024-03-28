@extends('layouts.template')

@section('title', 'login')

@section('content')
  <h1> Login </h1>
  <form action="{{route('login')}}" method="POST">
    @csrf
    <label> 
      Email
      <input type="text" name="email">
    </label>

    <br>
    <label>
      Password
      <input type="password" name="password">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
