<?php

namespace App\Http\Controllers;

use App\Http\Resources\TimecardCollection;
use App\Models\Employee;
use App\Models\TimeCard;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //

        $timecards = TimeCard::all()->whereBetween('punch_date',[$request->dateStart,$request->dateEnd])
        ->sortBy('punch_date')->groupBy('employee_id');
//        where('employee_id', $employee);
        return new TimecardCollection($timecards);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($employee,  Request $request)
    {
        
        $result = TimeCard::all()->where('employee_id', $employee)
            ->whereBetween('punch_date',[$request->dateStart,$request->dateEnd])
            ->sortBy('punch_date')
            ->flatten(1)->groupBy('punch_date')->values();
        return $result->map(function ($item) {
            return [
                'day'=> Carbon::parse($item[0]->punch_date)->format('D m/d'),
                'data' => $item
            ];
        });

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TimeCard $timeCard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TimeCard $timeCard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( Request $request)
    {
        //

        $timecard = TimeCard::find($request->id);
        $timecard->delete();
    }
}
