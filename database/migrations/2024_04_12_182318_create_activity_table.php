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
        Schema::create('CON_Activity', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('courseSectionId');
            $table ->unsignedBigInteger('typeId');
            $table->boolean('virtual');
            $table->dateTime('activityDate');
            $table->time('duration');
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');
            $table->integer('calification');
        });
        DB::statement("ALTER TABLE CON_Activity ADD name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_Activity ADD description varchar(255) NOT NULL");


        Schema::create('CON_ActivityEvidence', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('activityId');
            $table ->unsignedBigInteger('typeId');
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');

        });
        DB::statement("ALTER TABLE CON_ActivityEvidence ADD link varchar(255) NOT NULL");

        Schema::create('CON_ActivityEvidenceType', function (Blueprint $table) {
            $table->id();
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');

        });
        DB::statement("ALTER TABLE CON_ActivityEvidenceType ADD name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_ActivityEvidenceType ADD description varchar(255) NOT NULL");

        Schema::create('CON_ActivityLink', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('activityId');
            $table->boolean('meeting');
            $table->boolean('material');
            $table->boolean('test');

        });
        DB::statement("ALTER TABLE CON_ActivityLink ADD link varchar(255) NOT NULL");

        Schema::create('CON_ActivityType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE CON_ActivityType ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_ActivityType ADD description varchar(255) NOT NULL");


        Schema::create('CON_CourseSection', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('courseId');
            $table->boolean('assistance');
            $table->dateTime('initDate')->useCurrent();
            $table->dateTime('endDate')->useCurrent();
        });
        DB::statement("ALTER TABLE CON_CourseSection ADD name varchar(50) NOT NULL");


        Schema::create('CON_Form', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('courseSectionId');
            $table ->integer('orderNumber');
            $table ->unsignedBigInteger('createUserId');
            $table->time('duration');
            $table->double('calification');
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');
        });

        Schema::create('CON_FormField', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('typeId');
            $table ->unsignedBigInteger('formId');
            $table ->integer('orderNumber');
        });
        DB::statement("ALTER TABLE CON_FormField ADD question varchar(200) NOT NULL");

        Schema::create('CON_FormFieldType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE CON_FormFieldType ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_FormFieldType ADD color varchar(20) NOT NULL");

        Schema::create('CON_FormResponse', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('formId');
            $table ->unsignedBigInteger('studentId');
            $table->double('calification');
            $table->time('duration');
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');
        });

        Schema::create('CON_Task', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('courseSectionId');
            $table->integer('deliveries');
            $table->boolean('missing');
            $table->double('calification');
            $table->integer('orderNumber');
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');

        });
        DB::statement("ALTER TABLE CON_Task ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_Task ADD description varchar(255) NOT NULL");


        Schema::create('CON_TaskDeliveryFile', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('deliveryId');
            $table->integer('sizeFile');
        });
        DB::statement("ALTER TABLE CON_TaskDeliveryFile ADD sizeFileType varchar(5) NOT NULL");
        DB::statement("ALTER TABLE CON_TaskDeliveryFile ADD linkFile varchar(255) NOT NULL");
        DB::statement("ALTER TABLE CON_TaskDeliveryFile ADD typeFile char(255) NOT NULL");


        Schema::create('CON_TaskFile', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('taskId');
            $table->dateTime('createDate')->useCurrent();
            $table->dateTime('updateDate')->useCurrent();
            $table->dateTime('deleteDate')->default('0001-01-01 00:00:00');

        });
        DB::statement("ALTER TABLE CON_TaskFile ADD name varchar(50) NOT NULL");


    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('CON_Activity');
        Schema::dropIfExists('CON_ActivityEvidence');
        Schema::dropIfExists('CON_ActivityEvidenceType');
        Schema::dropIfExists('CON_ActivityLink');
        Schema::dropIfExists('CON_ActivityType');
        Schema::dropIfExists('CON_CourseSection');
        Schema::dropIfExists('CON_Form');
        Schema::dropIfExists('CON_FormField');
        Schema::dropIfExists('CON_FormFieldType');
        Schema::dropIfExists('CON_FormResponse');
        Schema::dropIfExists('CON_Task');
        Schema::dropIfExists('CON_TaskDeliveryFile');
        Schema::dropIfExists('CON_TaskFile');
    }
};
