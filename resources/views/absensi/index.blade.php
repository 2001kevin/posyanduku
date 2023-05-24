@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="title_data ">
            <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
            <h2 class="fw-bold">Data Absensi Kader</h2>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Absensi Kader</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Kehadiran Absensi Kader</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensiKaders as $absensiKader)
                    <tr>
                        <td>{{ $absensiKader->nama_absensiKader }}</td>
                        <td>{{ $absensiKader->jenis_kelamin }}</td>
                        <td>{{ $absensiKader->alamat }}</td>
                        <td>{{ $absensiKader->no_telp }}</td>                        
                        <td>##</td>

                        <form action="{{ route('deleteAnak', $anak->id) }}" method="post" >
                        @csrf                        
                            <td>
                                <a class="btn btn-primary" href="{{ route('detailAbsensiKader') }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('editAbsensiKader') }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="{{ route('deleteAbsensiKader') }}" class="btn btn-danger" type="button">
                                <button class="btn btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                                    <i class="fa-lg fa-solid fa-trash"></i>
                                </button>
                            </td>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection