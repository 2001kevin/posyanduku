@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="title_data d-flex justify-content-between" style="margin-right: 20px;">
            <div class="col d-flex">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Data Absensi Kader</h2>
            </div>
            <a href="{{ route('createAbsensiKader') }}" class="button_create">Create</a>
            Pilih Data Bulan
            <!-- <input type="month" name="bulan_absensi" id="bulan_absensi" class="form-control-sm" placeholder="Pilih Bulan Absensi" required> -->
            <select id="bulan_absensi" class="form-control-sm m-2">
                @foreach($bulan_absensi as $val)
                <option value="{{ $val }}">{{ $val }}</option>
                @endforeach
            </select>

        </div>
        <div class="card-body">
            <form action="{{ route('deleteAbsensiKader', ['bulan_absensi' => $val]) }}" id="deleteData" method="post" enctype="multipart/form-data">
                @csrf
                    <a id="editData" href="{{ route('editAbsensiKader', ['bulan_absensi' => $val]) }}" class="button_create">Edit Absensi Bulan terpilih</a>
                    <button class="button_delete" type="submit" onclick="return confirm('Yakin ingin menghapus?')">
                        Delete Absensi Bulan terpilih
                    </button>
            </form>

            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Nama Kader</th>
                        <th>Status Hadir</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($absensi_kaders as $absensi_kader)
                    <tr>
                        <td>{{ $absensi_kader->dataKaders->nama_kader }}</td>
                        <td>{{ $absensi_kader->status_hadir }}</td>
                        <td>
                            @if ($absensi_kader->keterangan === null)
                            null
                            @else
                            {{ $absensi_kader->keterangan }}
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#bulan_absensi').on('change', function() {
            var bulan_absensi = $(this).val();
            // Mengubah href pada elemen <a> dengan nilai yang dipilih
            var href = "{{ route('editAbsensiKader', ['bulan_absensi' => ':val']) }}";
            href = href.replace(':val', bulan_absensi);
            $('#editData').attr('href', href);

            var action = "{{ route('deleteAbsensiKader', ['bulan_absensi' => ':val']) }}";
            action = action.replace(':val', bulan_absensi);
            $('#deleteData').attr('action', action);

            $.ajax({
                url: '/absensi_kader/' + bulan_absensi,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    var html = '';
                    // console.log(data);
                    for (var i = 0; i < data.length; i++) {
                        html += '<tr>';
                        // html += '<td>' + data[i].dataKaders.nama_kader + '</td>';
                        html += '<td>' + data[i].data_kaders.nama_kader + '</td>';
                        html += '<td>' + data[i].status_hadir + '</td>';
                        html += '<td>' + data[i].keterangan + '</td>';
                        html += '<tr>';
                    }
                    $('#dataTable tbody').html(html);
                },
            });
        });
    });
</script>
@endsection