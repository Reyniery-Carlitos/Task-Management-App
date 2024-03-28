@extends('layouts.template')

@section('title', 'Eliminar comment')

@section('content')
  <h1> Eliminar comment </h1>
  <form action="{{route('comments.destroy', $comment)}}" method="POST">
    @csrf
    @method('DELETE')
    
    <button type="submit" onclick="return confirm('Estas seguro de eliminar?')"> Eliminar Comentario </button>
  </form>
@endsection
