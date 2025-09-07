<?php

namespace Database\Seeders;

use App\Models\Instance\Instance;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class InstanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $instance = new Instance;
        $instance->current_version = config('monica.app_version');
        $instance->latest_version = config('monica.app_version');
        $instance->uuid = Str::uuid();
        $instance->save();
    }
}
