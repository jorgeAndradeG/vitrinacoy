<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $super_admins = [
            ['name' => 'Jorge Andrade', 'email' => 'gomezjorgeandrade@gmail.com', 'password' => Hash::make('123456'), 'es_admin' => '1'],
            ['name' => 'Franco Paillaleve', 'email' => 'frankodfi530@gmail.com', 'password' => Hash::make('123456'), 'es_admin' => '1']
        ];
        foreach($super_admins as $sa){
            User::create($sa);
        }
    }
}
