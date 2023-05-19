@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:99%">
        <div class="d-flex justify-content-between">
            <div class="title_data d-flex justify-content-between">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Anak</h2>
            </div>
            <a href="{{ route('createAnak') }}" class="button_create">Create</a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Anak</th>
                        <th>Nama Wali</th>
                        <th>Gender Anak</th>
                        <th>Umur</th>
                        <th>Jml Pemeriksaan</th>
                        <th>Jml Suplemen diberikan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anaks as $anak)
                    <tr>
                        <td>{{ $anak->nama_anak }}</td>
                        <td>{{ $anak->dataWalis->nama_wali }}</td>
                        <td>{{ $anak->jenis_kelamin }}</td>
                        <td>{{ $anak->umur }}</td>

                        @if($anak->dataFisiks)
                        <td>{{ $anak->dataFisiks->where('id_anak', $anak->id)->count() }}</td>
                        @else
                        <td>0</td>
                        @endif

                        @if($anak->dataSuplements)
                        <td>{{ $anak->dataSuplements->where('id_anak', $anak->id)->count() }}</td>
                        @else
                        <td>0</td>
                        @endif

                        <td>
                            <a class="btn btn-primary" href="{{ route('detailAnak') }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('editAnak') }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="{{ route('deleteAnak') }}" class="btn btn-danger" type="button">
                                <i class="fa-lg fa-solid fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection