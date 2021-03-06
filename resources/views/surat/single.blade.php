@extends('layouts.master')

@section('description')
  <meta name="description" content="Baca Qur'an {{ $surat->nama_surat }} online lengkap dengan artinya">
@endsection

@section('title')
  <title>{{ $surat->nama_surat }} - Baca Qur'an Online Lengkap dan Artinya</title>
@endsection

@section('content')
    
    <nav class="navbar navbar-expand-lg navbar-light">
      <a class="navbar-brand" href="/"><i class="fa fa-home"></i></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="suratDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pindah ke Surat
              <span class="caret"></span>
            </a>
            <div class="dropdown-menu scrollable-menu" aria-labelledby="suratDropdown" role="menu">
                @foreach ($all_surats as $surat_current)              
                  <a class="dropdown-item" href="/surat/{{ $surat_current->nomor_surat }}">{{ $surat_current->nama_surat }}</a>
                @endforeach
            </div>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="ayatDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Pindah ke Ayat<span class="caret"></span>
            </a>
            <div class="dropdown-menu scrollable-menu" aria-labelledby="ayatDropdown" role="menu">
                @foreach ($surat->ayats as $ayat)              
                  <a class="dropdown-item" href="#{{ $ayat->nomor_ayat }}">{{ $ayat->nomor_ayat }}</a>
                @endforeach
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <div class="keterangan-surat-container">
      <div class="keterangan-surat">
          <div class="keterangan-surat-nama-arab"> {{ $surat->nama_surat_arab }} </div>

          <h1 class="keterangan-surat-nama-indo">{{ $surat->nama_surat }}</h1>
          <h2 class="keterangan-surat-arti-nama">{{ $surat->arti_nama }}</h2>        
      </div>
    </div>

    <div class="row no-gutters body-ayats-container">
      <ul class="body-ayats">
        @foreach ($surat->ayats as $ayat)
            
        <li id="{{ $ayat->nomor_ayat }}" class="single-ayat">
          <div class="single-ayat-kiri">
            <div class="ayat-nomor-surat">
                {{ $ayat->nomor_ayat }}
            </div>
            {{-- <div class="ayat-putar-suara">
              <button class="ayat-suara-button"></button>
            </div> --}}
            <div class="ayat-share">
              <div class="ayat-share-twitter">
                  <a target="_blank" href="https://twitter.com/share?ref_src=surat/{{ $surat->nomor_surat }}" data-show-count="false"><img src="{{  URL::asset('assets/img/twitter.svg') }}" alt=""></a>
              </div>
              <div class="ayat-share-facebook">
                  <a target="_blank" href="http://www.facebook.com/sharer.php?u=surat/{{ $surat->nomor_surat }}"><img src="{{  URL::asset('assets/img/facebook.svg') }}" alt=""></a>

              </div>
            </div>
          </div>
          <div class="single-ayat-kanan">
            <div class="ayat-teks-arab">
                {{ $ayat->teks_arab }}
            </div>
            <div class="ayat-terjemahan">
              {{ $ayat->terjemahan_idn }}
            </div>
          </div>
        </li>

        @endforeach

        <!-- <button type="button" class="btn btn-outline-light" margin="20"><i class="fa fa-arrow-left"></i> Surah Sebelumnya</button>
        <button type="button" class="btn btn-outline-light">Surah Berikutnya <i class="fa fa-arrow-right"></i></button> -->

        </ul>
    </div>

  <script>
    var musik = new Audio();
      
    musik.src = "{{ URL::asset('mp3/1.mp3') }}";
    musik.loop = true;
    // musik.play(); 
    
    function mulaiAudio(){
      var play = document.querySelector(".ayat-suara-button");

      play.addEventListener('click', fplay);

      function fplay() {
        if(musik.paused){
          musik.play();
          play.style.background = "url('../img/pause.svg')";
        }
        else {
          musik.pause();
          play.style.background = "url('../img/play.svg')";
        }
      }
    }

    window.addEventListener('load', mulaiAudio);
  </script>
@endsection