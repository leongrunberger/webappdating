<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Profile;

class ProfileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      
      $profile_first = new Profile();
     
      $profile_first->name='admin';
      $profile_first->user_id='0';
      $profile_first->id='0';
      $profile_first->alter='12';
      $profile_first->wohnort = 'Berlin';
      $profile_first->beschreibung='hallo';
      $profile_first->ogender='T';
      $profile_first->lgender='T';
      $profile_first->song='T';
      $profile_first->erstellt='1';
      $profile_first->save();
    }
}
