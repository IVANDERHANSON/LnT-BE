@extends('template')

@section('title', 'edit karyawan')

@section('body')

<div class="m-5">
  <h1 class="text-center">Perbarui Karyawan</h1>
  <form action="/update-karyawan/{{$karyawan->id}}" method="POST">
      @csrf
      @method('patch')
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
        <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nama" value="{{$karyawan->Nama}}">
        @error('Nama')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Umur</label>
        <input type="number" class="form-control @error('Umur') is-invalid @enderror" id="exampleInputPassword1" name="Umur"  value="{{$karyawan->Umur}}">
        @error('Umur')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="exampleInputPassword1" name="Alamat"  value="{{$karyawan->Alamat}}">
        @error('Alamat')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
          <input type="text" class="form-control @error('NomorHp') is-invalid @enderror" id="exampleInputPassword1" name="NomorHp"  value="{{$karyawan->NomorHp}}">
          @error('NomorHp')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
      <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
</div>

@endsection