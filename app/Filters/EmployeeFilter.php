<?php
namespace App\Filters;
use Illuminate\Http\Request;

class EmployeeFilter extends ApiFilter
{
    protected $safeParams = [
        'firstName' => ['eq'],
        'lastName' => ['eq'],
        'email' => ['eq'],
        'employeeId' => ['eq'],
        'phone' => ['eq'],
        'status' => ['eq'],
        'company' => ['eq']
    ];
    protected $columnMap = [
        'firstName' => 'first_name',
        'lastName' => 'last_name',
        'employeeId' => 'employee_id',
        'company' => 'company_id'
    ];
    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
    ];

}
