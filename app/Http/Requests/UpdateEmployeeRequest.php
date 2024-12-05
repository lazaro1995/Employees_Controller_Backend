<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $method = $this->method();
        if($method == 'PUT' ){
            return [
                'first_name' => ['required'],
                'last_name' => ['required'],
                'employee_id' => ['required'],
                'company_id' => ['required'],
                'city' => ['required'],
                'state' => ['required'],
                'street' => ['required'],
                'postal_code' => ['required'],
                'status' => ['required'],
                'country' => ['required'],
                'emergency_contact' => ['required'],
                'emergency_phone' => ['required'],
                'company' => ['required'],
                'phone' => ['required'],
                'email' => ['required'],
            ];
        }else{
            return[
                'first_name' => ['sometimes'],
                'last_name' => ['sometimes'],
                'employee_id' => ['sometimes'],
                'company_id' => ['sometimes'],
                'city' => ['sometimes'],
                'state' => ['sometimes'],
                'street' => ['sometimes'],
                'postal_code' => ['sometimes'],
                'country' => ['sometimes'],
                'emergency_contact' => ['sometimes'],
                'emergency_phone' => ['sometimes'],
                'status' => ['sometimes'],
                'company' => ['sometimes'],
                'phone' => ['sometimes'],
                'email' => ['sometimes'],
            ];

        }
    }
}
