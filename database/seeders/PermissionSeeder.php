<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder {
    public function run() {
        Permission::create(['name' => 'edit_users']);
        Permission::create(['name' => 'delete_users']);
    }
}
