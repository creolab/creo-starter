<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view admin dashboard',
            'manage users',
            'manage roles',
            'view analytics',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Create roles and assign permissions
        $userRole = Role::create(['name' => 'user']);
        $adminRole = Role::create(['name' => 'admin']);
        $adminRole->givePermissionTo(Permission::all());

        // Create admin user from .env variables
        $adminEmail = env('ADMIN_EMAIL', 'admin@example.com');
        $adminPassword = env('ADMIN_PASSWORD', 'password');
        $adminFirstName = env('ADMIN_FIRST_NAME', 'Chuck');
        $adminLastName = env('ADMIN_LAST_NAME', 'Norris');

        $adminUser = User::create([
            'first_name'        => $adminFirstName,
            'last_name'         => $adminLastName,
            'email'             => $adminEmail,
            'password'          => Hash::make($adminPassword),
            'email_verified_at' => now(),
        ]);
        $adminUser->assignRole('admin');

        $this->command->info('Roles and permissions created successfully!');
        $this->command->info("Admin user created with email: {$adminEmail}");
    }
}
