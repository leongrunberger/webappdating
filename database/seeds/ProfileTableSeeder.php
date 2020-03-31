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
      
      $profile = new Profile();
      $profile->name='admin';
      $profile->alter='12';
      $profile->wohnort = 'Berlin';
      $profile->beschreibung='hallo';
      $profile->ogender='T';
      $profile->lgender='T';
      $profile->song='T';
      $profile->save();
    }
}
