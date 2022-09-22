<?php

namespace Database\Seeders;
use App\Models\School\School;
use Illuminate\Database\Seeder;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schools = [
            'School of Computing',
            'School of Medicine',
        ];

        foreach ($schools as $school){
            $new_school = new School();
            $new_school->name = $school;
            $new_school->save();
        }
    }
}
