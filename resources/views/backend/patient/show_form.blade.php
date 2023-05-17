@extends('backend.admin_master')
@section('backend_content')
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <!-- Form Basic -->
        <div class="card mb-4">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">New patient registration</h6>
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
                <form action="{{ route('patient.store') }}" method="POST">
                    @csrf
                   <div class="form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Serial No<span class="text-danger">*</span></label>
                                <input type="text" name="serial_no" placeholder="Ex: 101" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Date<span class="text-danger">*</span></label>
                                <input type="date" name="date" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Patient Name<span class="text-danger">*</span></label>
                                <input type="text" name="patient_name" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Phone Number<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control" >
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Patient Address<span class="text-danger">*</span></label>
                                <input type="text" name="address" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Patient Diseases Name<span class="text-danger">*</span></label>
                                <input type="text" name="patient_diseases" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Diseases Description<span class="text-danger">*</span></label>
                                <textarea name="diseases_desc" class="form-control" id="editor" cols="30" rows="3"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <strong>Remainder:</strong>
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Reminder Date<span class="text-danger">*</span></label>
                                <input type="date" name="reminder_date" class="form-control" >
                            </div>
                        </div>


                        {{-- <div class="col-md-12">
                            <table class="table table-bordered" id="dynamicAddRemove">
                                <tr>
                                    <th>Write Medicine Name and Uses of medicine</th>
                                    <th>Action</th>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="text" name="medicine_name[0]" placeholder="medicine" class="form-control" />
                                            </div>
                                            <div class="col-md-3">
                                                <input type="text" name="medicine_use[0]" placeholder="use of medicine" class="form-control" />
                                            </div>

                                            <div class="col-md-3">
                                                <input type="date" name="start_date" class="form-control" />
                                            </div>

                                            <div class="col-md-3">
                                                <input type="date" name="end_date" class="form-control" />
                                            </div>
                                        </div>
                                    </td>
                                    <td><button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Medicine</button></td>
                                </tr>
                            </table>
                        </div> --}}

                        <br><br><br>
                        <div class="col-md-12" class="mt-5">
                            <table class="table table-bordered mt-5" id="dynamicAddRemove">
                                <thead>
                                    <tr>
                                        <th scope="col">Name of Madicine</th>
                                        <th scope="col">Use of Medicine</th>
                                        <th scope="col">Start Date</th>
                                        <th scope="col">End Date</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" name="medicine_name[0]" placeholder="medicine" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="text" name="medicine_use[0]" placeholder="use of medicine" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="date" name="start_date[0]" class="form-control" />
                                        </td>
                                        <td>
                                            <input type="date" name="end_date[0]" class="form-control" />
                                        </td>
                                        <td>
                                            {{-- <button type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary">Add Medicine</button> --}}
                                            <button style="font-size: 13px" type="button" name="add" id="dynamic-ar" class="btn btn-outline-primary"><i class="fa fa-plus-circle fa-2x" aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            
                        </div>

                        <div class="col-md-12 mt-2">
                            <button type="submit" class="btn btn-primary">Save</button>
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
{{-- [medicine] --}}

{{-- [medicine] --}}