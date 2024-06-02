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
            $table->integer('orderNumber');
            $table->dateTime('activityDate');
            $table->decimal('duration');
            $table->decimal('calification');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });
        DB::statement("ALTER TABLE CON_Activity ADD name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_Activity ADD description varchar(100) NOT NULL");


        Schema::create('CON_ActivityEvidence', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('activityId');
            $table ->unsignedBigInteger('typeId');
            $table->string('link');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();

        });

        Schema::create('CON_ActivityEvidenceType', function (Blueprint $table) {
            $table->id();
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();

        });
        DB::statement("ALTER TABLE CON_ActivityEvidenceType ADD name varchar(30) NOT NULL");
        DB::statement("ALTER TABLE CON_ActivityEvidenceType ADD description varchar(100) NOT NULL");

        Schema::create('CON_ActivityLink', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('activityId');
            $table->string('link');
            $table->boolean('meeting');
            $table->boolean('material');
            $table->boolean('test');

        });

        Schema::create('CON_ActivityType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE CON_ActivityType ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_ActivityType ADD description varchar(100) NOT NULL");


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
            $table->decimal('duration');
            $table->decimal('calification');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });

        Schema::create('CON_FormField', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('typeId');
            $table ->unsignedBigInteger('formId');
            $table ->integer('orderNumber');
        });
        DB::statement("ALTER TABLE CON_FormField ADD question varchar(100) NOT NULL");

        Schema::create('CON_FormFieldType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE CON_FormFieldType ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_FormFieldType ADD color varchar(20) NOT NULL");

        Schema::create('CON_FormResponse', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('formId');
            $table ->unsignedBigInteger('studentId');
            $table->decimal('calification');
            $table->decimal('duration');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });

        Schema::create('CON_Task', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('courseSectionId');
            $table->boolean('missing');
            $table->decimal('valoration');
            $table->integer('orderNumber');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();

        });
        DB::statement("ALTER TABLE CON_Task ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_Task ADD description varchar(100) NOT NULL");


        Schema::create('CON_TaskDeliveryFile', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('deliveryId');
            $table->integer('size');
            $table->string('link');
        });
        DB::statement("ALTER TABLE CON_TaskDeliveryFile ADD type varchar(5) NOT NULL");


        Schema::create('CON_TaskFile', function (Blueprint $table) {
            $table->id();
            $table ->unsignedBigInteger('taskId');
            $table->string('link');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();

        });
        DB::statement("ALTER TABLE CON_TaskFile ADD name varchar(50) NOT NULL");

        Schema::create('CON_TaskGroup', function(Blueprint $table){
            $table->id();
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });
        DB::statement("ALTER TABLE CON_TaskGroup ADD name varchar(50) NOT NULL");
        DB::statement("ALTER TABLE CON_TaskGroup ADD description varchar(100) NOT NULL");



        Schema::create('CON_TaskGroupStudents', function(Blueprint $table){
            $table->id();
            $table ->unsignedBigInteger('groupId');
            $table ->unsignedBigInteger('studentId');
            $table->dateTime('createDate')->useCurrent();
            $table->timestamp('deleteDate')->nullable();
        });
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
        Schema::dropIfExists('CON_TaskGroup');
        Schema::dropIfExists('CON_TaskGroupStudents');
    }
};
