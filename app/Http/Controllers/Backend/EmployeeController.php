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
            'email'         => 'required|email|unique:users,email',
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
}
