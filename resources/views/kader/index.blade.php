@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="title_data ">
            <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
            <h2 class="fw-bold">Data Kader</h2>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Kader</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Kehadiran Kader</th>
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
                        <td>##</td>

                        <td>
                            <a class="btn btn-primary" href="{{ route('detailKader') }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('editKader') }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="{{ route('deleteKader') }}" class="btn btn-danger" type="button">
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