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
            $table ->unsignedBigInteger('CourseSectionId');
            $table ->unsignedBigInteger('ActivityTypeId');
            $table->boolean('Virtual');
            $table->dateTime('ActivityDate');
            $table->time('Duration');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
            $table->integer('Calification');
        });       
        DB::statement("ALTER TABLE CON_Activity ADD Name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_Activity ADD Description varchar(255) NOT NULL");
        // Relaciones
        Schema::table('CON_Activity', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
            $table->foreign('ActivityTypeId')->references('id')->on('CON_ActivityType');   
        });

        //otra tabla xd----------------------------------------------------------------

        Schema::create('CON_ActivityEvidence', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('ActivityId');
            $table ->unsignedBigInteger('TypeId');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
            
        });       
        DB::statement("ALTER TABLE CON_ActivityEvidence ADD Link varchar(255) NOT NULL");
          // Relaciones
          Schema::table('CON_ActivityEvidence', function (Blueprint $table) {
            $table->foreign('ActivityId')->references('id')->on('CON_Activity');
            $table->foreign('TypeId')->references('id')->on('CON_ActivityEvidenceType');
        });

        //otra tabla xd----------------------------------------------------------------

        Schema::create('CON_ActivityEvidenceType', function (Blueprint $table) {
            $table->id();
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
            
        });
        DB::statement("ALTER TABLE CON_ActivityEvidenceType ADD Name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_ActivityEvidenceType ADD Description varchar(255) NOT NULL");

         //otra tabla xd----------------------------------------------------------------

         Schema::create('CON_ActivityLink', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('ActivityId');
            $table->bit('Meeting');
            $table->bit('Material');
            $table->bit('Test');
            
        });
        DB::statement("ALTER TABLE CON_ActivityLink ADD Link varchar(255) NOT NULL");
         // Relaciones
         Schema::table('CON_ActivityLink', function (Blueprint $table) {
            $table->foreign('ActivityId')->references('id')->on('CON_Activity');
        });

         //otra tabla xd----------------------------------------------------------------

         Schema::create('CON_ActivityType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE CON_ActivityType ADD Name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_ActivityType ADD Description varchar(255) NOT NULL");

        //otra tabla xd----------------------------------------------------------------

        Schema::create('CON_CourseSection', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('CourseId');
            $table->bit('Assistance');
            $table->dateTime('InitDate')->useCurrent();
            $table->dateTime('EndDate')->useCurrent();
        });
        DB::statement("ALTER TABLE CON_CourseSection ADD Name varchar(50) NOT NULL");
        // Relaciones
        Schema::table('CON_CourseSection', function (Blueprint $table) {
            $table->foreign('CourseId')->references('id')->on('INP_Courses');
        });

        //otra tabla xd----------------------------------------------------------------

        Schema::create('CON_Form', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('CourseSectionId');
            $table ->integer('OrderNumber');
            $table ->integer('CreateUserId');
            $table->time('Duration');
            $table->integer('Calification');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
        });       

        // Relaciones
        Schema::table('CON_Form', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
        });

         //otra tabla xd----------------------------------------------------------------

         Schema::create('CON_FormFields', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('TypeId');
            $table ->unsignedBigInteger('FormId');
            $table ->integer('OrderNumber');
        });       
        DB::statement("ALTER TABLE CON_FormFields ADD Name Question(255) NOT NULL");

        // Relaciones
        Schema::table('CON_FormFields', function (Blueprint $table) {
            $table->foreign('TypeId')->references('id')->on('CON_FormFieldType');
            $table->foreign('FormId')->references('id')->on('CON_Form');
        });

        //otra tabla xd----------------------------------------------------------------

        Schema::create('CON_FormFieldType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE CON_FormFieldType ADD Name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_FormFieldType ADD Color varchar(20) NOT NULL");

        //otra tabla xd----------------------------------------------------------------

        Schema::create('CON_FormResponse', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('FormId');
            $table ->integer('StudentId');
            $table->integer('Calification');
            $table->time('Duration');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
        });       

        // Relaciones
        Schema::table('CON_FormResponse', function (Blueprint $table) {
            $table->foreign('StudentId')->references('id')->on('CON_Form');
        });

        //otra tabla xd----------------------------------------------------------------
        Schema::create('CON_Task', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('CourseSectionId');
            $table->boolean('Deliveries');
            $table->boolean('Missing');
            $table->integer('Calification');
            $table->integer('OrderNumber');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
            
        });       
        DB::statement("ALTER TABLE CON_Task ADD Name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_Task ADD Description varchar(255) NOT NULL");
        // Relaciones
        Schema::table('CON_Task', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
        });

        //otra tabla xd----------------------------------------------------------------
        Schema::create('CON_TaskDeliveryFiles', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('DeliveryId');
            $table->integer('SizeFile');
        });       
        DB::statement("ALTER TABLE CON_TaskDeliveryFiles ADD LinkFile varchar(255) NOT NULL");
        DB::statement("ALTER TABLE CON_TaskDeliveryFiles ADD TypeFile char(255) NOT NULL");
        // Relaciones
        Schema::table('CON_TaskDeliveryFiles', function (Blueprint $table) {
            $table->foreign('DeliveryId')->references('id')->on('RPT_TaskDeliveries');
        });

         //otra tabla xd----------------------------------------------------------------
         Schema::create('CON_TaskFiles', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('TaskId');
            $table->dateTime('CreationDate')->useCurrent();
            $table->dateTime('UpdateDate')->useCurrent();
            $table->dateTime('DeleteDate')->default('0001-01-01 00:00:00');
            
        });       
        DB::statement("ALTER TABLE CON_TaskFiles ADD Name varchar(50) NOT NULL");
        // Relaciones
        Schema::table('CON_TaskFiles', function (Blueprint $table) {
            $table->foreign('TaskId')->references('id')->on('CON_Task');
        });

    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CON_Activity');
    }
};
