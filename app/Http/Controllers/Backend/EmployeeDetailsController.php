<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\EmployeeDetails;
use Illuminate\Http\Request;

class EmployeeDetailsController extends Controller
{
    public function viewEmployeeDetails() {

        $employeeDetails = EmployeeDetails::all();

        return view('backend.empolyee-details.view-employee-details', compact('employeeDetails'));
    }
}
