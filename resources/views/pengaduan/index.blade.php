@extends('master')

@section('judul')
    <h1>Table</h1>
@endsection

@section('content')
<div class="card card-white">
    <div class="card-header ">
      <h3 class="card-title"></h3>
      <div class="col card-header text-right">
      @if (auth()->user()->level == 'masyarakat')
      <a class="btn btn-primary"  href="{{ route('pengaduan.create') }}">
        <i class="fas fa-plus"></i>Pengaduan</a>
      @endif

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example2" class="table table-bordered table-hover">
        <thead>
        <tr>
          <th>No</th>
          <th>Tanggal Pengaduan</th>
          <th>Isi Laporan</th>
          <th>Status</th>
          <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($pengaduans as $item)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->tgl_pengaduan }}</td>
            <td>{{ $item->isi_laporan }}</td>
            <td>{{ $item->status == '0' ? 'Belum' : $item->status }}</td>
            <td>
              <form action="{{ route('pengaduan.destroy', $item->id) }}" method="POST">
                @if (auth()->user()->level == 'masyarakat')
                  @if ($item->status == '0')
                      <a class="btn btn-primary"  href="pengaduan/{{ $item->id }}">Detail</a>
                      <a class="btn btn-warning" href="{{ route('pengaduan.edit',  $item->id) }}">Edit</a>
                      @csrf
                      @method('DELETE')
                      <input type="submit" Class="btn btn-danger" value="Delete">
                    @else
                      <a class="btn btn-primary"   href="pengaduan/{{ $item->id }}">Detail</a>
                    @endif
                @else
                  <a class="btn btn-primary"  href="/pengaduan/{{ $item->id }}/">Detail</a>
                  @if ($item->status == 'selesai')
                  <a class="btn btn-secondary"  href="/user">Cetak</a>

                  @else
                  <a class="btn btn-secondary"  href="{{ route('tanggapan.create', $item->id) }}">Tanggapan</a>
                  @endif
                @endif
                </form>
              </td>
            </tr>
            @empty
          
        @endforelse
            </table>
  </div>

    <!-- Optional JavaScript; choose one of the two!

     Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
@endsection 