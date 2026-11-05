<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'dashboard.view',
            // User permissions
            'user.list',
            'user.view',
            'user.create',
            'user.edit',
            'user.delete',
            'user.impersonate',
            'user.status.change',
            // Role permissions
            'role.list',
            'role.view',
            'role.create',
            'role.edit',
            'role.delete',
            'role.manage',

            // 'permission.list',
            // 'permission.sync',
            
            // Blog permissions
            'blog.list',
            'blog.view',
            'blog.create',
            'blog.edit',
            'blog.delete',
            'blog.publish',
            'blog.manage',
            // Event permissions
            'event.list',
            'event.view',
            'event.create',
            'event.edit',
            'event.delete',
            'event.manage',

            //event-leads
            'event-leads.list',
            'event-leads.view',
            'event-leads.delete',
            'event-leads.manage',

            // SEO permissions
            'seo.list',
            'seo.view',
            'seo.create',
            'seo.edit',
            'seo.delete',
            'seo.manage',

            // University permissions
            'university.list',
            'university.create',
            'university.view',
            'university.status.change',
            'university.edit',
            'university.delete',
            'university.manage',

            // Campus permissions
            'campus.list',
            'campus.create',
            'campus.view',
            'campus.edit',
            'campus.delete',

            // Provider permissions
            'provider.list',
            'provider.create',
            'provider.view',
            'provider.edit',
            'provider.delete',

         // course-categories
            'course-categories.list',
            'course-categories.index',
            'course-categories.create',
            'course-categories.show',
            'course-categories.edit',
            'course-categories.delete',
            'course-categories.status.change',
            'course-categories.manage',

            // Course permissions
            'course.list',
            'course.create',
            'course.view',
            'course.edit',
            'course.delete',
            'course.status.change',

            // Course Intake permissions
            'course-intakes.list',
            'course-intakes.index',
            'course-intakes.create',
            'course-intakes.show',
            'course-intakes.edit',
            'course-intakes.delete',
            'course-intakes.status.change',
            'course-intakes.manage',

            // Scholarship permissions
            'scholarships.list',
            'scholarships.create',
            'scholarships.view',
            'scholarships.edit',
            'scholarships.delete',
            'scholarships.status.change',
            'scholarships.manage',

            //contact
            'contact.list',
            'contact.view',
            'contact.delete',

            //subscriber
            'subscriber.list',
            'subscriber.view',
            'subscriber.delete',

            //counsellors
            'counsellors.list',
            'counsellors.view',
            'counsellors.create',
            'counsellors.edit',
            'counsellors.delete',

            //students
            'student.list',
            'student.view',
            'student.delete',
            'student.manage',

            // bookings 
            'bookings.list',
            'bookings.view',
            'bookings.update',                        
            'bookings.delete',
            'bookings.manage'



        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate([
                'name' => $permission,
                'guard_name' => config('rbac.default_guard', 'web'),
            ]);
        }

        //super admin role 1
        $superAdmin = Role::firstOrCreate([
            'name' => config('rbac.super_admin_role'),
            'guard_name' => config('rbac.default_guard', 'web'),
        ]); 
        // admin role 2     

        $adminRole = Role::firstOrCreate([
            'name' => 'admin',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        // default role 3
         $defaultRole = Role::firstOrCreate([
            'name' => 'default',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        // student role 4
         $studentRole = Role::firstOrCreate([
            'name' => 'student',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

            // counsellor  role 5
         $counsellorRole = Role::firstOrCreate([
            'name' => 'counsellor',
            'guard_name' => config('rbac.default_guard', 'web'),
        ]);

        $adminRole->syncPermissions($permissions);
        $superAdmin->syncPermissions($permissions);
        $defaultRole->syncPermissions(['dashboard.view']);
        $studentRole->syncPermissions([]);
        $counsellorRole->syncPermissions([]);

        app(PermissionRegistrar::class)->forgetCachedPermissions();
    }
}
