<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function view() {

        $employees = User::all();

        return view('backend.empolyee.view-employee', compact('employees'));
    }
}
