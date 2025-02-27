<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'employee_id',
        'status',
        'phone',
        'email',
        'city',
        'street',
        'state',
        'country',
        'city',
        'postal_code',
        'client_id',
        'emergency_contact',
        'emergency_phone',
        'company_id'
    ];
}
