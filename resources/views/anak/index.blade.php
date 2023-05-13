@extends('layouts.sidebar')

@section('content')
<section class="data_anak">
    <div class="card d-flex align-item-center mt-5" style="width:80%">
        <div class="title_data ">
            <img src="{{asset('assets/images/LOGO.svg')}}" alt="">
            <h2 class="fw-bold">Data Anak</h2>
        </div>
        <div class="card-body">
            <table id="dataTable" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Office</th>
                        <th>Age</th>
                        <th>Start date</th>
                        <th>Salary</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011-04-25</td>
                        <td>$320,800</td>
                    </tr>
                </tbody>    
            </table>
        </div>
    </div>
</section>
@endsection
