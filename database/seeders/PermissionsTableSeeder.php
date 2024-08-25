<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'nasabah.create']);
        Permission::create(['name' => 'nasabah.approve']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'supervisi']);
        $role1->givePermissionTo('nasabah.approve');

        $role2 = Role::create(['name' => 'customer-service']);
        $role2->givePermissionTo('nasabah.create');

        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Supervisi User',
            'email' => 'supervisi@example.com',
            'password' => bcrypt('password123'),
            'id_kc' => 1
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example CS User',
            'email' => 'cs@example.com',
            'password' => bcrypt('password123'),
            'id_kc' => 1
        ]);
        $user->assignRole($role2);
    }
}
