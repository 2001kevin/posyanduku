@extends('layouts.sidebar')
@section('content')
<section class="form_wali">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card mb-4 mx-4 mt-4  ">
          <div class="card-body py-5 px-5">
            <div class="text-center">
              <h1 class="mb-4"><strong>Data Wali</strong></h1>
            </div>
            <form action="{{ route('updateWali', $walis->id) }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
              @csrf

              <div class="col-md-6">
                <label for="Name" class="form-label">Nama</label>
                <input type="text" class="form-control" placeholder="Name" name="nama_wali" id="nama_wali" value="{{ $walis->nama_wali }}" required>
              </div>
              <div class="col-md-6">
                <label for="Name" class="form-label">No Telp</label>
                <input type="text" class="form-control" placeholder="No Telp" name="no_telp" id="no_telp" value="{{ $walis->no_telp }}" required>
              </div>
              <div class="col-md-12">
                <label for="Name" class="form-label">Alamat</label>
                <input type="text" class="form-control" placeholder="Alamat" name="alamat" id="alamat" value="{{ $walis->alamat }}" required>
              </div>
              
              @if(count($dataAnaks) > 0)
              <div class="d-grid gap-2">
                <label for="Anak" class="form-label">Anak</label>
                @foreach($dataAnaks as $dataAnak)
                <input type="text" class="form-control" placeholder="Anak" name="nama_anak" id="nama_anak" value="{{ $dataAnak->nama_anak }}" disabled>
                @endforeach
              </div>
              @else
              <div class="col-md-10">
                <label for="Anak" class="form-label">Anak</label>
                <input type="text" class="form-control" placeholder="Anak" name="nama_anak" id="nama_anak" value="-" disabled>
              </div>
              <div class="col-md-2 d-flex">
                <a href="{{ route('createAnak') }}" class="button-submit align-items-center" style="text-decoration: none; color:white; height: 38px; margin-top: 2rem;">
                    Tambah
                </a>
              </div>
              @endif

              <div class="col d-grid gap-2">
                <button type="submit" class="button-submit">Submit</button>
              </div>
              <div class="col d-grid gap-2">
                <a href="{{ route('dataWali') }}" class="button-inline-submit" style="text-decoration: none;">Back</a>
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

