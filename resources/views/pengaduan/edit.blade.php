@extends('master')

@section('content')

<div class="col-md-12">
  <div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">PENGADUAN MASYARAKAT</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

    <form action="{{route ('pengaduan.update', [$pengaduans->id])}}" method="POST"> 
      @csrf 
      @method('put')
      <div class="card-body">
        <div class="form-group">
            <label for="">Nama Pelapor</label>
            <input type="text" name="users_id" id="tanggal" value="{{ $pengaduans->users_id}}" required>
          </div>
          <div class="form-group">
          <label for="">Tanggal Pengaduan</label>
          <input type="text" name="tgl_pengaduan" id="tanggal" value="{{ $pengaduans->tgl_pengaduan }}" required>
        </div>
        <div class="form-group">
            <label for="Alamat">Isi Laporan</label>
            <textarea 
              class="form-control" 
              name="isi_laporan" rows="5" 
              id="isi_laporan" placeholder="isi_laporan">{{ $pengaduans->isi_laporan }}</textarea>
          </div>
          <div class="form-group" >
            <label for="formFile" class="form-label">Foto</label>
            <img src="{{ url('storage/' . $pengaduans->foto) }}" alt="" srcset="">
          </div>

          <div class="card-footer">
           <button type= "submit" class="btn btn-primary" style="float:right">Submit</button>
           <a href="/pengaduan" class="btn btn-secondary ml-3" style="float:left;">Back</a>
      </div>
    </form>
  </div>
</div>
</body>
</html>
@endsection