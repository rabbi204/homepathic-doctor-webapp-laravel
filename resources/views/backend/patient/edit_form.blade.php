@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Update Patient Data</h6>
            </div>
            <!------ Form Error Message Show-------->
            @if ($errors->any())
                <div id="error" class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ $errors->first() }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                {{--  success msg show  --}}
            @if(session()->has('success'))
                <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session()->get('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="card-body">
                <form action="{{ route('patient.update', $edit_data->id) }}" method="POST">
                    @csrf
                   <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Serial No<span class="text-danger">*</span></label>
                                <input type="text" name="serial_no" value="{{ $edit_data->serial_no }}" readonly class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date(Y-m-d)<span class="text-danger">*</span></label>
                                <input type="text" name="date" value="{{ $edit_data->date }}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Patient Name<span class="text-danger">*</span></label>
                                <input type="text" name="patient_name" value="{{ $edit_data->patient_name }}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Phone Number<span class="text-danger">*</span></label>
                                <input type="text" name="phone" value="{{ $edit_data->phone }}" class="form-control" >
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Patient Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" value="{{ $edit_data->address }}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Patient Diseases Name<span class="text-danger">*</span></label>
                                <input type="text" name="patient_diseases" value="{{ $edit_data->patient_diseases }}" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Diseases Description<span class="text-danger">*</span></label>
                                <textarea name="diseases_desc" class="form-control" id="editor" cols="30" rows="3">
                                    {{ $edit_data->diseases_desc }}
                                </textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <strong class="text-primary">Remainder:</strong>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Reminder Date(Y-m-d)<span class="text-danger">*</span></label>
                                <input type="text" name="reminder_date" value="{{ $edit_data->reminder_date }}" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h4 class="text-primary text-bold">Prescription List:</h4>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>Medicine Name</th>
                                        <th>Use of Medicine</th>
                                        <th>Medicine Start Date</th>
                                        <th>Medicine End Date</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        @php
                                            $medicine_list = json_decode($edit_data->medicine_name);
                                            $medicine_uses_list = json_decode($edit_data->medicine_use);
                                            $medicine_start_date = json_decode($edit_data->medicine_start_date);
                                            $medicine_end_date = json_decode($edit_data->medicine_end_date);
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
                                            <input type="text" value="{{ $start }}" class="form-control mt-2" readonly />
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach ($medicine_end_date as $end)
                                            <input type="text" value="{{ $end }}" class="form-control mt-2" readonly />
                                            @endforeach
                                        </td>
                                    </tr>
    
                                    <tr>
                                        <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add New Medicine</button></td>
                                    </tr>
                                </table>
                            </div>
                        </div>


                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        
                   </div>
                </form>
            </div>
        </div>
    </div>
</div>

@section('scripts')
<script type="text/javascript">
    var i = 0;
    $("#dynamic-ar").click(function () {
        ++i;
        // $("#dynamicAddRemove").append('<tr><td><div class="row"><div class="col-md-6"><input type="text" name="medicine_name[' + i +
        //     ']" placeholder="Enter medicine name" class="form-control" /></div><div class="col-md-6"><input type="text" name="medicine_use[' + i +']" placeholder="use of medicine" class="form-control" /></div></td><td><button type="button" class="btn btn-outline-danger remove-input-field">remove</button></td></tr>'
        // ); 
        
        
        $("#dynamicAddRemove").append('<tr><td><input type="text" name="medicine_name['+ i +']" placeholder="medicine" class="form-control" /></td><td><input type="text" name="medicine_use['+ i +']" placeholder="use of medicine" class="form-control" /></td><td><input type="date" name="start_date['+ i +']" class="form-control" /></td><td><input type="date" name="end_date['+ i +']" class="form-control" /></td><td><button style="font-size: 13px" type="button" class="btn btn-outline-danger remove-input-field"><i class="fa fa-minus-circle fa-2x" aria-hidden="true"></i></button></td></tr>');


    });
    $(document).on('click', '.remove-input-field', function () {
        $(this).parents('tr').remove();
    });
</script>
@endsection
@endsection