<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\TechStack;
use App\Models\TechStackType;
use Illuminate\Database\Seeder;

class TechStackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countData = TechStack::count();
        if ($countData > 0) {
            $this->command->info("Skipped because total row > 0");
            return;
        }

        $idTypeLanguages = TechStackType::where('name','Languages')->take(1)->get(['id'])[0]->id;
        $idTypeFrameworks = TechStackType::where('name','Frameworks')->take(1)->get(['id'])[0]->id;
        $idTypeDatabases = TechStackType::where('name','Databases')->take(1)->get(['id'])[0]->id;
        $idTypeOthers = TechStackType::where('name','Others')->take(1)->get(['id'])[0]->id;

        if ($idTypeLanguages == null || $idTypeFrameworks == null || $idTypeDatabases == null || $idTypeOthers == null){
            $this->command->error("Abort insert TechStack because some foreign keys are missing");
            $this->command->error("Id Type Languages    = $idTypeLanguages");
            $this->command->error("Id Type Frameworks   = $idTypeFrameworks");
            $this->command->error("Id Type Databases    = $idTypeDatabases");
            $this->command->error("Id Type Others       = $idTypeOthers");
            return;
        }

        $data = [
            [
                'name' => 'PHP',
                'tech_stack_type_id' => $idTypeLanguages,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Javascript',
                'tech_stack_type_id' => $idTypeLanguages,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'C#',
                'tech_stack_type_id' => $idTypeLanguages,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'VB',
                'tech_stack_type_id' => $idTypeLanguages,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Golang',
                'tech_stack_type_id' => $idTypeLanguages,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Laravel',
                'tech_stack_type_id' => $idTypeFrameworks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Code Igniter',
                'tech_stack_type_id' => $idTypeFrameworks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '.NET - ASP.NET',
                'tech_stack_type_id' => $idTypeFrameworks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => '.Net Core - ASP.NET Core',
                'tech_stack_type_id' => $idTypeFrameworks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Gin Gonic',
                'tech_stack_type_id' => $idTypeFrameworks,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'MySQL',
                'tech_stack_type_id' => $idTypeDatabases,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Microsoft SQL Server',
                'tech_stack_type_id' => $idTypeDatabases,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'PostgreSQL',
                'tech_stack_type_id' => $idTypeDatabases,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'Git',
                'tech_stack_type_id' => $idTypeOthers,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Jira',
                'tech_stack_type_id' => $idTypeOthers,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'K2 Apps',
                'tech_stack_type_id' => $idTypeOthers,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'KepServer OPC Server',
                'tech_stack_type_id' => $idTypeOthers,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'SQL Server Reporting Service',
                'tech_stack_type_id' => $idTypeOthers,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        TechStack::insert($data);
    }
}
