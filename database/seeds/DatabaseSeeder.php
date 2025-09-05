<?php

use Database\Seeders\CurrenciesSeeder;
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
