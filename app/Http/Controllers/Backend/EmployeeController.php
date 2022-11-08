<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function storeEmployee(Request $request){

        // data validation
        $this->validate($request,[
            'role'          => 'required|exists:roles,name',
            'name'          => 'required',
            'email'         => 'required|email|unique:employees,email',
            'password'      => 'required|min:6',
        ]);

        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password = bcrypt($request->password);
        $data->save();
        $data->assignRole($request->role);

        return redirect()->route('employees.view')->with('success', 'Data inserted successfully');
    }

    public function editEmployee($id){
        $editData = User::find($id);
        $roles = Role::all();

        return view('backend.empolyee.edit-employee', compact('editData', 'roles'));
    }

    public function updateEmployee(Request $request, $id){

        $data = User::findOrFail($id);

        $this->validate($request,[
            'role'       => 'required|exists:roles,name',
            'name'          => 'required',
            'email'         => 'required|email|unique:employees,email,'.$data->id,
        ]);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->save();
        $data->syncRoles($request->role);

        return redirect()->route('employees.view')->with('success', 'Data updated successfully');

    }

    public function deleteEmployee(Request $request){

        $employee = User::find($request->id);
        $employee->delete();

        $employee->syncRoles([]);

        return redirect()->back()->with('success', 'Data deleted successfully');
    }
}
