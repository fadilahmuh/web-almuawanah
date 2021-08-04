<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'superadmin',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_yys',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_ra',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_tka',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_mts',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_ma',
            'guard_name' => 'web'
        ]);

        Role::create([
            'name' => 'admin_pst',
            'guard_name' => 'web'
        ]);
    }
}
