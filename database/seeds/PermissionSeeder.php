<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	['name' => 'create-merchant','display_name' => 'Create Merchant','description' => 'Create a Merchant' ],
			['name' => 'edit-merchant','display_name' => 'Edit Merchant','description' => 'Edit a Merchant'],
			['name' => 'view-merchant','display_name' => 'View Merchant','description' => 'View Merchant'],
			['name' => 'create-store','display_name' => 'Create Store','description' => 'Create a Restaurant'],
			['name' => 'edit-store','display_name' => 'Edit Store','description' => 'Edit Restaurant Details'],
			['name' => 'view-store','display_name' => 'View Store','description' => 'View Assigned Restaurants'],
			['name' => 'create-customer','display_name' => 'Create Customer','description' => 'Create a New Customer'],
			['name' => 'edit-customer','display_name' => 'Edit Customer','description' => 'Edit Customer Details'],
			['name' => 'view-customer','display_name' => 'View Customer','description' => 'View Customers'],
        ];
   		foreach ($permission as $key => $value) {
            Permission::create($value);
        }
    }
}