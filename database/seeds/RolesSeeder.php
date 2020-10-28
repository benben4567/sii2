<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Contracts\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //Reset cached roles and permissions
    app()[PermissionRegistrar::class]->forgetCachedPermissions();

    //create roles and assign existing permissions
    $role1 = Role::create(['name' => 'super-admin', 'guard_name' => config('auth.defaults.guard')]);
    $role2 = Role::create(['name' => 'instruktur', 'guard_name' => config('auth.defaults.guard')]);
    //create user and assign role
    $user = User::create([
      'username' => 'superadmin',
      'email' => 'superadmin@example.com',
      'password' => Hash::make('secret')
    ]);
    $user->assignRole($role1);

    $user = User::create([
      'username' => '8511440Z',
      'email' => 'ihwanda.agus@pln.co.id',
      'password' => Hash::make('password')
    ]);
    $user->assignRole($role2);
  }
}
