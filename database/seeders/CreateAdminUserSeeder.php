<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
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
'DepartmentName' => 'IT',
'userTitle' => 'Developer',
'UserRole' => 'Admin',
'password' => bcrypt('123456789')
]);
$role = Role::create(['name' => '[Admin]']);
$permissions = Permission::pluck('id','id')->all();
$role->syncPermissions($permissions);
$user->assignRole([$role->id]);
}
}