@extends('template')

@section('title', 'Tambah Karyawan')

@section('body')

<div class="m-5">
  <h1 class="text-center">Tambah Karyawan</h1>
  <form action="/store-karyawan" method="POST">
      @csrf
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Karyawan</label>
        <input type="text" class="form-control @error('Nama') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" name="Nama" value="{{old('Nama')}}">
        @error('Nama')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Umur</label>
        <input type="number" class="form-control @error('Umur') is-invalid @enderror" id="exampleInputPassword1" name="Umur"  value="{{old('Umur')}}">
        @error('Umur')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Alamat</label>
        <input type="text" class="form-control @error('Alamat') is-invalid @enderror" id="exampleInputPassword1" name="Alamat"  value="{{old('Alamat')}}">
        @error('Alamat')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Nomor Telepon</label>
          <input type="text" class="form-control @error('NomorHp') is-invalid @enderror" id="exampleInputPassword1" name="NomorHp"  value="{{old('NomorHp')}}">
          @error('NomorHp')
          <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

@endsection