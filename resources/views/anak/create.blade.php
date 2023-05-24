@extends('layouts.sidebar')
@section('content')
  <section class="form_anak">
      <div class="container">
              <div class="row justify-content-center">
                  <div class="col-md-10">
                      <div class="card mb-4 mx-4 mt-4  ">
                      <img class="header_logo" src="{{ asset('assets/images/LOGO_POSYANDU.svg') }}" style="border-top-left-radius: 13px; border-top-right-radius: 15px;" class="card-img-top d-none d-lg-block"  alt="Backgorund Image">
                          <div class="card-body py-5 px-5">
                              <div class="text-center">
                                      <h1><strong>Buat Data Anak</strong></h1>
                                  </div>

                                  <form action="{{ route('storeAnak') }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
                                    @csrf
                                      <div class="col-md-6">
                                        <label for="Name" class="form-label">Nama</label>
                                        <input type="text" class="form-control" placeholder="Name" name="nama" id="nama" required>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="Cattegory" class="form-label">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" id="form-select" class="form-select">
                                          <option >Pilih Jenis Kelamin</option>
                                          <option value="Laki-laki">Laki-laki</option>
                                          <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                    <div class="col d-grid gap-2">
                                       <label for="wali" class="form-label">Wali</label>
                                        <select name="wali" id="form-select" class="form-select">
                                          <option >Pilih Wali</option>
                                          @foreach ($walis as $wali)
                                            <option value="{{ $wali->id }}">{{ $wali->nama_wali }}</option>
                                          @endforeach
                                        </select>
                                    </div>

                                    <div class=" d-grid gap-2">
                                        <button type="submit" class="button-submit">Submit</button>
                                    </div>
                                </form>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
  </section>
@endsection
