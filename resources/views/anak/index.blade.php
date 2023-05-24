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
                    @foreach($anaks as $anak)
                    <tr>
                        @foreach($wali_deleted as $wali)
                            @if($anak->id_wali == $wali->id)
                            <td style="color:darkred">x {{ $wali->nama_wali }} x</td>
                            @else
                            <td>{{ $anak->dataWalis->nama_wali }}</td>
                            @endif
                        @endforeach
                            
                        <td>{{ $anak->nama_anak }}</td>
                        <td class="text-center">{{ $anak->jenis_kelamin }}</td>
                        <td class="text-center">{{ $anak->umur }} bln</td>

                        @if($anak->dataFisiks)
                        <td class="text-center">{{ $anak->dataFisiks->where('id_anak', $anak->id)->count() }}</td>
                        @else
                        <td class="text-center">0</td>
                        @endif

                        @if($anak->dataSuplements)
                        <td class="text-center">{{ $anak->dataSuplements->where('id_anak', $anak->id)->count() }}</td>
                        @else
                        <td class="text-center">0</td>
                        @endif

                        <form action="{{ route('deleteAnak', $anak->id) }}" method="post" >
                        @csrf                        
                            <td>
                                <a class="btn btn-primary" href="{{ route('detailAnak') }}">
                                    <i class="fa-lg fa-sharp fa-solid fa-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ route('editAnak', $anak->id) }}">
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