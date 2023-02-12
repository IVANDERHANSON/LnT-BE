@extends('template')

@section('title', 'welcome')

@section('body')

<div class="d-flex m-5" style="flex-direction: column;">
  @php
    $x = 0;
  @endphp

  @foreach($karyawans as $karyawan)
    @php
      $x++;
    @endphp
  @endforeach

  @if($x == 0)
    <h5 style="margin: 10px 0px;"><b>Tidak ada karyawan yang terdaftar.</b></h5>
  @else
    <h5 style="margin: 10px 0px;"><b>Daftar Karyawan</b></h5>
  @endif

  @foreach($karyawans as $karyawan)
    <div class="card" style="width: 100%; margin: 10px 0px;">
      <div class="card-body">
          <h5 class="card-title" style="float: left;">{{$karyawan->id}}. {{$karyawan->Nama}}</h5>
          <a href="{{route('show', $karyawan->id)}}" class="btn btn-primary" style="float: right;">Lihat Karyawan</a>
      </div>
    </div>
  @endforeach
</div>

@endsection