<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Education;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countEducation = Education::all()->count();
        if ($countEducation > 0) {
            $this->command->info("Skipped because total row > 0");
            return;
        }

        $educations = [
            [
                'instance_name' => 'St. Carolus Elementary School',
                'major' => null,
                'city' => 'Surabaya',
                'date_start' => '2006-01-01',
                'date_finish' => '2006-01-01',
                'is_currently_studying' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instance_name' => 'St. Carolus Junior High School',
                'major' => null,
                'city' => 'Surabaya',
                'date_start' => '2008-01-01',
                'date_finish' => '2011-01-01',
                'is_currently_studying' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instance_name' => 'St. Carolus Senior High School',
                'major' => null,
                'city' => 'Surabaya',
                'date_start' => '2011-01-01',
                'date_finish' => '2014-01-01',
                'is_currently_studying' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instance_name' => 'Universitas Surabaya',
                'major' => 'Bachelor of Computer Science',
                'city' => 'Surabaya',
                'date_start' => '2014-01-01',
                'date_finish' => '2018-01-01',
                'is_currently_studying' => false,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Education::insert($educations);
    }
}
