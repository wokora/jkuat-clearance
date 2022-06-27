<?php

namespace Database\Seeders;

use App\Models\User\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'surname' => 'Okora',
                'first_name' => 'Nyangoto',
                'email' => 'wokora@jkuat.ac.ke',
                'password' => 7060
            ]
        ];

        foreach ($users as $user){
            $new_user = new User();
            $new_user->surname = $user['surname'];
            $new_user->first_name = $user['first_name'];
            $new_user->password = Hash::make( $user['password'] );
            $new_user->email = $user['email'];
            $new_user->save();
        }
    }
}
