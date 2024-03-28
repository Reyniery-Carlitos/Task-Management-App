@extends('layouts.template')

@section('title', 'Eliminar dashboard')

@section('content')
  <h1> Eliminar dashboard </h1>
  <form action="{{route('dashboards.destroy', $dashboard)}}" method="POST">
    @csrf
    @method('DELETE')

    <button type="submit" onclick="return confirm('Estas seguro de eliminar?')"> Eliminar dashboard </button>
  </form>
@endsection
