<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table
                ->foreign('car_id')
                ->references('id')
                ->on('cars')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('instructor_id')
                ->references('id')
                ->on('instructors')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            $table
                ->foreign('student_id')
                ->references('id')
                ->on('students')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('progress', function (Blueprint $table) {
            $table->dropForeign(['car_id']);
            $table->dropForeign(['instructor_id']);
            $table->dropForeign(['student_id']);
        });
    }
};
