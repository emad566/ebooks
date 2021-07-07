<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;
class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name'=>'Emad-admin',
            'email'=>'emade09@gmail.com',
            'password'=>bcrypt('12344321')
        ]);
    }
}
