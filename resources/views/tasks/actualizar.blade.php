@extends('layouts.template')

@section('title', 'Actualizar task')

@section('content')
  <h1> Actualizar task </h1>
  <form action="{{route('tasks.update', $task)}}" method="POST">
    @csrf
    @method('PUT')

    <label> 
      title
      <input type="text" name="title">
    </label>

    <br>
    <label>
      description
      <input type="text" name="description">
    </label>

    <br>
    <label>
      dueDate
      <input type="date" name="dueDate">
    </label>

    <br>
    <label>
      status
      <input type="number" name="status">
    </label>

    <br>
    <label>
      dashboard
      <input type="number" name="dashboard">
    </label>

    <button type="submit"> Enviar formulario </button>
  </form>
@endsection
