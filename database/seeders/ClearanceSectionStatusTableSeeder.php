<?php

namespace Database\Seeders;

use App\Models\Clearance\SectionStatus;
use App\Models\Clearance\StepStatus;
use Illuminate\Database\Seeder;

class ClearanceSectionStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Cleared',
            'Not Cleared'
        ];

        foreach ($statuses as $status){
            $clearance_step_status = new SectionStatus();
            $clearance_step_status->name = $status;
            $clearance_step_status->save();
        }
    }
}
