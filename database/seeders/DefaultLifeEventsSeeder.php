<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultLifeEventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // POPULATE DEFAULT TABLES
        // WORK AND EDUCATION
        $defaultCategoryId = DB::table('default_life_event_categories')->insertGetId([
            'translation_key' => 'work_education',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_job',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"employer": {"type": "string", "value": ""}, "job_title": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'retirement',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"profession": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_school',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"degree": {"type": "string", "value": ""}, "end_date": {"type": "date", "value": ""}, "end_date_reminder_id": {"type": "integer", "value": ""}, "school_name": {"type": "string", "value": ""}, "studying": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'study_abroad',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"degree": {"type": "string", "value": ""}, "end_date": {"type": "date", "value": ""}, "end_date_reminder_id": {"type": "integer", "value": ""}, "school_name": {"type": "string", "value": ""}, "studying": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'volunteer_work',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"organization": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'published_book_or_paper',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"full_citation": {"type": "string", "value": ""}, "url": {"type": "string", "value": ""}, "citation": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'military_service',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"end_date": {"type": "date", "value": ""}, "end_date_reminder_id": {"type": "integer", "value": ""}, "branch": {"type": "string", "value": ""}, "division": {"type": "string", "value": ""}, "country": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // HOME LIVING
        $defaultCategoryId = DB::table('default_life_event_categories')->insertGetId([
            'translation_key' => 'family_relationships',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_relationship',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'engagement',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"with_contact_id": {"type": "integer", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'marriage',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"with_contact_id": {"type": "integer", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'anniversary',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'expecting_a_baby',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"contact_id": {"type": "integer", "value": ""}, "expected_date": {"type": "date", "value": ""}, "expected_date_reminder_id": {"type": "integer", "value": ""}, "expected_gender": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_child',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_family_member',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_pet',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'end_of_relationship',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"breakup_reason": {"type": "string", "value": ""}, "who_broke_up_contact_id": {"type": "integer", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'loss_of_a_loved_one',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // HOME & LIVING
        $defaultCategoryId = DB::table('default_life_event_categories')->insertGetId([
            'translation_key' => 'home_living',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('default_life_event_types')->insert([
            'translation_key' => 'moved',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"where_to": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'bought_a_home',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"address": {"type": "string", "value": ""}, "estimated_value": {"type": "number", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'home_improvement',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'holidays',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"where": {"type": "string", "value": ""}, "duration_in_days": {"type": "integer", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_vehicle',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"type": {"type": "string", "value": ""}, "model": {"type": "string", "value": ""}, "model_year": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_roommate',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"contact_id": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // TRAVEL AND EXPERIENCES
        $defaultCategoryId = DB::table('default_life_event_categories')->insertGetId([
            'translation_key' => 'health_wellness',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('default_life_event_types')->insert([
            'translation_key' => 'overcame_an_illness',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'quit_a_habit',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_eating_habits',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'weight_loss',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"amount": {"type": "string", "value": ""}, "unit": {"type": "string", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'wear_glass_or_contact',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'broken_bone',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'removed_braces',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'surgery',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"nature": {"type": "string", "value": ""}, "number_days_in_hospital": {"type": "integer", "value": ""}, "number_days_in_hospital": {"type": "integer", "value": ""}, "expected_date_out_of_hospital_reminder_id": {"type": "integer", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'dentist',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // HEALTH AND WELLNESS
        $defaultCategoryId = DB::table('default_life_event_categories')->insertGetId([
            'translation_key' => 'travel_experiences',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_sport',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_hobby',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_instrument',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_language',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'tattoo_or_piercing',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'new_license',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'travel',
            'default_life_event_category_id' => $defaultCategoryId,
            'specific_information_structure' => '{"visited_place": {"type": "string", "value": ""}, "duration_in_days": {"type": "integer", "value": ""}}',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'achievement_or_award',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'changed_beliefs',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'first_word',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('default_life_event_types')->insert([
            'translation_key' => 'first_kiss',
            'default_life_event_category_id' => $defaultCategoryId,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
