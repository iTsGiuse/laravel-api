<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $technology = ['html', 'css', 'javascript', 'vue', 'vite', 'php', 'laravel'];
        $countTechnology= count($technology);

        for ($i=0; $i<$countTechnology; $i++){
            $newTechnologie = new Technology();
            $newTechnologie->name= $technology[$i];
            $newTechnologie->slug= Str::slug($newTechnologie->name, '-');
            $newTechnologie->save();
        }
    }
   
}
