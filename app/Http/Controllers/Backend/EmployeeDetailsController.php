<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeDetailsController extends Controller
{
    public function viewEmployeeDetails() {

        $employeeDetails = DB::table('employee_details')
                            ->join('employees', 'employee_details.employee_id', 'employees.id')
                            ->select('employee_details.*', 'employees.name', 'employees.status')
                            ->get();

        return view('backend.empolyee-details.view-employee-details', compact('employeeDetails'));
    }
}
