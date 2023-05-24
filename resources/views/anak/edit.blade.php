@extends('layouts.sidebar')
@section('content')
<section class="form_anak">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card mb-4 mx-4 mt-4  ">
          <div class="card-body py-5 px-5">
            <div class="text-center">
              <h1 class="mb-4"><strong>Data Anak</strong></h1>
            </div>
            <form action="{{ route('updateAnak', $anaks->id) }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label for="Name" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Name" name="nama_anak" id="nama_anak" value="{{ $anaks->nama_anak }}" required>
              </div>
              <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="form-select" class="form-select">
                  @if($anaks->jenis_kelamin == 'L')
                  <option value="{{ $anaks->jenis_kelamin }}">{{ $anaks->jenis_kelamin }}</option>
                  <option value="P">P</option>
                  @else
                  <option value="{{ $anaks->jenis_kelamin }}">{{ $anaks->jenis_kelamin }}</option>
                  <option value="L">L</option>
                  @endif
                </select>
              </div>
              <div class="col d-grid">
                <label for="Umur" class="form-label">Umur</label>
                <div class="input-group">
                  <input type="text" class="form-control" placeholder="Umur" name="umur" id="umur" value="{{ $anaks->umur }}" required>
                  <span class="input-group-text" id="basic-addon2">bulan</span>
                </div>
              </div>

              @php
              $umurTahun = floor($anaks->umur / 12); // Mengkonversi bulan ke tahun
              $sisaBulan = $anaks->umur % 12; // Sisa bulan setelah dikonversi ke tahun (modulus)
              @endphp
              <div class="col d-grid">
                <label for="Umur" class="form-label">Konversi Umur</label>
                <input type="text" class="form-control" placeholder="Konversi Umur" name="konversi_umur" id="konversi_umur" value="{{ $umurTahun }} tahun {{ $sisaBulan }} bulan" disabled>
              </div>
              <div class="d-grid gap-2">
                <label for="Wali" class="form-label">Wali</label>

                @if($anaks->dataWalis)
                <input type="text" class="form-control" value="{{ $anaks->dataWalis->nama_wali }}" disabled>
                @else
                <div class="input-group">
                  <input type="text" class="form-control" style="color:darkred" value="x {{ $wali_deleted->nama_wali }} x" disabled>
                  <span class="input-group-text" id="basic-addon2" style="color:darkred">wali sudah tidak tercatat</span>
                </div>
                @endif

              </div>
              <div class="col d-grid gap-2">
                <button type="submit" class="button-submit">Submit</button>
              </div>
              <div class="col d-grid gap-2">
                <a href="{{ route('dataAnak') }}" class="button-inline-submit" style="text-decoration: none;">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection

@section('js')

@include('sweetalert::alert')

@endsection