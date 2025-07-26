<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Log;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        try {
            $employee = Employee::create([
                'id_number' => 'EMP-001',
                'first_name' => 'Juan',
                'middle_name' => 'Dela',
                'middle_initial' => 'D',
                'last_name' => 'Cruz',
                'staff_chi_name' => 'Juan 哥哥',
                'birth_date' => '1990-01-01',
                'birth_place' => 'Cebu City',
                'sex' => 'male',
                'address' => '123 Mabolo, Cebu',
                'tel_num' => '032-1234567',
                'cell_num' => '09171234567',
                'contact_person' => 'Maria Dela Cruz',
                'contact_address' => '456 Banilad, Cebu',
                'contact_num' => '09181234567',
                'sss_number' => '12-3456789-0',
                'phil_health' => '1234-5678-9012',
                'tin_num' => '123-456-789',
                'sss_coverage' => 'Covered',
                'position' => 'Teacher',
                'department' => 'Junior High',
                'signature_path' => '/signatures/juan.png',
                'image_path' => '/images/employees/juan.png',
                'date_hired' => '2020-06-15',
            ]);

            Log::info('Employee seeded successfully', ['employee_id' => $employee->id]);
        } catch (\Exception $e) {
            Log::error('Failed to seed employee', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);
        }
    }
}
