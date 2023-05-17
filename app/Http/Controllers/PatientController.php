<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PatientController extends Controller
{
    /************************
     * show dashboard page
     */
    public function dashboardShow()
    {
        $patient_data = Patient::latest()->get();
        return view('backend.index', compact('patient_data'));
    }
    /**
     *  show patient form
     */
    public function showForm()
    {
        return view('backend.patient.show_form');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'serial_no' => 'required|unique:patients,serial_no,integer|digits_between:2,10',
            'date' => 'required',
            'patient_name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'patient_diseases' => 'required',
            'diseases_desc' => 'required',
            'reminder_date' => 'required',
            'medicine_name*' => 'required',
            'medicine_use*' => 'required',
            'start_date*' => 'required',
            'end_date*' => 'required'
        ]);

        // dd($request->end_date);
        
        //get array data from form
        $medi_array = $request->medicine_name;
        $medi_use_array = $request->medicine_use;
        $medi_start_date = $request->start_date;
        $medi_end_date = $request->end_date;

        $patient_data = new Patient();
        $patient_data->serial_no = $request->serial_no;
        $patient_data->date = $request->date;
        $patient_data->patient_name = $request->patient_name;
        $patient_data->phone = $request->phone;
        $patient_data->address = $request->address;
        $patient_data->patient_diseases = $request->patient_diseases;
        $patient_data->diseases_desc = $request->diseases_desc;
        $patient_data->reminder_date = $request->reminder_date;
        $patient_data->medicine_name = json_encode($medi_array);
        $patient_data->medicine_use = json_encode($medi_use_array);
        $patient_data->medicine_start_date = json_encode($medi_start_date);
        $patient_data->medicine_end_date = json_encode($medi_end_date);
        $patient_data->save();

        Alert::toast('You\'ve Successfully Created New Patient', 'success');
        return redirect()->back();

        // return back()->with('success', 'Patient Added Successfully');
    }
    /**
     *  all patient list
     */
    public function allPatient()
    {
        $all_data = Patient::latest()->get();
        return view('backend.patient.show_all_patient', compact('all_data'));
    }
    /**
     *  edit data
     */
    public function editData($id)
    {
        $edit_data = Patient::find($id);
       return view('backend.patient.edit_form', compact('edit_data'));
    }
    /**
     *  update data
     */
    public function updateData(Request $request, $id)
    {
        $request->validate([
            'date' => 'required',
            'patient_name' => 'required',
            'phone' => 'required|regex:/(01)[0-9]{9}/',
            'address' => 'required',
            'patient_diseases' => 'required',
            'diseases_desc' => 'required',
            'reminder_date' => 'required',
            'medicine_name*' => 'required',
            'medicine_use*' => 'required',
            'start_date*' => 'required',
            'end_date*' => 'required'
        ]);

        // dd($request->all());
        $patient_data = Patient::find($id);


        if($request->medicine_name == null && $request->medicine_use==null && $request->start_date == null && $request->end_date ){
            $patient_data->date = $request->date;
            $patient_data->patient_name = $request->patient_name;
            $patient_data->phone = $request->phone;
            $patient_data->address = $request->address;
            $patient_data->patient_diseases = $request->patient_diseases;
            $patient_data->diseases_desc = $request->diseases_desc;
            $patient_data->reminder_date = $request->reminder_date;
            $patient_data->update();

            Alert::toast('Successfully Updated Information', 'success');
            return redirect()->back();
            // return redirect()->back()->with('success','Information Updated Successful');
        }else{
            // for medicine array
            $old_medicine_list = $patient_data->medicine_name;
            $x = json_decode($old_medicine_list);
            $new_medicine_list = $request->medicine_name;
            $total_array_of_medicine = array_merge($x, $new_medicine_list);
            // dd($total_array_of_medicine);

            //for use of medicine array 
            $old_medicine_use_list = $patient_data->medicine_use;
            $y = json_decode($old_medicine_use_list);
            $new_medicine_use_list = $request->medicine_use;
            $total_array_of_medicine_use = array_merge($y, $new_medicine_use_list);
            // dd($total_array_of_medicine_use);

            //for medicine start date
            $old_medicine_start_date = $patient_data->medicine_start_date;
            $z = json_decode($old_medicine_start_date);
            $new_medicine_start_date = $request->start_date;
            $total_medicine_start_date_array = array_merge($z,$new_medicine_start_date);

            //for medicine end date
            $old_medicine_end_date = $patient_data->medicine_end_date;
            $j = json_decode($old_medicine_end_date);
            $new_medicine_end_date = $request->end_date;
            $total_medicine_start_date_array = array_merge($j,$new_medicine_end_date);


            $patient_data->date = $request->date;
            $patient_data->patient_name = $request->patient_name;
            $patient_data->phone = $request->phone;
            $patient_data->address = $request->address;
            $patient_data->patient_diseases = $request->patient_diseases;
            $patient_data->diseases_desc = $request->diseases_desc;
            $patient_data->reminder_date = $request->reminder_date;
            $patient_data->medicine_name = json_encode($total_array_of_medicine);
            $patient_data->medicine_use = json_encode($total_array_of_medicine_use);
            $patient_data->medicine_start_date = json_encode($total_medicine_start_date_array);
            $patient_data->medicine_end_date = json_encode($total_medicine_start_date_array);
            $patient_data->update();

            Alert::toast('Successfully Updated Information', 'success');
            return redirect()->back();
            // return redirect()->back()->with('success','Information Updated Successful');
        }
    }
    /********************************
     * patient profile show 
     */
    public function patientProfileShow($id)
    {
        $patient_data = Patient::findOrFail($id);
        return view('backend.patient.patient_profile', compact('patient_data'));
    }
    /****************************************
     *  delete patient data
     */
    public function deletePatientData($id)
    {
        Patient::findOrFail($id)->delete();
        Alert::toast('You\'ve Successfully Deleted Patient Data', 'success');
        return back();
    }
}
