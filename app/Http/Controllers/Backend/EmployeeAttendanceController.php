<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeAttendanceController extends Controller
{
    public function employeeAttendanceAdd() {
        return view('backend.employee-attendance.add-employee-attendance');
    }
}
