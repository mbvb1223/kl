<?php

use App\Models\Building;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BuildingSeeder extends Seeder
{
    public function run()
    {
        Building::create([
            'name' => Str::random(),
            'status_id' => 1,
            'portal_hostname' => 'kl-1.info',
            'portal_path' => '/',
        ]);

        Building::create([
            'name' => Str::random(),
            'status_id' => 1,
            'portal_hostname' => 'kl-2.info',
            'portal_path' => '/',
        ]);
    }
}
