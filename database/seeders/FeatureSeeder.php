<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;

class FeatureSeeder extends Seeder
{
    public function run()
    {
        Feature::create([
            'consumable'       => true,
            'name'             => 'manage-tasks-limited',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 10,
        ]);

        Feature::create([
            'consumable'       => false,
            'name'             => 'manage-tasks-unlimited',
        ]);

        Feature::create([
            'consumable'       => true,
            'name'             => 'manage-tasks-trial',
            'periodicity_type' => PeriodicityType::Week,
        ]);
    }
}
