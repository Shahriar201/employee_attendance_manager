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

    public function employeeAttendanceList() {
        $employeeAttendances = DB::table('employee_attendances')
                            ->leftJoin('employees', 'employee_attendances.employee_id', 'employees.id')
                            ->select('employee_attendances.*', 'employees.name')
                            ->where('employee_id', auth()->user()->id)
                            ->get();

        return view('backend.empolyee-attendance.view-employee-attendance', compact('employeeAttendances'));
    }

    public function employeeAttendanceReport() {
        $attendanceReports = DB::table('employee_attendances')
                            ->leftJoin('employees', 'employee_attendances.employee_id', 'employees.id')
                            ->select('employee_attendances.*', 'employees.name')
                            ->where('employee_id', auth()->user()->id)
                            ->orderBy('employee_attendances.id', 'desc')
                            ->get();

        return view('backend.empolyee-attendance.view-employee-attendance-report', compact('attendanceReports'));
    }

    public function allEmployeeAttendanceList () {
        $allEmployeeAttendances = EmployeeAttendance::select('date')->groupBy('date')->orderBy('id', 'desc')->get();

        // $allEmployeeAttendances = DB::table('employee_attendances')
        //                     ->leftJoin('employees', 'employee_attendances.employee_id', 'employees.id')
        //                     ->select('employee_attendances.*', 'employees.name', 'employee_attendances.date')
        //                     ->groupBy('employee_attendances.date')
        //                     ->orderBy('employee_attendances.id', 'desc')
        //                     ->get();

        return view('backend.empolyee-attendance.view-allEmployee-attendance', compact('allEmployeeAttendances'));
    }

    public function employeeAttendanceDetails ($date) {

        $attendanceDetails = DB::table('employee_attendances')
                            ->leftJoin('employees', 'employee_attendances.employee_id', 'employees.id')
                            ->select('employee_attendances.*', 'employees.name')
                            ->where('date', $date)
                            ->get();

        // $attendanceDetails = EmployeeAttendance::where('date', $date)->get();

        return view('backend.empolyee-attendance.employee-attendance-details', compact('attendanceDetails'));
    }
}
