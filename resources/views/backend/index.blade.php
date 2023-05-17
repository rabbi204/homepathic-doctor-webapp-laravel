@extends('backend.admin_master')
@section('backend_content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
    </ol>
</div>

<div class="row mb-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card h-100">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col">
                        <div class="text-xs font-weight-bold text-uppercase mb-1">Total Patient</div>
                        @php
                            $patient = App\Models\Patient::all()->count();
                        @endphp
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $patient }}</div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-heart fa-2x text-primary"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <h4 class="text-uppercase text-bold text-primary">All Patient List</h4>
        <table class="table table-hover" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Serial No</th>
                    <th scope="col">Date(D-M-Y)</th>
                    <th scope="col">Patient Name</th>
                    <th scope="col">Patient Phone</th>
                    <th scope="col">Patient Diseases</th>
                    <th scope="col">Reminder Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($patient_data as $data)
                <tr>
                    <th scope="row">{{ $data->serial_no }}</th>
                    <td>{{ date('d-m-Y', strtotime($data->date)) }}</td>
                    <td>{{ $data->patient_name }}</td>
                    <td>{{ $data->phone }}</td>
                    <td>{{ $data->patient_diseases }}</td>
                    <td><span class="badge badge-warning" style="height: 30px;width: 113px;line-height: 24px;font-size: 15px;">
                        {{ date('d-m-Y', strtotime($data->reminder_date)) }}</span>
                    </td>
                    <td>
                        <a href="{{ route('patient.profile', $data->id) }}" class="btn btn-primary btn-sm">profile</a>
                        <a href="{{ route('patient.edit', $data->id) }}" class="btn btn-warning btn-sm">edit</a>
                        <a onclick="return confirm('Are You Sure to Delete this data?')" href="{{ route('patient.delete', $data->id) }}" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>        
    </div>
</div>
@endsection