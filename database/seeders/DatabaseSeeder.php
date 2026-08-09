<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            TermsSeeder::class,
            CurrenciesSeeder::class,
            DefaultActivitiesSeeder::class,
            DefaultContactFieldTypesSeeder::class,
            DefaultContactModulesSeeder::class,
            DefaultLifeEventsSeeder::class,
            DefaultRelationshipTypesSeeder::class,
            EmotionsSeeder::class,
            PetCategoriesSeeder::class,
            InstanceSeeder::class,
        ]);

        switch (App::environment()) {
            case 'testing':
                $this->call(FakeUserTableSeeder::class);
                break;
            case 'local':
            case 'production':
                break;
        }
    }
}
