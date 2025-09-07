<?php

use Database\Seeders\CurrenciesSeeder;
use Database\Seeders\DefaultActivitiesSeeder;
use Database\Seeders\DefaultContactFieldTypesSeeder;
use Database\Seeders\DefaultContactModulesSeeder;
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
        ]);

        switch (App::environment()) {
            case 'testing':
            case 'local':
                $this->call(FakeUserTableSeeder::class);
                break;
            case 'production':
                break;
        }
    }
}
