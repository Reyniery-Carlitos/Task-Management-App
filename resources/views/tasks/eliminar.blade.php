@extends('layouts.template')

@section('title', 'Eliminar task')

@section('content')
  <h1> Eliminar task </h1>
  <form action="{{route('tasks.destroy', $task)}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Seguro de eliminar?')"> Eliminar tarea </button>
  </form>
@endsection
