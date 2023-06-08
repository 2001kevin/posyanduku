@extends('layouts.sidebar')
@section('content')
<section class="form_suplement">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card mb-4 mx-4 mt-4  ">
          <div class="card-body py-5 px-5">
            <div class="text-center">
              <h1 class="mb-4"><strong>Data Suplement</strong></h1>
            </div>
            <form action="{{ route('updateSuplement', $suplements->id) }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label for="Name" class="form-label">Nama Anak</label>
                <select class="form-select" placeholder="Name" name="id_anak" id="id_anak" required>
                @foreach($anaks as $anak)
                    <option value="{{ $anak->id }}" {{ $suplements->dataAnaks->nama_anak === $anak->nama_anak ? 'selected' : '' }}>{{ $anak->nama_anak }}</option>
                @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="Name" class="form-label">Nama Kader</label>
                <select class="form-select" placeholder="Name" name="id_kader" id="id_kader" required>
                @foreach($kaders as $kader)
                    <option value="{{ $kader->id }}" {{ $suplements->dataKaders->nama_kader === $kader->nama_kader ? 'selected' : '' }}>{{ $kader->nama_kader }}</option>
                @endforeach
                </select>
              </div>
              
              <div class="col-md-6">
                <label for="vitamin_a" class="form-label">Vitamin A</label>
                <select name="vitamin_a" id="form-select" class="form-select">
                    <option value="{{ $suplements->vitamin_a }}">{{ $suplements->vitamin_a }}</option>
                    <option value="{{ $suplements->vitamin_a === 'sudah' ? 'belum' : 'sudah' }}">{{ $suplements->vitamin_a === 'sudah' ? 'belum' : 'sudah' }}</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="obat_cacing" class="form-label">Obat Cacing</label>
                <select name="obat_cacing" id="form-select" class="form-select">
                    <option value="{{ $suplements->obat_cacing }}">{{ $suplements->obat_cacing }}</option>
                    <option value="{{ $suplements->obat_cacing === 'sudah' ? 'belum' : 'sudah' }}">{{ $suplements->obat_cacing === 'sudah' ? 'belum' : 'sudah' }}</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="makanan_tambahan" class="form-label">Makanan Tambahan</label>
                <select name="makanan_tambahan" id="form-select" class="form-select">
                    <option value="{{ $suplements->makanan_tambahan }}">{{ $suplements->makanan_tambahan }}</option>
                    <option value="{{ $suplements->makanan_tambahan === 'sudah' ? 'belum' : 'sudah' }}">{{ $suplements->makanan_tambahan === 'sudah' ? 'belum' : 'sudah' }}</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="bulan_suplement" class="form-label">Bulan Suplemen</label>
                <select name="bulan_suplement" id="form-select" class="form-select">
                    <option value="{{ $suplements->bulan_suplement }}">{{ $suplements->bulan_suplement }}</option>
                    <option value="{{ $suplements->bulan_suplement === 'februari' ? 'agustus' : 'februari' }}">{{ $suplements->bulan_suplement === 'februari' ? 'agustus' : 'februari' }}</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="Tanggal Pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control" placeholder="Tanggal Pemeriksaan" name="tgl_pemeriksaan" id="tgl_pemeriksaan" value="{{ $suplements->tgl_pemeriksaan }}" required>
              </div>
              <div class="col-md-6">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" id="keterangan" value="{{ is_null($suplements->keterangan) ? 'tidak ada keterangan' : $suplements->keterangan }}" required>
              </div>

              <div class="col d-grid gap-2">
                <button type="submit" class="button-submit">Submit</button>
              </div>
              <div class="col d-grid gap-2">
                <a href="{{ route('dataSuplement') }}" class="button-inline-submit" style="text-decoration: none;">Back</a>
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