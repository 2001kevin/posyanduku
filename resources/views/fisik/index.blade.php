@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:99%">
        <div class="d-flex justify-content-between">
            <div class="title_data d-flex justify-content-between">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Fisik</h2>
            </div>
            <a href="{{ route('createFisik') }}" class="button_create">Create</a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Anak</th>
                        <th>Nama Kader</th>
                        <th>Berat Badan</th>
                        <th>Naik Turun BB</th>
                        <th>Tgl Pemeriksaan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fisiks as $fisik)
                    <tr>
                        <td>{{ $fisik->dataAnaks->nama_anak }}</td>
                        <td>{{ $fisik->dataKaders->nama_kader }}</td>
                        <td>{{ $fisik->berat_badan }} kg</td>
                        <td>{{ $fisik->naik_turun_bb }}</td>
                        <td>{{ $fisik->tgl_pemeriksaan }}</td>

                        <form action="{{ route('deleteFisik', $fisik->id) }}" method="post" >
                        @csrf                        
                            <td>
                                <a class="btn btn-primary" href="{{ route('detailFisik') }}">
                                    <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('editFisik', $fisik->id) }}">
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