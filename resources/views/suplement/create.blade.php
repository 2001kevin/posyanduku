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
                                      <h1><strong>Buat Data Suplement</strong></h1>
                                  </div>

                                  <form action="{{ route('storeSuplement') }}" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
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
                                       <label for="vitamin_a" class="form-label">Status Vitamin A</label>
                                        <select name="vitamin_a" id="form-select" class="form-select">
                                          <option >Status</option>
                                            <option value="sudah">sudah</option>
                                            <option value="belum">belum</option>
                                        </select>
                                    </div>

                                    <div class="">
                                       <label for="makanan_tambahan" class="form-label">Status Makanan Tambahan</label>
                                        <select name="makanan_tambahan" id="form-select" class="form-select">
                                          <option >Status Makanan Tambahan</option>
                                            <option value="sudah">sudah</option>
                                            <option value="belum">belum</option>
                                        </select>
                                    </div>
                                    
                                    <div class="">
                                       <label for="makanan_tambahan" class="form-label">Obat Cacing</label>
                                        <select name="obat_cacing" id="form-select" class="form-select">
                                          <option >Status Obat</option>
                                            <option value="sudah">sudah</option>
                                            <option value="belum">belum</option>
                                        </select>
                                    </div>

                                    <div class="">
                                        <label for="Name" class="form-label">Bulan Suplement</label>
                                        <input type="month" class="form-control" placeholder="Bulan Suplement" name="bulan_suplement" id="bulan_suplement" required>
                                    </div>

                                    <div class="">
                                        <label for="Name" class="form-label">Tanggal Pemeriksaan</label>
                                        <input type="date" class="form-control" placeholder="Tangga Pemeriksaan" name="tanggal_pemeriksaan" id="tanggal_pemeriksaan" required>
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
