<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminUser = User::factory()->create([
            'name'     => 'SuperAdmin',
            'lastname' => 'Admin',
            'email'    => 'superadmin@admin.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminUser->assignRole('super-admin');

        $adminUser = User::factory()->create([
            'name'     => 'Admin',
            'lastname' => 'Admin',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('1234567890')
        ]);
        $adminUser->assignRole('admin');
    }
}
