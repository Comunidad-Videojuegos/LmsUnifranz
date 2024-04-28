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
        Schema::create('APR_Certificate', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentId');
            $table->string('linkCertificate');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->useCurrent();
        });
        DB::statement("ALTER TABLE APR_Certificate ADD name varchar(20) NOT NULL");
        DB::statement("ALTER TABLE APR_Certificate ADD name description(50) NOT NULL");


        Schema::create('APR_PlanLearning', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('courseId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->useCurrent();
        });
        DB::statement("ALTER TABLE APR_PlanLearning ADD name varchar(20) NOT NULL");
        DB::statement("ALTER TABLE APR_PlanLearning ADD name description(50) NOT NULL");

        Schema::create('APR_PlanCalification', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('courseSectionId');
            $table->double('calification');
        });
        DB::statement("ALTER TABLE APR_PlanCalification ADD name varchar(20) NOT NULL");


        Schema::create('APR_PlanTheme', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('courseSectionId');
            $table->unsignedBigInteger('planId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->useCurrent();
        });
        DB::statement("ALTER TABLE APR_PlanTheme ADD name varchar(20) NOT NULL");
        DB::statement("ALTER TABLE APR_PlanTheme ADD description varchar(100) NOT NULL");
        DB::statement("ALTER TABLE APR_PlanTheme ADD orderNumber int NOT NULL");

        Schema::create('APR_PlanThemeMaterial', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('planThemeId');
            $table->string('linkMaterial');
            $table->integer('orderNumber');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apr_module');
    }
};
