<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_user  = Role::where('name', 'user')->first();
      $role_admin  = Role::where('name', 'admin')->first();
      $role_premium  = Role::where('name', 'premium')->first();

      $admin = new User();
      $admin->name='admin';
      $admin->email='admin@email.de';
      $admin->password = bcrypt('12345678');
      $admin->date='1990-02-02';
      $admin->ogender='M';
      $admin->lgender='F';
      $admin->save();
      $admin->roles()->attach($role_admin);

      $user = new User();
      $user->name='user';
      $user->email='user@email.de';
      $user->password = bcrypt('12345678');
      $user->date ='1996-02-02';
      $user->ogender='M';
      $user->lgender='F';
      $user->save();
      $user->roles()->attach($role_user);
      
      $premium = new User();
      $premium->name='premium';
      $premium->email='premium@email.de';
      $premium->password = bcrypt('12345678');
      $premium->date = '1992-02-02';
      $premium->ogender = 'M';
      $premium->lgender ='F';
      $premium->save();
      $premium->roles()->attach($role_premium);

    }
}
