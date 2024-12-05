<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use App\Http\Resources\EmployeeCollection;
use App\Models\Employee;
use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Filters\EmployeeFilter;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $id = Auth::id();
        $client_id = User::find($id)->client_id;
        //$company_id = Company::all()->where('client_id','LIKE',  $client_id)->value('id');
        $filter = new EmployeeFilter();
        $queryItems = $filter->transform($request);
        $employees = Employee::where($queryItems)->where('client_id', $client_id);
        return new EmployeeCollection($employees->paginate()->appends($request->query()));





//        if ($request->option == 'allEmployees'){
//            $request1 = Employee::all()->where('client_id', $client_id);
//        }
//        else{
//            $request1 = Employee::all()->where('client_id', $client_id)->where('status',1);
//        }
//        return new EmployeeCollection($request1);
    }

    /**
     * Show the form for creating a new resource.
     */
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
    public function show(Employee $employee)
    {
        //
        $id = Auth::id();
        $client_id = User::find($id)->client_id;
        if ($employee->client_id == $client_id ){
            return new EmployeeCollection($employee);
        }
        return ('Access Denied');
//        $request = Employee::find($employee);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmployeeRequest $request, Employee $employee)
    {
        //
//        return $request;
       $employee->update($request->all());

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        //
        $employee->delete();
    }
}
