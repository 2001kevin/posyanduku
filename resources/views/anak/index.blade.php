@extends('layouts.sidebar')

@section('content')
    <section class="data_anak">
        <div class="card d-flex align-item-center mt-5" style="width:99%">
            <div class="d-flex justify-content-between">
                <div class="title_data d-flex justify-content-between">
                    <img src="{{ asset('assets/images/LOGO.svg') }}" alt="">
                    <h2 class="fw-bold">Data Anak</h2>
                </div>
                <a href="{{ route('createAnak') }}" class="button_create">Create</a>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table" style="width:100%">
                    <thead>
                        <tr>
                            <th>Nama Wali</th>
                            <th>Nama Anak</th>
                            <th>Gender Anak</th>
                            <th>Umur</th>
                            <th>Jml Pemeriksaan</th>
                            <th>Jml Suplemen</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($anaks as $anak)
                            <tr>
                                <td>{{ $anak->dataWalis->nama_wali }}</td>
                                <td>{{ $anak->nama_anak }}</td>
                                <td class="text-center">{{ $anak->jenis_kelamin }}</td>
                                <td class="text-center">{{ $anak->umur }} bln</td>

                                @if ($anak->dataFisiks)
                                    <td class="text-center">{{ $anak->dataFisiks->where('id_anak', $anak->id)->count() }}
                                    </td>
                                @else
                                    <td class="text-center">0</td>
                                @endif

                                @if ($anak->dataSuplements)
                                    <td class="text-center">
                                        {{ $anak->dataSuplements->where('id_anak', $anak->id)->count() }}</td>
                                @else
                                    <td class="text-center">0</td>
                                @endif

                                <td class="button_group">
                                    <button class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#detailAnak-{{ $anak->id }}">
                                        <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                                    </button>
                                    <a class="btn btn-warning" href="{{ route('editAnak', $anak->id) }}">
                                        <i class=" fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <form action="{{ route('deleteAnak', $anak->id) }}" method="post">
                                        @csrf
                                        <button class="btn btn-danger" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus?')">
                                            <i class=" fa-solid fa-trash"></i>
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
    {{-- modal detail --}}
    @foreach ($anaks as $anak)
        <div class="modal fade " id="detailAnak-{{ $anak->id }}" data-bs-keyboard="false" tabindex="-1"
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
                                                <h1><strong>Detail Data Anak</strong></h1>
                                            </div>
                                            @if ($anak->dataWalis)
                                                <div class="">
                                                    <label for="Name" class="form-label">Nama Wali</label>
                                                    <input type="text" value="{{ $anak->dataWalis->nama_wali }}"
                                                        class="form-control" placeholder="Name" name="nama"
                                                        id="nama" required readonly>
                                                </div>
                                            @endif

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Nama Anak</label>
                                                <input type="text" value="{{ $anak->nama_anak }}" class="form-control"
                                                    placeholder="Alamat" name="alamat" id="alamat" required readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Jenis Kelamin</label>
                                                <input type="text" value="{{ $anak->jenis_kelamin }}"
                                                    class="form-control" placeholder="NoTelepon" name="NoTelepon"
                                                    id="NoTelepon" required readonly>
                                            </div>

                                            <div class="mt-3">
                                                <label for="Name" class="form-label">Umur</label>
                                                <input type="text" value="{{ $anak->umur }} bln" class="form-control"
                                                    placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                    readonly>
                                            </div>
                                            @if ($anak->dataFisiks)
                                                <div class="mt-3">
                                                    <label for="Name" class="form-label">Jumlah Pemeriksaan</label>
                                                    <input type="number"
                                                        value="{{ $anak->dataFisiks->where('id_anak', $anak->id)->count() }}"
                                                        class="form-control" placeholder="NoTelepon" name="NoTelepon"
                                                        id="NoTelepon" required readonly>
                                                </div>
                                            @else
                                                <div class="mt-3">
                                                    <label for="Name" class="form-label">Jumlah Pemeriksaan</label>
                                                    <input type="number" value="0" class="form-control"
                                                        placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                        readonly>
                                                </div>
                                            @endif

                                            @if ($anak->dataSuplements)
                                                <div class="mt-3">
                                                    <label for="Name" class="form-label">Jumlah Suplement</label>
                                                    <input type="number"
                                                        value="{{ $anak->dataSuplements->where('id_anak', $anak->id)->count() }}"
                                                        class="form-control" placeholder="NoTelepon" name="NoTelepon"
                                                        id="NoTelepon" required readonly>
                                                </div>
                                            @else
                                                <div class="mt-3">
                                                    <label for="Name" class="form-label">Jumlah Pemeriksaan</label>
                                                    <input type="number" value="0" class="form-control"
                                                        placeholder="NoTelepon" name="NoTelepon" id="NoTelepon" required
                                                        readonly>
                                                </div>
                                            @endif
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
