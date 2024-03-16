@extends('dashboard/layouts/template')
@section('container')
  <h1>{{ auth()->user()->name }} adalah saya</h1>
@endsection