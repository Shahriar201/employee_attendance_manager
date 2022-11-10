<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeContactController extends Controller
{
    public function viewEmployeeContacts() {
        $employeeContacts = DB::table('employee_contacts')
                            ->join('employees', 'employee_contacts.employee_id', 'employees.id')
                            ->select('employee_contacts.*', 'employees.name', 'employees.status')
                            ->get();

        return view('backend.empolyee-contact.view-employee-contact', compact('employeeContacts'));
    }
}
