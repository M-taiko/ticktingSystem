<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class CreateAdminUserSeeder extends Seeder
{
/**
* Run the database seeds.
*
* @return void
*/
public function run()
{
$user = User::create([
'name' => 'Mohamed Tarek',
'email' => 'donia.a5ra2019@gmail.com',
'DepartmentName' => '---',
'userTitle' => 'Developer',
'UserRole' => ['Super-Admin'],
'password' => bcrypt('123456789')
]);
$role = Role::create(['name' => 'Super-Admin']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);
}
}