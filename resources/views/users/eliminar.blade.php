@extends('layouts.template')

@section('title', 'Eliminar user')

@section('content')
  <h1> Eliminar user </h1>
  <form action="{{route('users.destroy', $user)}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Estas seguro de eliminar?')"> Eliminar user </button>
  </form>
@endsection
