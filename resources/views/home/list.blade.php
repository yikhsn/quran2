@extends('layouts.master')

@section('title')
    <title>List Surat - Qur'anKu</title>
@endsection

@section('content')
        {{-- <div>
        <img src="img/thumbnail.png" class="bg2"/>
    </div> --}}

    <div class="search-surat-container">
      <div class="search-box">
        <div class="logo-quran-box">
          <img class="logo-quran" src="{{ asset('/img/logo-white.png') }}" alt="">
        </div>
        {{-- <form action="/read/search" method="POST">
          {{ csrf_field() }}

          <input class="search-input" name="query" type="text" placeholder="Cari berdasarkan nama surah atau arti ayat...">
          <button type="submit" class="search-button">
            Cari
          </button>
        </form> --}}
      </div>
    </div>

    <div class="content-surat">
      <div class="navbar-surat">
          <a href="/">SURAH</a>
      </div>
      
      <div class="row no-gutters surats">
        @foreach ($surats as $surat)
        <a href="/surat/{{ $surat->nomor_surat }}" class="col-md-6 col-12 surat-single-box">
          <div class="row surat-single">
            <div class="col-1 nomor-surat">
              {{ $surat->nomor_surat }}
            </div>
            <div class="col-5">
              <div class="nama-surat">{{ $surat->nama_surat }}</div>
              <div class="arti-nama-surat">{{ $surat->arti_nama }}</div>
            </div>
            <div class="col-5">
              <div class="nama-surat-arab">{{ $surat->nama_surat_arab }}</div>
            </div>
          </div>
        </a>
        @endforeach
      </div>

    </div>
@endsection