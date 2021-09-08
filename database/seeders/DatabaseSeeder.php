<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '0123456789',
            'level' => 0,
            'address' => 'HN',
            'active' => 1,
            'password' => bcrypt('admin'),
        ]);
    }

}
