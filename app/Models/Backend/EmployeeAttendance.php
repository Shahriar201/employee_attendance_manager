<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAttendance extends Model
{
    use HasFactory;

    protected $employee_attendances = ['created_at', 'updated_at'];
}
