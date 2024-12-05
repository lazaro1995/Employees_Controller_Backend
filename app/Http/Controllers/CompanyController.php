<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Resources\CompanyResource;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
{
    //
    public function index(Request $request)
    {
        $id = Auth::id();
        $client_id = User::find($id)->client_id;
        $company_id = Company::all()->where('client_id','LIKE',  $client_id);
       return new CompanyResource($company_id) ;
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmployeeRequest $request)
    {
        //
        return new EmployeeCollection(Employee::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Company $company)
    {
        //

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
    }
}
