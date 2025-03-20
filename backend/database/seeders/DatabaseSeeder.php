<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Regisztracio;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       
      $emailek = ['dominik@teszt.com', 'gergo@teszt.com', 'robi@teszt.com'];
      $jelszavak = ['DominikBelep', 'GergoBelep', 'RobiBelep'];
      $felhnevek=['Dominik','Geri','Robi'];
      $testsulyok=[60,75,65];
      $magassagok=[175,175,175];
      $eletkorok=[19,19,18];

      for ($i=0; $i < 3; $i++) { 
        Regisztracio::create([
          
          'email' => $emailek[$i],
          'jelszo' => $jelszavak[$i],
          'felhasznaloNev'=>$felhnevek[$i],
          'testsuly'=>$testsulyok[$i],
          'testmagassag'=>$magassagok[$i],
          'eletkor'=>$eletkorok[$i]
        ]);
      }
    }
}
