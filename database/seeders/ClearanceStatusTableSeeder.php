<?php

namespace Database\Seeders;

use App\Models\Clearance\Status;
use Illuminate\Database\Seeder;

class ClearanceStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $statuses = [
            'Pending Submission',
            'Submitted',
        ];

        foreach ($statuses as $status){
            $clearance_status = new Status();
            $clearance_status->name = $status;
            $clearance_status->save();
        }
    }
}
