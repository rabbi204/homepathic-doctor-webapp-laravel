@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
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
                @foreach ($all_data as $data)
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