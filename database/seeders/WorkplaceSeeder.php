<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Workplace;
use Illuminate\Database\Seeder;

class WorkplaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countData = Workplace::all()->count();
        if ($countData > 0) {
            $this->command->info("Skipped because total row > 0");
            return;
        }

        $data = [
            [
                'instance_name' => 'PT. Santos Premium Krimer',
                'logo' => null,
                'city' => 'Sidoarjo',
                'position' => 'ICT Programmer',
                'description' => 'Performing all requirements to implement internal applications that meet the user\'s goals and needs. Starting from analyzing business processes, developing, maintaining, testing, and deployment.',
                'date_join' => '2018-06-08',
                'date_leave' => '2019-12-31',
                'is_current_workplace' => false,
                'order' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instance_name' => 'PT. Kapal Api Global',
                'logo' => null,
                'city' => 'Sidoarjo',
                'position' => 'System Developer',
                'description' => 'Responsible for developing and maintaining internal applications within the company. Also in charge of adapting to new technology to improve the development process and share the knowledge to other coworkers.',
                'date_join' => '2020-01-01',
                'date_leave' => '2021-11-09',
                'is_current_workplace' => false,
                'order' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'instance_name' => 'Geniebook',
                'logo' => null,
                'city' => 'Surabaya',
                'position' => 'Web Developer',
                'description' => 'Develop and maintain fetures in the internal applications for the marketing team to manage all the leads data. Creating new apps for marketing campaigns to increase Genibook subscribers.',
                'date_join' => '2021-11-15',
                'date_leave' => null,
                'is_current_workplace' => true,
                'order' => 3,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        Workplace::insert($data);
    }
}
