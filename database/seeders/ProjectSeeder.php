<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Project;
use App\Models\Workplace;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{

    private $idSpk = null;
    private $idKag = null;
    private $idGeniebook = null;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->idSpk = Workplace::where('instance_name', 'PT. Santos Premium Krimer')->take(1)->get(['id'])[0]->id;
        $this->idKag = Workplace::where('instance_name', 'PT. Kapal Api Global')->take(1)->get(['id'])[0]->id;
        $this->idGeniebook = Workplace::where('instance_name', 'Geniebook')->take(1)->get(['id'])[0]->id;

        if ($this->idSpk == null || $this->idKag == null || $this->idGeniebook == null) {
            $this->command->error("Abort insert Projects because some foreign keys are missing");
            $this->command->error("Id SPK       = $this->idSpk");
            $this->command->error("Id KAG       = $this->idKag");
            $this->command->error("Id Geniebook = $this->idGeniebook");
            return;
        }

        DB::beginTransaction();
        try {
            $this->insertProjects();
            $this->insertProjectsTechStacks();
        } catch (\Exception $e) {
            DB::rollback();
        }
        DB::commit();
    }

    private function insertProjects()
    {
        $countProject = Project::count();
        if ($countProject > 0) {
            $this->command->info("Skipped because total row > 0");
            return;
        }

        $projects = [
            // ============ SPK PROJECT ============================
            [
                'id' => 1,
                'name' => 'E-Service',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 1,
                'workplace_id' => $this->idSpk,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'Factory Monitoring System',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 2,
                'workplace_id' => $this->idSpk,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'E-Checklist Reporting',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 3,
                'workplace_id' => $this->idSpk,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 4,
                'name' => 'SCADA',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 4,
                'workplace_id' => $this->idSpk,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // ============ KAG PROJECT ============================
            [
                'id' => 5,
                'name' => 'E-Procurement',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 5,
                'workplace_id' => $this->idKag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 6,
                'name' => 'Cek Kesehatan Mandiri',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 6,
                'workplace_id' => $this->idKag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 7,
                'name' => 'E-Checklist Reporting',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 7,
                'workplace_id' => $this->idKag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 8,
                'name' => 'SALIS',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 8,
                'workplace_id' => $this->idKag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 9,
                'name' => 'Jadwal dan Notulen Meeting',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 9,
                'workplace_id' => $this->idKag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 10,
                'name' => 'Web Project Register',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 10,
                'workplace_id' => $this->idKag,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // ============ GENIEBOOK PROJECT ============================
            [
                'id' => 11,
                'name' => 'Geniebook Admin',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 11,
                'workplace_id' => $this->idGeniebook,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 12,
                'name' => 'Geniebook Arena',
                'date_start' => null,
                'date_finish' => null,
                'description' => null,
                'order' => 12,
                'workplace_id' => $this->idGeniebook,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // [
            //     'id' => 13,
            //     'name' => 'Academic SEO Blog',
            //     'date_start' => null,
            //     'date_finish' => null,
            //     'description' => null,
            //     'order' => 13,
            //     'workplace_id' => $this->idGeniebook,
            //     'created_at' => Carbon::now(),
            //     'updated_at' => Carbon::now(),
            // ],
        ];

        Project::insert($projects);
    }

    private function insertProjectsTechStacks()
    {
        $countData = DB::table('projects_tech_stacks')->count();
        if ($countData > 0) {
            $this->command->info("Skipped because total row > 0");
            return;
        }

        /* 
            * FOREIGN KEY WARNING
            Key of Project data is HARCODED, assuming Projects are inserted from this seeder
        */
        DB::table('projects_tech_stacks')->insert([
            ['project_id' => '1', 'tech_stack_id' => $this->idSpk],
            ['project_id' => '2', 'tech_stack_id' => $this->idSpk],
            ['project_id' => '3', 'tech_stack_id' => $this->idSpk],
            ['project_id' => '4', 'tech_stack_id' => $this->idSpk],

            ['project_id' => '5', 'tech_stack_id' => $this->idKag],
            ['project_id' => '6', 'tech_stack_id' => $this->idKag],
            ['project_id' => '7', 'tech_stack_id' => $this->idKag],
            ['project_id' => '8', 'tech_stack_id' => $this->idKag],
            ['project_id' => '9', 'tech_stack_id' => $this->idKag],
            ['project_id' => '10', 'tech_stack_id' => $this->idKag],

            ['project_id' => '11', 'tech_stack_id' => $this->idGeniebook],
            ['project_id' => '12', 'tech_stack_id' => $this->idGeniebook],
        ]);
    }
}
