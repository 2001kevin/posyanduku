@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="d-flex justify-content-between">
            <div class="title_data d-flex justify-content-between">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Wali</h2>
            </div>
            <a href="{{ route('createWali') }}" class="button_create">Create</a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table " style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Wali</th>
                        <!-- <th>Nama Anak</th>                  -->
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($walis as $wali)
                    <tr>
                        <td>{{ $wali->nama_wali }}</td>

                        <td>{{ $wali->alamat }}</td>
                        <td>{{ $wali->no_telp }}</td>

                        <td class="button_group">
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#detailWali-{{ $wali->id }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </button>
                            <a class="btn btn-warning" href="{{ route('editWali', $wali->id) }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('deleteWali', $wali->id) }}" method="post" >
                            @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-lg fa-solid fa-trash"></i>
                                </button>
                            </form>
                                <!-- @if(is_null($wali->dataAnaks))
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-lg fa-solid fa-trash"></i>
                                </button>
                                @endif -->
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
{{-- modal detail --}}
    @foreach ($walis as $wali)
        <div class="modal fade " id="detailWali-{{ $wali->id }}"  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-xl">
            <div class="modal-body">
                <section class="form_anak">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-10">
                                <div class="card mb-4 mx-4 mt-4  ">
                                         <img class="header_logo" src="{{ asset('assets/images/LOGO_POSYANDU.svg') }}" style="border-top-left-radius: 13px; border-top-right-radius: 15px;" class="card-img-top d-none d-lg-block"  alt="Backgorund Image">
                                          <div class="card-body py-5 px-5">
                                              <div class="text-center">
                                                  <h1><strong>Detail Data Wali</strong></h1>
                                               </div>
                                                    <div class="">
                                                        <label for="Name" class="form-label">Nama</label>
                                                        <input type="text" value="{{ $wali->nama_wali }}" class="form-control" placeholder="Name" name="nama" id="nama" required readonly>
                                                      </div>
  
                                                      <div class="mt-3">
                                                          <label for="Name" class="form-label">Alamat</label>
                                                          <input type="text" value="{{ $wali->alamat }}" class="form-control" placeholder="Alamat" name="alamat" id="alamat" required readonly>
                                                      </div>
  
                                                      <div class="mt-3">
                                                          <label for="Name" class="form-label">No Telepon</label>
                                                          <input type="number" value="{{ $wali->no_telp }}" class="form-control" placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required readonly>
                                                        </div>
                                            </div>
                                      </div>
                                  </div>
                              </div>
                        </div>
                  </section>
                </div>
            </div>
        </div>
      @endforeach

@endsection
