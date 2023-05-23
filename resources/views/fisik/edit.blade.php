@extends('layouts.sidebar')
@section('content')
<section class="form_anak">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card mb-4 mx-4 mt-4  ">
          <div class="card-body py-5 px-5">
            <div class="text-center">
              <h1 class="mb-4"><strong>Data Fisik</strong></h1>
            </div>
            <form action="{{ route('updateFisik', $fisiks->id) }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label for="Name" class="form-label">Nama Anak</label>
                <select class="form-select" placeholder="Name" name="id_anak" id="id_anak" required>
                @foreach($anaks as $anak)
                    <option value="{{ $anak->id }}" {{ $fisiks->dataAnaks->nama_anak === $anak->nama_anak ? 'selected' : '' }}>{{ $anak->nama_anak }}</option>
                @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="Name" class="form-label">Nama Kader</label>
                <select class="form-select" placeholder="Name" name="id_kader" id="id_kader" required>
                @foreach($kaders as $kader)
                    <option value="{{ $kader->id }}" {{ $fisiks->dataKaders->nama_kader === $kader->nama_kader ? 'selected' : '' }}>{{ $kader->nama_kader }}</option>
                @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="Berat Badan" class="form-label">Berat Badan</label>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Berat Badan" name="berat_badan" id="berat_badan" value="{{ $fisiks->berat_badan }}" required>
                    <span class="input-group-text" id="basic-addon2">kg</span>
                </div>
              </div>

              <div class="col-md-6">
                <label for="naik_turun_bb" class="form-label">Naik Turun BB</label>
                <select name="naik_turun_bb" id="form-select" class="form-select">
                    <option value="{{ $fisiks->naik_turun_bb }}">{{ $fisiks->naik_turun_bb }}</option>
                    <option value="{{ $fisiks->naik_turun_bb === 'naik' ? 'turun' : 'naik' }}">{{ $fisiks->naik_turun_bb === 'naik' ? 'turun' : 'naik' }}</option>
                </select>
              </div>

              <div class="col-md-6">
                <label for="Tanggal Pemeriksaan" class="form-label">Tanggal Pemeriksaan</label>
                <input type="date" class="form-control" placeholder="Tanggal Pemeriksaan" name="tgl_pemeriksaan" id="tgl_pemeriksaan" value="{{ $fisiks->tgl_pemeriksaan }}" required>
              </div>
              <div class="col-md-6">
                <label for="Keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" id="keterangan" value="{{ is_null($fisiks->keterangan) ? 'tidak ada keterangan' : $fisiks->keterangan }}" required>
              </div>

              <div class="col d-grid gap-2">
                <button type="submit" class="button-submit">Submit</button>
              </div>
              <div class="col d-grid gap-2">
                <a href="{{ route('dataFisik') }}" class="button-inline-submit" style="text-decoration: none;">Back</a>
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