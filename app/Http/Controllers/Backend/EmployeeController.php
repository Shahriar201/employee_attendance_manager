<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\EmployeeContacts;
use App\Models\EmployeeDetails;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class EmployeeController extends Controller
{
    public function viewEmployee() {

        $employees = User::all();

        return view('backend.empolyee.view-employee', compact('employees'));
    }

    public function addEmployee(){
        $data['roles'] = Role::all();

        return view('backend.empolyee.add-employee', $data);
    }

    public function storeEmployee(Request $request) {

        // data validation
        $this->validate($request,[
            'role'          => 'required|exists:roles,name',
            'name'          => 'required',
            'email'         => 'required|email|unique:employees,email',
            'address'       => 'required',
            'mobile'        => 'required',
            'status'        => 'required',
            'contact_name'  => 'required',
            'contact_email' => 'required',
            'password'      => 'required|min:6',
            // 'image'         => 'required',
        ]);

        DB::beginTransaction();

        try {
            // Store Employee
            $employee = new User();
            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->status = $request->status;
            $employee->password = bcrypt($request->password);
            $employee->created_by = auth()->user()->id;
            $employee->save();
            $employee->assignRole($request->role);

            // Store Employee Details
            $employeeDetails = new EmployeeDetails();
            $employeeDetails->employee_id = $employee->id;
            $employeeDetails->address = $request->address;
            $employeeDetails->mobile = $request->mobile;
            $employeeDetails->created_by = auth()->user()->id;

            if($request->file('image')) {
                $file = $request->file('image');
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $fileName);
                $employeeDetails['image'] = $fileName;
            }

            $employeeDetails->save();

            // Store Employee Contact
            $employeeContact = new EmployeeContacts();
            $employeeContact->employee_id = $employee->id;
            $employeeContact->contact_name = $request->contact_name;
            $employeeContact->contact_email = $request->contact_email;
            $employeeContact->created_by = auth()->user()->id;
            $employeeContact->save();

            DB::commit();

            return redirect()->route('employees.view')->with('success', 'Data store successfully');

        } catch (\Throwable $th) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Data updated fail');
        }


    }

    public function editEmployee($id){
        $editData = User::find($id);
        $employeeDetails = EmployeeDetails::where('employee_id', $editData->id)->first();
        $roles = Role::all();

        return view('backend.empolyee.edit-employee', compact('editData', 'roles', 'employeeDetails'));
    }

    public function updateEmployee(Request $request, $id){

        $employee = User::findOrFail($id);

        $employeeDetails = EmployeeDetails::where('employee_id', $employee->id)->first();

        $this->validate($request,[
            'role'       => 'required|exists:roles,name',
            'name'          => 'required',
            'email'         => 'required|email|unique:employees,email,'.$employee->id,
            'address'       => 'required',
            'mobile'        => 'required',
            'status'        => 'required'
        ]);

        DB::beginTransaction();

        try {

            $employee->name = $request->name;
            $employee->email = $request->email;
            $employee->status = $request->status;
            $employee->updated_by = auth()->user()->id;
            $employee->save();
            $employee->syncRoles($request->role);

            $employeeDetails->address = $request->address;
            $employeeDetails->mobile = $request->mobile;
            $employeeDetails->updated_by = auth()->user()->id;

            if($request->file('image')) {
                $file = $request->file('image');
                @unlink(public_path('upload/employee_images/'.$employeeDetails->image));
                $fileName = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('upload/employee_images'), $fileName);
                $employeeDetails['image'] = $fileName;
            }

            $employeeDetails->save();

            DB::commit();

            return redirect()->route('employees.view')->with('success', 'Data updated successfully');

        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());

            return redirect()->back()->with('error', 'Data updated fail');
        }

    }

    public function deleteEmployee(Request $request){

        DB::beginTransaction();

        try {
            $employee = User::find($request->id);
            $employeeDetails = EmployeeDetails::where('employee_id', $employee->id)->first();

            if(file_exists('public/upload/employee_images/' . $employeeDetails->image) AND ! empty($employeeDetails->image)){
                unlink('public/upload/employee_images/' . $employeeDetails->image);
            }

            $employeeDetails->delete();
            $employee->delete();

            $employee->syncRoles([]);

            DB::commit();

            return redirect()->back()->with('success', 'Data deleted successfully');

        } catch (\Exception $e) {
            dd($e->getMessage());

            return redirect()->back()->with('error', 'Data updated fail');
        }
    }
}
