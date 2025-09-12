<?php

use Database\Seeders\CurrenciesSeeder;
use Database\Seeders\DefaultActivitiesSeeder;
use Database\Seeders\DefaultContactFieldTypesSeeder;
use Database\Seeders\DefaultContactModulesSeeder;
use Database\Seeders\DefaultLifeEventsSeeder;
use Database\Seeders\DefaultRelationshipTypesSeeder;
use Database\Seeders\EmotionsSeeder;
use Database\Seeders\InstanceSeeder;
use Database\Seeders\PetCategoriesSeeder;
use Database\Seeders\TermsSeeder;
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
