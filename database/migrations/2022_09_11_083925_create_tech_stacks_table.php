<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechStacksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tech_stacks', function (Blueprint $table) {
            $table->id();

            $table->string('name');

            // $table->unsignedBigInteger('tech_stack_type_id');
            // $table->foreign('tech_stack_type_id')->references('id')->on('tech_stack_types');

            $table->foreignId('tech_stack_type_id')
                ->constrained('tech_stack_types')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tech_stacks');
    }
}
