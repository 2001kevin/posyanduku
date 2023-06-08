@extends('layouts.sidebar')
@section('content')
<section class="form_anak">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card mb-4 mx-4 mt-4  ">
          <div class="card-body py-5 px-5">
            <div class="text-center">
              <h1 class="mb-4"><strong>Data Kader</strong></h1>
            </div>
            <form action="{{ route('updateKader', $kaders->id) }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label for="Name" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Name" name="nama_kader" id="nama_kader" value="{{ $kaders->nama_kader }}" required>
              </div>
              <div class="col-md-6">
                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="form-select" class="form-select">
                    <option value="{{ $kaders->jenis_kelamin }}">{{ $kaders->jenis_kelamin }}</option>
                    <option value="{{ $kaders->jenis_kelamin === 'P' ? 'L' : 'P' }}">{{ $kaders->jenis_kelamin === 'P' ? 'L' : 'P' }}</option>
                </select>
              </div>
              <div class="col-md-6">
                <label for="Name" class="form-label">No Telp</label>
                <input type="text" class="form-control" placeholder="No Telp" name="no_telp" id="no_telp" value="{{ $kaders->no_telp }}" required>
              </div>
              <div class="col-md-6">
                <label for="Status" class="form-label">Status</label>
                <select name="status" id="form-select" class="form-select">
                  @if($kaders->status == 'aktif')
                  <option value="{{ $kaders->status }}">{{ $kaders->status }}</option>
                  <option value="tidak aktif">tidak aktif</option>
                  <option value="berhenti menjabat">berhenti menjabat</option>
                  @elseif($kaders->status == 'tidak aktif')
                  <option value="{{ $kaders->status }}">{{ $kaders->status }}</option>
                  <option value="aktif">aktif</option>
                  <option value="berhenti menjabat">berhenti menjabat</option>
                  @else
                  <option value="{{ $kaders->status }}">{{ $kaders->status }}</option>
                  <option value="aktif">aktif</option>
                  <option value="tidak aktif">tidak aktif</option>
                  @endif
                </select>
              </div>
              <div class="col-md-12">
                <label for="Name" class="form-label">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" value="{{ $kaders->alamat }}" required>
              </div>

              <div class="col d-grid gap-2">
                <button type="submit" class="button-submit">Submit</button>
              </div>
              <div class="col d-grid gap-2">
                <a href="{{ route('dataKader') }}" class="button-inline-submit" style="text-decoration: none;">Back</a>
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

