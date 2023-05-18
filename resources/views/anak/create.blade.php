@extends('layouts.sidebar')
@section('content')
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card mb-4 mx-4 mt-4  ">
                    <img class="header_logo" src="{{ asset('assets/images/LOGO_POSYANDU.svg') }}" style="border-top-left-radius: 13px; border-top-right-radius: 15px;" class="card-img-top d-none d-lg-block"  alt="Backgorund Image">
                        <div class="card-body py-5 px-5">
                            <div class="text-center">
                                    <h1><strong>Data Anak</strong></h1>
                                </div>
    
                                <form action="#" method="POST" class="row sign-up-form form g-3" enctype="multipart/form-data">
                                  @csrf
                                    <div class="col-md-6">
                                      <label for="Name" class="form-label">Nama</label>
                                      <input type="text" class="form-control" placeholder="Name" name="name" id="name" required>
                                  </div>
                                  <div class="col-md-6">
                                      <label for="Cattegory" class="form-label">Jenis Kelamin</label>
                                      <select name="cattegory" id="form-select" class="form-select">
                                        <option >Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                      </select>
                                  </div>
                                  <div class="col d-grid gap-2">
                                     <label for="Cattegory" class="form-label">Wali</label>
                                      <select name="cattegory" id="form-select" class="form-select">
                                        <option >Pilih Wali</option>
                                        <option value="Sukijat">Sukijat</option>
                                        <option value="Wati">Wati</option>
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
@endsection