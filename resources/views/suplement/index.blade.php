@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:99%">
        <div class="d-flex justify-content-between">
            <div class="title_data d-flex justify-content-between">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Suplement</h2>
            </div>
            <a href="{{ route('createSuplement') }}" class="button_create">Create</a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Anak</th>
                        <th>Nama Kader</th>
                        <th>Vitamin A</th>
                        <th>Obat Cacing</th>
                        <th>Makanan Tambahan</th>
                        <th>Bulan Suplemen</th>
                        <th>Tanggal Pemeriksaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($suplements as $suplement)
                    <tr>
                        <td>{{ $suplement->dataAnaks->nama_anak }}</td>
                        <td>{{ $suplement->dataKaders->nama_kader }}</td>
                        <td>{{ $suplement->vitamin_a }}</td>
                        <td>{{ $suplement->obat_cacing }}</td>
                        <td>{{ $suplement->makanan_tambahan }}</td>
                        <td>{{ $suplement->bulan_suplemen }}</td>
                        <td>{{ $suplement->tgl_pemeriksaan }}</td>

                        <td class="button_group">
                            <button class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#detailSuplement-{{ $suplement->id }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </button>
                            <a class="btn btn-warning" href="{{ route('editSuplement', $suplement->id) }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>
                            <form action="{{ route('deleteSuplement', $suplement->id) }}" method="post" >
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
@foreach ($suplements as $suplement)
        <div class="modal fade " id="detailSuplement-{{ $suplement->id }}" data-bs-keyboard="false" tabindex="-1"
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
                                                <h1><strong>Detail Suplement</strong></h1>
                                            </div>

                                                <div class="">
                                                    <label for="Name" class="form-label">Nama Anak</label>
                                                    <input type="text" value="{{ $suplement->dataAnaks->nama_anak }}"
                                                        class="form-control" placeholder="Name" name="nama"
                                                        id="nama" required readonly>
                                                </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Jenis Kader</label>
                                                <input type="text" value="{{ $suplement->dataKaders->nama_kader }}" class="form-control"
                                                    placeholder="Alamat" name="alamat" id="alamat" required readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Vitamin A</label>
                                                <input type="text" value="{{ $suplement->vitamin_a }}"
                                                    class="form-control" placeholder="NoTelepon" name="NoTelepon"
                                                    id="NoTelepon" required readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Obat Cacing</label>
                                                <input type="text" value="{{ $suplement->obat_cacing }}" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Makanan Tambahan</label>
                                                <input type="text" value="{{ $suplement->makanan_tambahan }}" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Bulan</label>
                                                <input type="text" value="{{ $suplement->bulan_suplement }}" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Tanggal Pemeriksaan</label>
                                                <input type="text" value="{{ $suplement->tgl_pemeriksaan }}" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Keterangan</label>
                                                <input type="text" value="{{ $suplement->keterangan }}" class="form-control"
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
