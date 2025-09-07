<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultContactModulesSeeder extends Seeder
{
    private static array $defaultContactFieldTypes = [
        'love_relationships' => 'app.relationship_type_group_love',
        'family_relationships' => 'app.relationship_type_group_family',
        'other_relationships' => 'app.relationship_type_group_other',
        'pets' => 'people.pets_title',
        'contact_information' => 'people.section_contact_information',
        'addresses' => 'people.contact_address_title',
        'how_you_met' => 'people.introductions_sidebar_title',
        'work_information' => 'people.work_information',
        'food_preferences' => 'people.food_preferences_title',
        'notes' => 'people.section_personal_notes',
        'phone_calls' => 'people.call_title',
        'activities' => 'people.activity_title',
        'reminders' => 'people.section_personal_reminders',
        'tasks' => 'people.section_personal_tasks',
        'gifts' => 'people.gifts_title',
        'debts' => 'people.debt_title',
        'conversations' => 'people.conversation_list_title',
        'documents' => 'people.document_list_title',
    ];

    public function run(): void
    {
        $entries = array_map_assoc(function ($key, $value) {
            return [
                'key' => $key,
                'translation_key' => $value,
                'delible' => 0,
                'active' => 1,
                'migrated' => 1,
            ];

        }, self::$defaultContactFieldTypes);

        DB::table('default_contact_modules')->insert($entries);
    }
}
