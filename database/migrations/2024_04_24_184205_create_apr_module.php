<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('APR_Certificate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE APR_Certificate ADD name varchar(20)");
        DB::statement("ALTER TABLE APR_Certificate ADD description varchar(50)");
        DB::statement("ALTER TABLE APR_Certificate ADD linkCertificate varchar(50)");

        Schema::create('APR_PlanLearning', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('courseId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE APR_PlanLearning ADD name varchar(20)");
        DB::statement("ALTER TABLE APR_PlanLearning ADD description varchar(50)");

        Schema::create('APR_PlanTheme', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('planId');
            $table->unsignedBigInteger('courseSectionId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE APR_PlanTheme ADD name varchar(20)");
        DB::statement("ALTER TABLE APR_PlanTheme ADD description varchar(50)");
        DB::statement("ALTER TABLE APR_PlanTheme ADD orderNumber int");

        Schema::create('APR_PlanThemeMaterial', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('planThemeId');
        });
        DB::statement("ALTER TABLE APR_PlanThemeMaterial ADD linkMaterial varchar(max)");
        DB::statement("ALTER TABLE APR_PlanThemeMaterial ADD orderNumber int");

        Schema::create('APR_PlanCalification', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('courseSectionId');
        });
        DB::statement("ALTER TABLE APR_PlanCalification ADD name varchar(20)");
        DB::statement("ALTER TABLE APR_PlanCalification ADD calification int");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('APR_Certificate');
        Schema::dropIfExists('APR_PlanLearning');
        Schema::dropIfExists('APR_PlanTheme');
        Schema::dropIfExists('APR_PlanThemeMaterial');
        Schema::dropIfExists('APR_PlanCalification');
    }
};
