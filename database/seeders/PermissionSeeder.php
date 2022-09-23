<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // create permissions
			$permissions = [
				'dashboard-access',
				'role-create',
				'role-edit',
				'role-show',
				'role-delete',
				'permission-create',
				'permission-edit',
				'permission-show',
				'permission-delete',
                'slider-create',
				'slider-edit',
				'slider-show',
				'slider-delete',
                'product-create',
				'product-edit',
				'product-show',
				'product-delete',
                'coupon-create',
				'coupon-edit',
				'coupon-show',
				'coupon-delete',
                'category-create',
				'category-edit',
				'category-show',
				'category-delete',
                'order-show',
                'contact-show',

			];

			foreach($permissions as $permission){
				Permission::create([
					'guard_name' => 'web',
					'name' => $permission
				]);
			}



			// gets all permissinos via Gate::before rule; see AuthServiceProvider
			Role::create(['name'=>'super-admin']);



			// Admin Normal Role Start
			$roleAdmin = Role::create(['guard_name' => 'web', 'name' => 'admin']);

			$adminPermissions = [
				'dashboard-access',
				'role-create',
				'role-edit',
				'role-show',
				'role-delete',
				'permission-create',
				'permission-edit',
				'permission-show',
				'permission-delete',
                'slider-create',
				'slider-edit',
				'slider-show',
				'slider-delete',
                'product-create',
				'product-edit',
				'product-show',
				'product-delete',
                'coupon-create',
				'coupon-edit',
				'coupon-show',
				'coupon-delete',
                'category-create',
				'category-edit',
				'category-show',
				'category-delete',
                'order-show',
                'contact-show',
			];

			foreach($adminPermissions as $permission){
				$roleAdmin->givePermissionTo($permission);
			}
			// Admin Normal Role End
    }
}
