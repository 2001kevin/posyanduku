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
                                      <h1><strong>Buat Data Fisik</strong></h1>
                                  </div>

                                  <form action="{{ route('storeFisik') }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
                                    @csrf
                                    <div class="col d-grid gap-2">
                                       <label for="wali" class="form-label">Pilih Anak</label>
                                        <select name="id_anak" id="form-select" class="form-select">
                                          <option >Pilih Anak</option>
                                          @foreach ($anaks as $anak)
                                            <option value="{{ $anak->id }}">{{ $anak->nama_anak }}</option>
                                          @endforeach
                                        </select>
                                    </div>

                                    <div class="col d-grid gap-2">
                                       <label for="wali" class="form-label">Pilih Kader</label>
                                        <select name="id_kader" id="form-select" class="form-select">
                                          <option >Pilih Kader</option>
                                          @foreach ($kaders as $kader)
                                            <option value="{{ $kader->id }}">{{ $kader->nama_kader }}</option>
                                          @endforeach
                                        </select>
                                    </div>

                                    <div class="">
                                       <label for="makanan_tambahan" class="form-label">Naik Turun Berat Badan</label>
                                        <select name="naik_turun_bb" id="form-select" class="form-select">
                                          <option >Status Berat Badan</option>
                                            <option value="naik">naik</option>
                                            <option value="turun">turun</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="Name" class="form-label">Berat Badan</label>
                                        <input type="number" min="0" max="100" class="form-control" placeholder="Berat Badan" name="berat_badan" id="berat_badan" required>
                                    </div>

                                    <div class="">
                                        <label for="Name" class="form-label">Tanggal Pemeriksaan</label>
                                        <input type="date" class="form-control" placeholder="Tanggal Pemeriksaan" name="tgl_pemeriksaan" id="tgl_pemeriksaan" required>
                                    </div>

                                    <div class="">
                                        <label for="Name" class="form-label">Keterangan</label>
                                        <input type="text" class="form-control" placeholder="Keterangan" name="keterangan" id="keterangan" required>
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
