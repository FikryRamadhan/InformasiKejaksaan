<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

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
            'name' => 'Chesea Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt("123"),
            'role' => 'admin'
        ]);

        Admin::create([
            'name' => 'Chesea Super Admin',
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt("123"),
            'role' => 'superadmin'
        ]);
    }
}
