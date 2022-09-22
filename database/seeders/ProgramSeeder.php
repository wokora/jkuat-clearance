<?php

namespace Database\Seeders;
use App\Models\Programme\Program;
use Illuminate\Database\Seeder;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $programs = [
            
            'Bsc Information Technology',
            'Bsc Computer Science'
        ];

        foreach ($programs as $program){
            $new_program = new Program();
            $new_program->name = $program;
            $new_program->save();
        }
    }
}
