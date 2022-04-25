<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurriculumLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('curriculum_lectures', function (Blueprint $table) {
            $table->id();
            $table->unique(['curriculum_id', 'lecture_id']);
            $table->foreignId('curriculum_id')
                ->comment('ID учебного плана')
                ->constrained('curriculums')
                ->cascadeOnDelete();
            $table->foreignId('lecture_id')
                ->comment('ID лекции')
                ->constrained('lectures')
                ->cascadeOnDelete();
            $table->integer('queue')->comment('Очередность');
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
        Schema::dropIfExists('curriculum_lectures');
    }
}
