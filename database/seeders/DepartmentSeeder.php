<?php

namespace Database\Seeders;
use App\Models\Department\Department;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'school_id' => '1',
                'name' => 'Information Technology'
            ],
            [
                'school_id' => '1',
                'name' => 'Computer Science'
            ]
            
        ];

        foreach ($departments as $department){
            $new_department = new Department();
            $new_department->school_id = $department['school_id'];
            $new_department->name = $department['name'];
            $new_department->save();
        }
    }
}
