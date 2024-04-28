<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_Login', function (Blueprint $table)
        {
            $table->id();
            $table ->unsignedBigInteger('userId');
            $table->boolean('passCorrect')->default(0);
            $table->boolean('nameCorrect')->default(0);
            $table->timestamp('createDate')->useCurrent();
        });

        // Refs
        Schema::table('RPT_Login', function (Blueprint $table)
        {
            $table->foreign('userId')->references('id')->on('users');
        });



        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_PlatformActivityType', function(Blueprint $table)
        {
            $table->id();
        });
        DB::statement("ALTER TABLE RPT_PlatformActivityType ADD name varchar(20) NOT NULL");
        DB::statement("ALTER TABLE RPT_PlatformActivityType ADD description varchar(50)");

        Schema::create('RPT_PlatformActivity', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('typeId');
            $table->integer('amount');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
        });

        // Refs
        Schema::table('RPT_PlatformActivity', function(Blueprint $table)
        {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('typeId')->references('id')->on('RPT_PlatformActivityType');
        });



        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_AdvertViewed', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('advertId');
            $table->unsignedBigInteger('userId');
            $table->boolean('viewed');
            $table->timestamp('createDate')->useCurrent();
        });

        // Refs
        Schema::table('RPT_AdvertViewed', function(Blueprint $table)
        {
            $table->foreign('advertId')->references('id')->on('INP_Advert');
            $table->foreign('userId')->references('id')->on('users');
        });



        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_TaskProgress', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('courseSectionId');
            $table->integer('tasksDone');
            $table->integer('tasksNotDone');
            $table->integer('calificationTotal');
        });

        // Refs
        Schema::table('RPT_TaskProgress', function(Blueprint $table)
        {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });



        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_TaskDeliveries', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('taskId');
            $table->unsignedBigInteger('studentId');
            $table->boolean('viewed');
            $table->boolean('reViewed');
            $table->integer('calification');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->useCurrent();
        });

        // Refs
        Schema::table('RPT_TaskDeliveries', function(Blueprint $table)
        {
            $table->foreign('taskId')->references('id')->on('CON_Task');
            $table->foreign('studentId')->references('id')->on('users');
        });



        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_FormProgress', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('responseId');
            $table->integer('numField');
            $table->integer('corrects');
            $table->integer('incorrects');
        });
        Schema::create('RPT_FormValues', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('formFieldId');
            $table->unsignedBigInteger('formResponseId');
            $table->string('value');
        });
        Schema::create('RPT_FormFieldsResponses', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('formFieldId');
            $table->boolean('correct')->default(0);
        });
        DB::statement("ALTER TABLE RPT_FormFieldsResponses ADD response varchar(100) NOT NULL");

        // Refs
        Schema::table('RPT_FormProgress', function(Blueprint $table)
        {
            $table->foreign('responseId')->references('id')->on('CON_FormResponse');
        });
        Schema::table('RPT_FormValues', function(Blueprint $table)
        {
            $table->foreign('formFieldId')->references('id')->on('RPT_FormFields');
            $table->foreign('formResponseId')->references('id')->on('RPT_FormResponse');
        });
        Schema::table('RPT_FormFieldsResponses', function(Blueprint $table)
        {
            $table->foreign('formFieldId')->references('id')->on('RPT_FormFields');
        });




        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_PlanMaterialProgress', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('planMaterialId');
            $table->unsignedBigInteger('studentId');
            $table->integer('advance');
        });

        // Refs
        Schema::table('RPT_PlanMaterialProgress', function(Blueprint $table)
        {
            $table->foreign('planMaterialId')->references('id')->on('APR_PlanThemeMaterial');
        });



        // ------------------------ New Section Table ------------------------
        Schema::create('RPT_CourseAssistanceType', function(Blueprint $table)
        {
            $table->id();
            $table->timestamp('deleteDate')->useCurrent();
        });
        DB::statement("ALTER TABLE RPT_CourseAssistanceType ADD name varchar(20) NOT NULL");
        DB::statement("ALTER TABLE RPT_CourseAssistanceType ADD description varchar(100) NOT NULL");

        Schema::create('RPT_CourseAssistance', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('scheduleId');
            $table->unsignedBigInteger('studentId');
            $table->unsignedBigInteger('typeId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->useCurrent();
        });

        // Refs

        Schema::table('RPT_CourseAssistance', function(Blueprint $table)
        {
            $table->foreign('scheduleId')->references('id')->on('INP_CourseSchedule');
            $table->foreign('studentId')->references('id')->on('users');
            $table->foreign('typeId')->references('id')->on('RPT_CourseAssistanceType');
        });


        // ------------------------ New Section Table ------------------------

        Schema::table('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('activityId');
            $table->unsignedBigInteger('studentId');
            $table->timestamp('entry')->useCurrent();
            $table->timestamp('exit')->useCurrent();
        });
        // Refs

        Schema::table('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->foreign('activityId')->references('id')->on('CON_Activity');
            $table->foreign('studentId')->references('id')->on('users');
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('RPT_Login');
        Schema::dropIfExists('RPT_AdvertViewed');

        Schema::dropIfExists('RPT_PlatformActivity');
        Schema::dropIfExists('RPT_PlatformActivityType');

        Schema::dropIfExists('RPT_Progress');

        Schema::dropIfExists('RPT_TaskDeliveries');

        Schema::dropIfExists('RPT_FormProgress');
        Schema::dropIfExists('RPT_FormValues');
        Schema::dropIfExists('RPT_FormFieldsResponses');

        Schema::dropIfExists('RPT_PlanMaterialProgress');

        Schema::dropIfExists('RPT_CourseAssistanceType');
        Schema::dropIfExists('RPT_CourseAssistance');

        Schema::dropIfExists('RPT_ActivityAssistance');
    }
};
