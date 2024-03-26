@extends('dashboard/layouts/template')
@section('container')

  <h1 class="mt-5">ini adalah user edit</h1>

  <form action="/daftar-user/{{ $user->id }}" method="post">
    @method('put')
    @csrf

    {{-- nama --}}
    <div class="form-floating mb-3">
      <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama" name="name" value="{{ old('nama', $user->name) }}" autofocus required>
      <label for="nama">Nama</label>
      @error('name')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
      <label for="role">Role</label>
      <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" autofocus required>
          <option value="1" {{ old('role', $user->role) == 1 ? 'selected' : '' }}>Guru</option>
          <option value="2" {{ old('role', $user->role) == 2 ? 'selected' : '' }}>Moderator</option>
      </select>
      @error('role')
      <div class="invalid-feedback">
          {{ $message }}
      </div>
      @enderror
  </div>
  

        
    <a href="/daftar-user" class="btn btn-secondary">Kembali</a>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@endsection