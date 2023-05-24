@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5 " style="width:99%">
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
                        <th>Nama Wali</th>
                        <th>Nama Anak</th>
                        <th>Jenis Kelamin</th>
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($anaks as $anak )
                        <tr>
                            {{-- @foreach ($anak->dataWalis as $item)
                                <td>{{ $item->nama_wali }}</td>
                            @endforeach --}}
                            <td>{{ $anak->dataWalis->nama_wali }}</td>
                            <td>{{ $anak->nama_anak }}</td>
                            <td>{{ $anak->jenis_kelamin }}</td>
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
