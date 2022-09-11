<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TechStackType;
use Illuminate\Database\Seeder;

class TechStackTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countData = TechStackType::count();
        if ($countData > 0) {
            $this->command->info("Skipped because total row > 0");
            return;
        }

        $data = [
            [
                'name' => 'Languages',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Frameworks',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Databases',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Others',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        TechStackType::insert($data);
    }
}
