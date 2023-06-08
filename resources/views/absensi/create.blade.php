@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:100%">
        <div class="title_data d-flex" style="justify-content: space-between; margin:20px">
            <div class="col d-flex">
                <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
                <h2 class="fw-bold">Edit Absensi Kader</h2>
            </div>
        </div>
        <form method="POST" action="{{ route('storeAbsensiKader') }}">
            @csrf
            <div class="card-body">
                <label for="Name" class="form-label">Pilih Bulan Absensi</label>
                <input type="month" class="form-control" placeholder="Pilih Bulan Absensi" name="bulan_absensi" id="bulan_absensi" required>
            </div>
            <div class="card-body">
                <table id="dataTable" class="table table-striped mb-3" style="width:100%">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select_all"></th>
                            <th>Nama Kader</th>
                            <th>Status Hadir</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kaders as $kader)
                        <tr>
                            <td><input type="checkbox" name="checkbox" data-input-id="{{ $kader->id }}" value="{{ $kader->id }}"></td>
                            <td><input type="hidden" name="id_kader[]" value="{{ $kader->id }}">{{ $kader->nama_kader }}</td>
                            <td>
                                <input type="text" name="status[]" id="status_{{ $kader->id }}" value="tidak hadir" class="form-control" placeholder="status" readonly>
                            </td>
                            <td><input type="text" name="keterangan[]" class="form-control" placeholder="Keterangan"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="btn btn-success">Submit</button>
            </div>
        </form>
    </div>
</section>
@endsection

@section('js')
<script>
    $(document).ready(function() {
        $('#select_all').click(function() {
            var checkboxes = $('input[type="checkbox"]');
            var isChecked = $(this).prop('checked');

            checkboxes.each(function() {
                $(this).prop('checked', isChecked);
                var inputId = $(this).data('input-id');

                if (isChecked) {
                    $('#status_' + inputId).val('hadir');
                } else {
                    $('#status_' + inputId).val('tidak hadir');
                }
            });
        });

        $('input[type="checkbox"]').change(function() {
            var isChecked = $(this).prop('checked');
            var inputId = $(this).data('input-id');

            console.log(isChecked);
            console.log(inputId);

            if (isChecked) {
                $('#status_' + inputId).val('hadir');
            } else {
                $('#status_' + inputId).val('tidak hadir');
            }
        });

    })
</script>
@endsection