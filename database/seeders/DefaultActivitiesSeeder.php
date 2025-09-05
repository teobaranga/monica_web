<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultActivitiesSeeder extends Seeder
{
    private static array $activityDefaults = [
        'simple_activities' => [
            'just_hung_out' => 'outside',
            'watched_movie_at_home' => 'my_place',
            'talked_at_home' => 'my_place',
        ],
        'sport' => [
            'did_sport_activities_together' => 'outside',
        ],
        'food' => [
            'ate_at_his_place' => 'his_place',
            'went_bar' => 'outside',
            'ate_at_home' => 'my_place',
            'picnicked' => 'outside',
            'ate_restaurant' => 'outside',
        ],
        'cultural_activities' => [
            'went_theater' => 'outside',
            'went_concert' => 'outside',
            'went_play' => 'outside',
            'went_museum' => 'outside',
        ],
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (static::$activityDefaults as $activityCategory => $activities) {
            $categoryId = DB::table('default_activity_type_categories')
                ->insertGetId([
                    'translation_key' => $activityCategory,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            foreach ($activities as $activity => $location) {
                DB::table('default_activity_types')->insert([
                    'translation_key' => $activity,
                    'location_type' => $location,
                    'default_activity_type_category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
