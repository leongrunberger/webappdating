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
       $profile_first->save();

       $profile_tim = new Profile();
       $profile_tim->name='Tim';
       $profile_tim->user_id='4';
       
       $profile_tim->alter='19';
       $profile_tim->wohnort = 'Stuttgart';
       $profile_tim->beschreibung='Ich bin Tim';
       $profile_tim->ogender='M';
       $profile_tim->lgender='F';
       $profile_tim->song='Rihanna - Umbrella';
        $profile_tim->save();

        $profile_pasquale = new Profile();
        $profile_pasquale->name='Pasquale';
        $profile_pasquale->user_id='7';
        
        $profile_pasquale->alter='25';
        $profile_pasquale->wohnort = 'Würzburg';
        $profile_pasquale->beschreibung='Ich bin Pasquale';
        $profile_pasquale->ogender='M';
        $profile_pasquale->lgender='F';
        $profile_pasquale->song='Kollegah - AKs im Wandschrank';
        $profile_pasquale->save();

         $profile_leonie = new Profile();
         $profile_leonie->name='Leonie';
         $profile_leonie->user_id='5';
        
         $profile_leonie->alter='24';
         $profile_leonie->wohnort = 'Heidelberg';
         $profile_leonie->beschreibung='Ich bin Leonie';
         $profile_leonie->ogender='F';
         $profile_leonie->lgender='M';
         $profile_leonie->song='Symba - Angels Sippen';
         $profile_leonie->save();

          $profile_marina = new Profile();
          $profile_marina->name='Marina';
          $profile_marina->user_id='6';
         
          $profile_marina->alter='20';
          $profile_marina->wohnort = 'Karlsruhe';
          $profile_marina->beschreibung='Ich bin Leonie';
          $profile_marina->ogender='F';
          $profile_marina->lgender='M';
          $profile_marina->song='Leona Lewis - Bleeding Love';
          $profile_marina->save();
    }
}
