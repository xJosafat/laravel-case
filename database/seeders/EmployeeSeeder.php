<?php

namespace Database\Seeders;

use App\Models\Employee;
use DateTime;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Employee::truncate();
        $csvFile = fopen(base_path("database/data/employee_data.csv"), "r");
        $firstLine = true;
        while (($data = fgetcsv($csvFile, 2000, ",")) !== FALSE) {
            if (!$firstLine) {
                Employee::create([
                    "id" => $data[0],
                    "name_prefix" => $data[1],
                    "first_name" => $data[2],
                    "middle_initial" => $data[3],
                    "last_name" => $data[4],
                    "gender" => $data[5],
                    "email" => $data[6],
                    "father_name" => $data[7],
                    "mother_name" => $data[8],
                    "mother_maiden_name" => $data[9],
                    "birth_date" => DateTime::createFromFormat('m/d/Y', $data[10]),
                    "joining_date" => DateTime::createFromFormat('m/d/Y', $data[11]),
                    "salary" => $data[12],
                    "ssn" => $data[13],
                    "phone" => $data[14],
                    "city" => $data[15],
                    "state" => $data[16],
                    "zip" => $data[17],
                ]);
            }
            $firstLine = false;
        }

        fclose($csvFile);
    }
}
