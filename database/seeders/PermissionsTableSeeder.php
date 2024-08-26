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

    // Create permissions
    $permissions = [
        'nasabah.create',
        'nasabah.approve',
        'menu.beranda',
        'menu.pembukaan-rekening',
        'menu.approval',
    ];

    foreach ($permissions as $permission) {
        Permission::create(['name' => $permission]);
    }

    // Create roles and assign permissions
    $rolesPermissions = [
        'supervisi' => ['nasabah.approve', 'menu.beranda', 'menu.approval'],
        'customer-service' => ['nasabah.create', 'menu.beranda', 'menu.pembukaan-rekening', 'menu.approval'],
    ];

    foreach ($rolesPermissions as $roleName => $permissions) {
        $role = Role::create(['name' => $roleName]);
        $role->givePermissionTo($permissions);
    }

    // Create demo users and assign roles
    $users = [
        ['name' => 'Example Supervisi User', 'email' => 'supervisi@example.com', 'role' => 'supervisi', 'id_kc' => 1],
        ['name' => 'Example Supervisi User', 'email' => 'supervisi2@example.com', 'role' => 'supervisi', 'id_kc' => 2],
        ['name' => 'Example Supervisi User', 'email' => 'supervisi3@example.com', 'role' => 'supervisi', 'id_kc' => 3],
        ['name' => 'Example CS User', 'email' => 'cs@example.com', 'role' => 'customer-service', 'id_kc' => 1],
        ['name' => 'Example CS User 2', 'email' => 'cs2@example.com', 'role' => 'customer-service', 'id_kc' => 2],
        ['name' => 'Example CS User 3', 'email' => 'cs3@example.com', 'role' => 'customer-service', 'id_kc' => 3],
    ];

    foreach ($users as $userData) {
        $user = \App\Models\User::factory()->create([
            'name' => $userData['name'],
            'email' => $userData['email'],
            'password' => bcrypt('password123'),
            'id_kc' => $userData['id_kc'],
        ]);
        $user->assignRole($userData['role']);
    }
}

}
