<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         User::create(

        	[
        		'name'  => 'Eduardo Moura',
        		'email' => 'oeduardomoura@gmail.com',
        		'password' => Hash::make('123'),

        	]     	
        );
    }
}
