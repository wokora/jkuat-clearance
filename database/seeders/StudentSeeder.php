<?php

namespace Database\Seeders;

use App\Models\Student\Student;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students = [
            
            [
                'programme_id' => '1',
                'department_id' => '1',
                'surname' => 'Ojunga',
                'first_name' => 'George',
                'registration_number' => 'SCM221-1234/2022',
                'email' => 'gomondi@student.jkuat.ac.ke',
                'password' => 2567
            ]
        ];

        foreach ($students as $student){
            $new_student = new Student();
            $new_student->programme_id = $student['programme_id'];
            $new_student->department_id = $student['department_id'];
            $new_student->surname = $student['surname'];
            $new_student->first_name = $student['first_name'];
            $new_student->registration_number = $student['registration_number'];
            $new_student->email = $student['email'];
            $new_student->password = Hash::make( $student['password'] );
            $new_student->save();
        }
        
    }
}
