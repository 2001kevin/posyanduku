@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="title_data ">
            <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
            <h2 class="fw-bold">Data Wali</h2>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Wali</th>       
                        <th>Nama Anak</th>                 
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($walis as $wali)
                    <tr>
                        <td>{{ $wali->nama_wali }}</td>                        
                        <td>{{ $wali->dataAnaks->nama_anak }}</td>                        
                        <td>{{ $wali->alamat }}</td>
                        <td>{{ $wali->no_telp }}</td>                        

                        <td>
                            <a class="btn btn-primary" href="{{ route('detailWali') }}">
                                <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                            </a>
                            <a class="btn btn-warning" href="{{ route('editWali') }}">
                                <i class="fa-lg fa-solid fa-pen-to-square"></i>
                            </a>

                            <a href="{{ route('deleteWali') }}" class="btn btn-danger" type="button">
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