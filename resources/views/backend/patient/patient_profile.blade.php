@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-md-12 col-lg-12 col-sm-12">
        <h4>Profile of <span class="badge badge-success">{{ $patient_data->patient_name }}</span></h4>
    </div>
    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
        <h5 class="text-primary">Patient Information:</h5>
        <table class="table table-bordered table-hover">
            <tbody>
              <tr>
                <td>Serial No</td>
                <td>{{ $patient_data->serial_no }}</td>
              </tr>
              <tr>
                <td>Patient Coming Date</td>
                <td>{{ date('d-m-Y', strtotime($patient_data->date)) }}</td>
              </tr>
              <tr>
                <td>Phone Number</td>
                <td>{{ $patient_data->phone }}</td>
              </tr>
              <tr>
                <td>Patient Disease Name</td>
                <td>{{ $patient_data->patient_diseases }}</td>
              </tr>
              <tr>
                <td>Reminder Date</td>
                <td><span class="badge badge-warning">{{ $patient_data->reminder_date }}</span></td>
              </tr>
            </tbody>
          </table>
    </div>

    <div class="col-lg-6 col-md-6 col-sm-12 mt-3">
        <h4 class="text-primary">Patient Disease Description:</h4>
        <p>{!! $patient_data->diseases_desc !!}</p>
    </div>

    
    <div class="col-md-12 mt-4">
        <h4 class="text-primary">Prescription:</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th>Medicine Name</th>
                    <th>Use of Medicine</th>
                    <th>Medicine Start Date</th>
                    <th>Medicine End Date</th>
                </tr>
                <tr>
                    @php
                        $medicine_list = json_decode($patient_data->medicine_name);
                        $medicine_uses_list = json_decode($patient_data->medicine_use);
                        $medicine_start_date = json_decode($patient_data->medicine_start_date);
                        $medicine_end_date = json_decode($patient_data->medicine_end_date);
                    @endphp
                    <td>
                        @foreach ($medicine_list as $item)
                        <input type="text"value="{{ $item }}" class="form-control mt-2" readonly />
                        @endforeach
                    </td>
                    <td>
                        @foreach ($medicine_uses_list as $data)
                        <input type="text" value="{{ $data }}" class="form-control mt-2" readonly />
                        @endforeach
                    </td>
                    <td>
                        @foreach ($medicine_start_date as $start)
                        <input type="text" value="{{ date('d-m-Y', strtotime($start)) }}" class="form-control mt-2" readonly />
                        @endforeach
                    </td>
                    <td>
                        @foreach ($medicine_end_date as $end)
                        <input type="text" value="{{ date('d-m-Y', strtotime($end)) }}" class="form-control mt-2" readonly />
                        @endforeach
                    </td>
                </tr>
            </table>
        </div>
    </div>

</div>
@endsection