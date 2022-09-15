<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // ============== Create tables ==========================
        Schema::create('projects', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->date('date_start')->nullable();
            $table->date('date_finish')->nullable();
            $table->text('description')->nullable();
            $table->integer('order');
            $table->foreignId('workplace_id')
                    ->constrained('workplaces')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
    
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('projects_tech_stacks', function (Blueprint $table) {
            $table->foreignId('project_id')
                ->constrained('projects')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreignId('tech_stack_id')
                ->constrained('tech_stacks')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamp('created_at', 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects_tech_stacks');
        Schema::dropIfExists('projects');
    }
}
