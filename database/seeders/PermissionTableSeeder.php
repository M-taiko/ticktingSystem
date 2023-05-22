<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
class PermissionTableSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$permissions = [
'role-my-depatment-tickets',
'all-tickets',
'ticket-history',
'settings',
'Edit-ticket-stats',
'role-assign-to-user',
'role-edit-ticket-stats',
'users',
'role-list',
'role-create',
'role-edit',
'role-delete',
'role-action',

];
foreach ($permissions as $permission) {
Permission::create(['name' => $permission]);
}
}
}