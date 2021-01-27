<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;

class EmployeesController extends Controller
{
    public function index()
    {
        return view('employees.index');
    }

    public function GetAllEmployeesJson()
    {
        $employees = Employee::leftJoin('companies', 'employees.company_id', '=', 'companies.id')
               ->get([
                   'employees.*',
                   'companies.name as company_name'
                   ]);
        return $employees;
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'company_id' => 'required'
        ]);

        Employee::create(array(
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'birth_date' => $request->input('birth_date'),
            'company_id' => $request->input('company_id')
        ));

        return redirect('/employees');
    }

    public function edit($id)
    {
        $employee = Employee::all()->where('id', $id)->first();
        return view('employees.edit')->with('employee', $employee);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required',
            'company_id' => 'required'
        ]);

        Employee::where('id', $id)->update(array(
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'birth_date' => $request->input('birth_date'),
            'company_id' => $request->input('company_id')
        ));

        return redirect('/employees');
    }

    public function destroy($id)
    {
        Employee::where('id', $id)->delete();
        return 'success';
    }
}
