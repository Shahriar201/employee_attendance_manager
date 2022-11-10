<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\EmployeeAttendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeAttendanceController extends Controller
{
    public function employeeAttendanceAdd() {
        return view('backend.employee-attendance.add-employee-attendance');
    }

    public function employeeAttendanceStore(Request $request) {

        $this->validate($request,[
            'date'          => 'required'
        ]);

        $today = date('d-m-Y');

        $todaysEmployee = DB::table('employee_attendances')->where('employee_id', $request->id)->where('date', $today)->first();

        if ($todaysEmployee) {

            $employeeId = $todaysEmployee->id;

            if ($request->date == $today && $employeeId) {
                $employeeAttendance = EmployeeAttendance::findOrFail($employeeId);
                $employeeAttendance->touch();

                return redirect()->back()->with('success', 'Attendance checkout successfully!');
            }
        }

        else {
            $employeeAttendance = new EmployeeAttendance();
            $employeeAttendance->date = $request->date;
            $employeeAttendance->employee_id = auth()->user()->id;
            $employeeAttendance->touch();

            return redirect()->back()->with('success', 'Attendance check in successfully!');
        }
    }
}