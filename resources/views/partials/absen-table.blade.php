<table class="table">
  <thead class="table-white table-striped-columns">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th colspan="4" scope="col" class="text-center">Absen</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
    @foreach ($siswa as $s)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $s->nama }}</td>
      <!-- Add your input fields for Absen options here -->
    </tr>
    @endforeach
  </tbody>
</table>
