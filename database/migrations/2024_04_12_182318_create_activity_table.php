<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('CON_Activity', function (Blueprint $table) {
            $table->id();
            $table->boolean('Virtual');
            $table->dateTime('ActivityDate');
            $table->time('Duration');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
            $table->integer('Calification')->nullable();
        });
        DB::statement("ALTER TABLE CON_Activity ADD Name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_Activity ADD Description varchar(255) NOT NULL");
        
        // Relaciones
        Schema::table('CON_Activity', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
            $table->foreign('ActivityTypeId')->references('id')->on('CON_ActivityType');
            //$table->foreign('ForCourseld')->references('Course')->('');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity');
    }
};
