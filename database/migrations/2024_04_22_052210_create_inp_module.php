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
        Schema::create('INP_AdvertType', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE INP_AdvertType ADD name varchar(20)");
        DB::statement("ALTER TABLE INP_AdvertType ADD description varchar(50)");

        Schema::create('INP_Advert', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('typeId');
            $table->integer('duration');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');

        });
        DB::statement("ALTER TABLE INP_Advert ADD name varchar(20)");
        DB::statement("ALTER TABLE INP_Advert ADD description varchar(50)");
        DB::statement("ALTER TABLE INP_Advert ADD forStudents bit");
        DB::statement("ALTER TABLE INP_Advert ADD createUserId int");

        Schema::create('INP_AdvertForUser', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('advertId');
            $table->unsignedBigInteger('rolId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        //Parte de Abajo
        Schema::create('INP_Career', function(Blueprint $table){
            $table->id();
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
            $table->double('duration');

        });
        DB::statement("ALTER TABLE INP_Career ADD referenceId int");
        DB::statement("ALTER TABLE INP_Career ADD name varchar(40)");
        DB::statement("ALTER TABLE INP_Career ADD initials varchar(10)");
        DB::statement("ALTER TABLE INP_Career ADD description varchar(120)");

        Schema::create('INP_Student', function(Blueprint $table){
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('careerId');
            $table->integer('semester');
            $table->integer('referenceId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });

        Schema::create('INP_Instructor', function(Blueprint $table)
        {
            $table->unsignedBigInteger('id')->primary();
        });
        DB::statement("ALTER TABLE INP_Instructor ADD speciality varchar(40)");
        DB::statement("ALTER TABLE INP_Instructor ADD type varchar(20)");



        Schema::create('INP_Course', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('instructorId');
            $table->double('calificationTotal');
        });
        DB::statement("ALTER TABLE INP_Course ADD referenceId int");
        DB::statement("ALTER TABLE INP_Course ADD name varchar(50)");
        DB::statement("ALTER TABLE INP_Course ADD mandatory bit");
        DB::statement("ALTER TABLE INP_Course ADD initials varchar(5)");
        DB::statement("ALTER TABLE INP_Course ADD description varchar(max)");
        DB::statement("ALTER TABLE INP_Course ADD groupLink varchar(50)");
        DB::statement("ALTER TABLE INP_Course ADD forCourseId int");

        Schema::create('INP_CourseInscribed', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('courseId');
            $table->unsignedBigInteger('studentId');
            $table->unsignedBigInteger('careerId');
            $table->boolean('status');
            $table->double('noteTotal');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });

        Schema::create('INP_CourseSchedule', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('courseId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE INP_CourseSchedule ADD schoolDay date");
        DB::statement("ALTER TABLE INP_CourseSchedule ADD classTimeStart time");
        DB::statement("ALTER TABLE INP_CourseSchedule ADD classTimeEnd time");

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('INP_AdvertType');
        Schema::dropIfExists('INP_Advert');
        Schema::dropIfExists('INP_AdvertForUser');
        Schema::dropIfExists('INP_Career');
        Schema::dropIfExists('INP_Student');
        Schema::dropIfExists('INP_Instructor');
        Schema::dropIfExists('INP_CourseInscribed');
        Schema::dropIfExists('INP_Course');
        Schema::dropIfExists('INP_CourseSchedule');

    }
};
