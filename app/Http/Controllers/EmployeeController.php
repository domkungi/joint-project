<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function employeelist()
    {
        $employees = Employee::all();

        return view('employee.employeelist' , ['employees' => $employees]);
    }

    public function create()
    {
        return view('employee.create');
    }

    public function store()
    {
        Employee::create([
            'name' =>  request('name'),
            'address' => request('address'),
            'phone' =>  request('phone'),
            'email' =>  request('email'),
        ]);

        return redirect('/employeelist');
    }

}
