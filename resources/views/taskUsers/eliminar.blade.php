@extends('layouts.template')

@section('title', 'Eliminar usuario del dashboard')

@section('content')
  <h1> Eliminar user del dashboard </h1>
  <form action="{{route('tasks.user.destroy', [$idTask, $idUser])}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Seguro que desea eliminar?')"> Eliminar </button>
  </form>
@endsection
