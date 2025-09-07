<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DefaultContactFieldTypesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('default_contact_field_types')->insert(
            [
                [
                    'name' => 'Email',
                    'fontawesome_icon' => 'fa fa-envelope-open-o',
                    'protocol' => 'mailto:',
                    'delible' => false,
                    'type' => 'email',
                    'migrated' => 1,
                ],
                [
                    'name' => 'Phone',
                    'fontawesome_icon' => 'fa fa-volume-control-phone',
                    'protocol' => 'tel:',
                    'delible' => false,
                    'type' => 'phone',
                    'migrated' => 1,
                ],
                [
                    'name' => 'Facebook',
                    'fontawesome_icon' => 'fa fa-facebook-official',
                    'protocol' => 'https://facebook.com/',
                    'delible' => true,
                    'type' => null,
                    'migrated' => 1,
                ],
                [
                    'name' => 'Twitter',
                    'fontawesome_icon' => 'fa fa-twitter-square',
                    'protocol' => 'https://twitter.com/',
                    'delible' => true,
                    'type' => null,
                    'migrated' => 1,
                ],
                [
                    'name' => 'Whatsapp',
                    'fontawesome_icon' => 'fa fa-whatsapp',
                    'protocol' => 'https://wa.me/',
                    'delible' => true,
                    'type' => null,
                    'migrated' => 1,
                ],
                [
                    'name' => 'Telegram',
                    'fontawesome_icon' => 'fa fa-telegram',
                    'protocol' => 'telegram:',
                    'delible' => true,
                    'type' => null,
                    'migrated' => 1,
                ],
                [
                    'name' => 'LinkedIn',
                    'fontawesome_icon' => 'fa fa-linkedin-square',
                    'protocol' => 'https://linkedin.com/in/',
                    'delible' => true,
                    'type' => null,
                    'migrated' => 1,
                ],
            ]
        );
    }
}
