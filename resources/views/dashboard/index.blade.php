@extends('dashboard/layouts/template')
@section('container')
  <h1>{{ auth()->user()->name }}</h1>
@endsection