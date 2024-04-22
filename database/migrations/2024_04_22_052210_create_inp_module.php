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
        DB::statemnet("ALTER TABLE INP_AdvertType ADD Description varchar(50)");

        Schema::create('INP_Advert', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('TypeId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');

        });
        DB::statement("ALTER TABLE INP_Advert ADD name varchar(20)");
        DB::statemnet("ALTER TABLE INP_Advert ADD description varchar(50)");
        DB::statement("ALTER TABLE INP_Advert ADD duration time");
        DB::statement("ALTER TABLE INP_Advert ADD forstudent bit");
        DB::statement("ALTER TABLE INP_Advert ADD createUserId int");

        Schema::create('INP_AdvertForUsers', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('AdvertId');
            $table->unsignedBigInteger('RolId');
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
        
        });
        DB::statement("ALTER TABLE INP_Career ADD referenceId int");
        DB::statement("ALTER TABLE INP_Career ADD name varchar(40)");
        DB::statement("ALTER TABLE INP_Career ADD initials varchar(10)");
        DB::statement("ALTER TABLE INP_Career ADD descrption varchar(120)");
        DB::statement("ALTER TABLE INP_Career ADD durationYear int");
        DB::statement("ALTER TABLE INP_Career ADD durationMounth int");
        
        Schema::create('INP_Students', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('CareerId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE INP_Students ADD referenceId int");
        DB::statement("ALTER TABLE INP_Students ADD firstName varchar(40)");
        DB::statement("ALTER TABLE INP_Students ADD lastName varchar(40)");
        DB::statement("ALTER TABLE INP_Students ADD email varchar(100)");
        DB::statement("ALTER TABLE INP_Students ADD semester int");

        Schema::create('INP_Courses', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('InstructorId');
        });
        DB::statement("ALTER TABLE INP_Courses ADD referencesId int");
        DB::statement("ALTER TABLE INP_Courses ADD name varchar(50)");
        DB::statement("ALTER TABLE INP_Courses ADD mandatory bit");
        DB::statement("ALTER TABLE INP_Courses ADD initials varchar(5)");
        DB::statement("ALTER TABLE INP_Couerse ADD description varchar(max)");
        DB::statement("ALTER TABLE INP_Courses ADD groupLink varchar(50)");
        DB::statement("ALTER TABLE INP_Courses ADD calificationTotal int");
        DB::statement("ALTER TABLE INP_Courses ADD forCourseId int");

        Schema::create('INP_CourseInscribed', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('CourseId');
            $table->unsignedBigInteger('StudentId');
            $table->unsignedBigInteger('CareerId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE INP_CourseInscribed ADD status bool");
        DB::statement("ALTER TABLE INP_CouseInscribed ADD noteTotal int");

        Schema::create('INP_CourseSchedule', function(Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('CourseId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE INP_CourseSchedule ADD schoolDay date");
        DB::statement("ALTER TABLE INP_CourseSchedule ADD classTimeStart time");
        DB::statement("ALTER TABLE INP_CourseSchedule ADD classTimeEnd time");
        DB::statement("ALTER TABLE INP_CourseSchedule ADD mandatory bit");

        //Relaciones
        Schema::table('INP_Advert', function(Blueprint $table){
            $table->foreign('TypeId')->references('id')->on('INP_AdvertType');
        });

        Schema::table('INP_AdvertForUsers', function(Blueprint $table){
            $table->foreign('AdvertId')->references('id')->on('INP_Advert');
        });

        //Parte de abajo
        Schema::table('INP_Students', function(Blueprint $table){
            $table->forign('CareerId')->references('id')->on('INP_Career');
        });

        Schema::table('INP_CourseInscribed', function(Blueprint $table){
            $table->foreign('curseId')->references('id')->on('INP_Courses');
            $table->foreign('studentId')->references('id')->on('INP_Students');
            $table->foreign('CareerId')->references('id')->on('INP_Career');
        });
s
        Schema::table('INP_CourseSchedule', function(Blueprint $table){
            $table->foreign('CourseId')->references('id')->on('INP_Courses');
        });
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
        Schema::dropIfExists('INP_Students');
        Schema::dropIfExists('INP_CourseIncribed');
        Schema::dropIfExists('INP_Courses');
        Schema::dropIfExists('INP_CoursesSchedule');
        
    }
};
