<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('RPT_Login', function (Blueprint $table)
        {
            $table->id();
            $table ->unsignedBigInteger('userId');
            $table->boolean('passCorrect')->default(0);
            $table->boolean('nameCorrect')->default(0);
            $table->timestamp('createDate')->useCurrent();
        });

        Schema::create('RPT_PlatformActivityType', function(Blueprint $table)
        {
            $table->id();
        });
        DB::statement("ALTER TABLE RPT_PlatformActivityType ADD name varchar(40) NOT NULL");
        DB::statement("ALTER TABLE RPT_PlatformActivityType ADD description varchar(100)");

        Schema::create('RPT_PlatformActivity', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('typeId');
            $table->integer('amount');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
        });


        Schema::create('RPT_AdvertViewed', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('advertId');
            $table->unsignedBigInteger('userId');
            $table->boolean('viewed');
            $table->timestamp('createDate')->useCurrent();
        });


        Schema::create('RPT_TaskDeliveries', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('taskId');
            $table->unsignedBigInteger('studentId');
            $table->boolean('viewed');
            $table->boolean('reviewed');
            $table->decimal('calification');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });

        Schema::create('RPT_FormProgress', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('responseId');
            $table->integer('numField');
            $table->integer('corrects');
            $table->integer('incorrects');
        });
        Schema::create('RPT_FormValue', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('formFieldId');
            $table->unsignedBigInteger('formResponseId');
            $table->string('value');
        });
        Schema::create('RPT_FormFieldsResponse', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('formFieldId');
            $table->boolean('correct')->default(0);
        });
        DB::statement("ALTER TABLE RPT_FormFieldsResponse ADD response varchar(100) NOT NULL");

        Schema::create('RPT_PlanMaterialProgress', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('planMaterialId');
            $table->unsignedBigInteger('studentId');
            $table->integer('advance');
        });

        Schema::create('RPT_CourseAssistanceType', function(Blueprint $table)
        {
            $table->id();
            $table->timestamp('deleteDate')->nullable();
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
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });

        Schema::create('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('activityId');
            $table->unsignedBigInteger('studentId');
            $table->timestamp('entry');
            $table->timestamp('exit');
        });
    }



    public function down(): void
    {
        Schema::dropIfExists('RPT_Login');
        Schema::dropIfExists('RPT_AdvertViewed');

        Schema::dropIfExists('RPT_PlatformActivity');
        Schema::dropIfExists('RPT_PlatformActivityType');

        Schema::dropIfExists('RPT_TaskDeliveries');

        Schema::dropIfExists('RPT_FormProgress');
        Schema::dropIfExists('RPT_FormValue');
        Schema::dropIfExists('RPT_FormFieldsResponse');

        Schema::dropIfExists('RPT_PlanMaterialProgress');

        Schema::dropIfExists('RPT_CourseAssistanceType');
        Schema::dropIfExists('RPT_CourseAssistance');

        Schema::dropIfExists('RPT_ActivityAssistance');
    }
};
