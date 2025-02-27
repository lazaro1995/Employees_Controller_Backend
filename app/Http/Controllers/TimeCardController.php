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

    function getDaysInRange($startDate, $endDate)
{
    $days = [];
    $start = Carbon::parse($startDate);
    $end = Carbon::parse($endDate);

    while ($start->lte($end)) {
        $days[] = $start->toDateString();
        $start->addDay();
    }

    return $days;
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        return new TimecardCollection(Timecard::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show($employee,  Request $request)
    {
        
        $dayswithdata = TimeCard::all()->where('employee_id', $employee)
            ->whereBetween('punch_date',[$request->dateStart,$request->dateEnd])
            ->sortBy('punch_date')
            ->sortBy('punch_time')
            ->flatten(1)->groupBy('punch_date')->values();
         $daysArray = $this->getDaysInRange($request->dateStart, $request->dateEnd);

         foreach($daysArray as $day){
            $cont = 0;
            foreach($dayswithdata as $days){
                if($day === $days[0]->punch_date){
                    $result[] = $days;
                    $cont = 1;
                }
            }
            if($cont === 0){
                $result[] = $day;
            }
        }
        $collection = collect($result);
       
        return $collection->map(function ($item) {
            $cont = 0;
            $newArray = [];
            $exceptionArray = [
                'id' => 'error',
                'punch_type' => 'Missing punch',
                'punch_date' => 'Missing punch',
                'status'=> 'Missing punch',
                'employee_id' => 'Missing punch',
                'punch_time' => 'Missing punch',
                'created_at' => 'Missing punch',
                'updated_at' => 'Missing punch'
            ];
            if(is_string($item)){
                return[
                    'day' => $item,
                    'data'=> ''
                   ];
            }
            else{
                foreach($item as $array){
                    if($array->punch_type == 1 && $cont == 0){
                        $cont = 1;
                        $newArray [] = $array;
                    }
                    else if($array->punch_type == 2 && $cont == 1){
                        $cont = 0;
                        $newArray[] = $array;
                    }
                    else{
                        $newArray[] = $exceptionArray;
                        $newArray[] = $array;
                        if($array->punch_type ==2){
                            $cont = 0;
                        }
                        else{
                            $cont = 1;
                        }
                    }
                }
                if($cont == 1){
                    $newArray[] = $exceptionArray;  
                }
                return[
                    'day'=> Carbon::parse($item[0]->punch_date)->format('Y-m-d'),
                    'data' => $newArray 
            
                   ];
            } 
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
        $timeCard->update($request->all());
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
