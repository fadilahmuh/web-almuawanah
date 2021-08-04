<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin1 = User::create([
            'name' => 'Super Admin Almuawanah',
            'email' => 'superadmin@test.com',
            'username' => 'superadmin',
            'password' => bcrypt('123456789')
        ]);

        $admin1 -> assignRole('superadmin');

        $admin2 = User::create([
            'name' => 'Admin Yayasan Almuawanah',
            'email' => 'adminyys@test.com',
            'username' => 'adminyys',
            'password' => bcrypt('123456789')
        ]);

        $admin2 -> assignRole('admin_yys');
    }
}
