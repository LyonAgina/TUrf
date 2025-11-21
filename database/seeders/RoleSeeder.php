<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::insert([
            ['name' => 'admin', 'description' => 'Full access'],
            ['name' => 'staff', 'description' => 'Limited access'],
            ['name' => 'guest', 'description' => 'No backend access'],
        ]);
    }
}
