<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeCard extends Model
{
    use HasFactory;
    protected $fillable = [
        'punch_type',
        'punch_date',
        'status',
        'employee_id',
        'punch_time'
    ];
}
