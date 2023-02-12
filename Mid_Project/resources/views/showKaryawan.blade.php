@extends ('template')

@section ('title', 'show karyawan')

@section ('body')
    <div class="card d-flex m-5" style="width: 18rem;">
    <div class="card-body">
      <p class="card-text"><b>Nomor Karyawan:</b> {{$karyawan->id}}</p>
      <p class="card-text"><b>Nama:</b> {{$karyawan->Nama}}</p>
      <p class="card-text"><b>Umur:</b> {{$karyawan->Umur}}</p>
      <p class="card-text"><b>Alamat:</b> {{$karyawan->Alamat}}</p>
      <p class="card-text"><b>Nomor Telepon:</b> {{$karyawan->NomorHp}}</p>
      <a href="/" class="btn btn-primary">Kembali</a> <br><br>
      <a href="{{route('edit', $karyawan->id)}}" class="btn btn-success">Perbarui Karyawan</a> <br><br>
      <form action="/delete-karyawan/{{$karyawan->id}}" method="POST">
        @csrf
        @method('delete')
        <button class="btn btn-danger">Hapus Karyawan</button>
      </form> 
    </div>
  </div>
@endsection