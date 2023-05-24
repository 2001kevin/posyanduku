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

                        <form action="{{ route('deleteSuplement', $suplement->id) }}" method="post" >
                        @csrf                        
                            <td>
                                <a class="btn btn-primary" href="{{ route('detailSuplement', $suplement->id) }}">
                                    <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('editSuplement', $suplement->id) }}">
                                    <i class="fa-lg fa-solid fa-pen-to-square"></i>
                                </a>
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-lg fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </form>                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection