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

      $tim = new User();
      $tim->name='Tim';
      $tim->email='tim@email.de';
      $tim->password = bcrypt('12345678');
      $tim->date ='1996-02-02';
      $tim->ogender='M';
      $tim->lgender='F';
      $tim->save();
      $tim->roles()->attach($role_user);

      $leonie = new User();
      $leonie->name='Leonie';
      $leonie->email='leonie@email.de';
      $leonie->password = bcrypt('12345678');
      $leonie->date ='1996-02-02';
      $leonie->ogender='F';
      $leonie->lgender='M';
      $leonie->save();
      $leonie->roles()->attach($role_user);

      $marina = new User();
      $marina->name='Marina';
      $marina->email='marina@email.de';
      $marina->password = bcrypt('12345678');
      $marina->date ='1996-02-02';
      $marina->ogender='F';
      $marina->lgender='M';
      $marina->save();
      $marina->roles()->attach($role_user);

      $pasquale = new User();
      $pasquale->name='Pasquale';
      $pasquale->email='pasquale@email.de';
      $pasquale->password = bcrypt('12345678');
      $pasquale->date ='1996-02-02';
      $pasquale->ogender='M';
      $pasquale->lgender='F';
      $pasquale->save();
      $pasquale->roles()->attach($role_user);

    }
}
