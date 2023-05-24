@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5 " style="width:99%">
        <div class="d-flex justify-content-between">
            <div class="title_data d-flex justify-content-between">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Wali</h2>
            </div>
            <a href="{{ route('createWali') }}" class="button_create">Create</a>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table" style="width:100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>No Telepon</th>
                        <th>Alamat</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($walis as $wali)
                        <tr>
                            <th scope="row">{{ $loop->index+1 }}</th>
                            <td>{{ $wali->nama_wali }}</td>
                            <td>{{ $wali->no_telp }}</td>
                            <td>{{ $wali->alamat }}</td>
                            <td>
                                <button class="button-edit" data-bs-toggle="modal" data-bs-target="#"><i class="fas fa-pencil-alt"></i></button>
                                <button class="button-delete"><i class="fas fa-times" data-bs-toggle="modal" data-bs-target="#"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
