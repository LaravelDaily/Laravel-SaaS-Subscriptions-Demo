<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use LucasDotVin\Soulbscription\Models\Plan;
use LucasDotVin\Soulbscription\Models\Feature;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;

class PlanSeeder extends Seeder
{
    public function run()
    {
        $silverMonthly = Plan::create([
            'name'             => 'Silver Monthly',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 1,
        ]);

        $silverYearly = Plan::create([
            'name'             => 'Silver Yearly',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);

        $goldMonthly = Plan::create([
            'name'             => 'Gold Monthly',
            'periodicity_type' => PeriodicityType::Month,
            'periodicity'      => 1,
        ]);

        $goldYearly = Plan::create([
            'name'             => 'Gold Yearly',
            'periodicity_type' => PeriodicityType::Year,
            'periodicity'      => 1,
        ]);

        $limitedFeature = Feature::where('name', 'manage-tasks-limited')->first();
        $unlimitedFeature = Feature::where('name', 'manage-tasks-unlimited')->first();

        $silverMonthly->features()->attach($limitedFeature, ['charges' => 10]);
        $silverYearly->features()->attach($limitedFeature, ['charges' => 10]);

        $goldMonthly->features()->attach($unlimitedFeature);
        $goldYearly->features()->attach($unlimitedFeature);
    }
}
