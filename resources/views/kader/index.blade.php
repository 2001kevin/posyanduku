@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="d-flex justify-content-between">
            <div class="title_data d-flex justify-content-between">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Kader</h2>
            </div>
            <a href="{{ route('createKader') }}" class="button_create">Create</a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table " style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Kader</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Status</th>
                        <!-- <th>Kehadiran Kader</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kaders as $kader)
                    <tr>
                        <td>{{ $kader->nama_kader }}</td>
                        <td>{{ $kader->jenis_kelamin }}</td>
                        <td>{{ $kader->alamat }}</td>
                        <td>{{ $kader->no_telp }}</td>
                        <td>{{ $kader->status }}</td>
                        <!-- <td>##</td> -->

                        <td class="button_group">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailkader-{{ $kader->id }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </button>
                            <a class="btn btn-warning" href="{{ route('editKader', $kader->id) }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('deleteKader', $kader->id) }}" method="post" >
                            @csrf
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-lg fa-solid fa-trash"></i>
                                </button>
                            </form>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@foreach ($kaders as $kader)
        <div class="modal fade " id="detailkader-{{ $kader->id }}" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-body">
                    <section class="form_anak">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-md-10">
                                    <div class="card mb-4 mx-4 mt-4  ">
                                        <img class="header_logo" src="{{ asset('assets/images/LOGO_POSYANDU.svg') }}"
                                            style="border-top-left-radius: 13px; border-top-right-radius: 15px;"
                                            class="card-img-top d-none d-lg-block" alt="Backgorund Image">
                                        <div class="card-body py-5 px-5">
                                            <div class="text-center">
                                                <h1><strong>Detail Data Kader</strong></h1>
                                            </div>

                                                <div class="">
                                                    <label for="Name" class="form-label">Nama</label>
                                                    <input type="text" value="{{ $kader->nama_kader }}"
                                                        class="form-control" placeholder="Name" name="nama"
                                                        id="nama" required readonly>
                                                </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Jenis Kelamin</label>
                                                <input type="text" value="{{ $kader->jenis_kelamin }}" class="form-control"
                                                    placeholder="Alamat" name="alamat" id="alamat" required readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Alamat</label>
                                                <input type="text" value="{{ $kader->alamat }}"
                                                    class="form-control" placeholder="NoTelepon" name="NoTelepon"
                                                    id="NoTelepon" required readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">No Telepon</label>
                                                <input type="text" value="{{ $kader->no_telp }}" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Status</label>
                                                <input type="text" value="{{ $kader->status }}" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
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
