@extends('dashboard/layouts/template')

@section('container')

<div class="d-grid gap-2 mt-4">
  @foreach ($kelas as $k)
    <a href="/data-absen/{{ $k->id }}" class="btn btn-outline-secondary py-4" type="button">{{ $k->nama }}</a>
  @endforeach
</div>
@endsection