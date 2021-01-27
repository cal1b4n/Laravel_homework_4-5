<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function index()
    {
        return view('companies.index')->with('title', 'Companies');
    }

    public function GetAllCompaniesJson()
    {
        $companies = Company::all();
        return $companies;
    }

    public function create()
    {
        return view('companies.create')->with('title', 'Create Company');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        Company::create(array(
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country'),
        ));

        return redirect('/');
    }


    public function edit($id)
    {
        $company = Company::all()->where('id', $id)->first();
        // return $company;
        return view('companies.edit')->with('comp', $company)->with('title', 'Edit Company');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'code' => 'required',
            'address' => 'required',
            'city' => 'required',
            'country' => 'required'
        ]);

        Company::where('id', $id)->update(array(
            'name' => $request->input('name'),
            'code' => $request->input('code'),
            'address' => $request->input('address'),
            'city' => $request->input('city'),
            'country' => $request->input('country')
        ));

        return redirect('/');
    }

    public function destroy($id)
    {
        Company::where('id', $id)->delete();
        return 'success';
    }
}
