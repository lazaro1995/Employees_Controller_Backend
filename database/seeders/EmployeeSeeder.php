<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('employees')->insert([
            'first_name' => "lazaro",
            'last_name' => "hondares",
            'employee_id' => "256534",
            'status' => true,
            'company_id' => 1,
            'client_id' => 2

        ]);
        DB::table('employees')->insert([
            'first_name' => "alfredo",
            'last_name' => "diaz",
            'employee_id' => "2312313",
            'status' => true,
            'company_id' => 1,
            'client_id' => 2
        ]);
        DB::table('employees')->insert([
            'first_name' => "ciro",
            'last_name' => "ponzoa",
            'employee_id' => "2332444",
            'status' => true,
            'company_id' => 1,
            'client_id' => 2
        ]);
        DB::table('employees')->insert([
            'first_name' => "fernando",
            'last_name' => "libera",
            'employee_id' => "2112323",
            'status' => true,
            'company_id' => 1,
            'client_id' => 2
        ]);
        DB::table('employees')->insert([
            'first_name' => "angel",
            'last_name' => "hondares",
            'employee_id' => "2112323",
            'status' => true,
            'company_id' => 2,
            'client_id' => 2
        ]);
        DB::table('employees')->insert([
            'first_name' => "angel",
            'last_name' => "hondares",
            'employee_id' => "2112323",
            'status' => false,
            'company_id' => 2,
            'client_id' => 2
        ]);
    }
}
