<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role' => 'SuperAdmin',
            'name' => 'VacciNation Admin',
            'email' => 'vnsuper2022@gmail.com',
            'email_verified_at' => Carbon::now()->toDateTimeString(),
            'password' => bcrypt('vaccine1234'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
