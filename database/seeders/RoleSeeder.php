<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Member']);

        //ROLES
        Permission::create(['name' => 'roles.list'])->syncRoles([$role1]);
        Permission::create(['name' => 'roles.listById'])->syncRoles([$role1]);

        // USERS
        Permission::create(['name' => 'users.employees.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.employees.listEmployee'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.admin.list'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.dashboard.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);

        // STATUS
        Permission::create(['name' => 'statuses.list'])->syncRoles([$role1]);
        Permission::create(['name' => 'statuses.listById'])->syncRoles([$role1]);

        // DASHBOARD
        Permission::create(['name' => 'dashboards.owner.list'])->syncRoles([$role1]);
        Permission::create(['name' => 'dashboards.employee.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'dashboards.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'dashboards.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'dashboards.destroy'])->syncRoles([$role1]);

        // TASK
        Permission::create(['name' => 'tasks.dashboard.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tasks.status.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tasks.store'])->syncRoles([$role1]);
        Permission::create(['name' => 'tasks.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'tasks.destroy'])->syncRoles([$role1]);

        // COMMENT
        Permission::create(['name' => 'comments.task.list'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'comments.store'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'comments.update'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'comments.destroy'])->syncRoles([$role1, $role2]);

        // AUTH
        // Permission::create(['name' => 'login'])->syncRoles([$role1, $role2]);
    }
}
