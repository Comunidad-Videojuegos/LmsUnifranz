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

        // ---------------------------------------- MODULO DE USUARIOS RELACIONES ----------------------------------------

        Schema::table('USR_RolPermissions', function (Blueprint $table) {
            $table->foreign('rolId')->references('id')->on('USR_Rol');
            $table->foreign('permissionId')->references('id')->on('USR_Permission');
        });

        Schema::table('USR_UserRoles', function (Blueprint $table) {
            $table->foreign('rolId')->references('id')->on('USR_Rol');
            $table->foreign('userId')->references('id')->on('users');
        });

        Schema::table('USR_AppSection', function(Blueprint $table)
        {
            $table->foreign('sectionId')->references('id')->on('USR_AppSection');
        });


        // ---------------------------------------- MODULO DE CONTENIDO RELACIONES ----------------------------------------


        Schema::table('CON_Activity', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
            $table->foreign('ActivityTypeId')->references('id')->on('CON_ActivityType');
        });

        Schema::table('CON_ActivityEvidence', function (Blueprint $table) {
            $table->foreign('ActivityId')->references('id')->on('CON_Activity');
            $table->foreign('TypeId')->references('id')->on('CON_ActivityEvidenceType');
        });

        Schema::table('CON_ActivityLink', function (Blueprint $table) {
            $table->foreign('ActivityId')->references('id')->on('CON_Activity');
        });

        Schema::table('CON_CourseSection', function (Blueprint $table) {
            $table->foreign('CourseId')->references('id')->on('INP_Courses');
        });

        Schema::table('CON_Form', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('CON_FormFields', function (Blueprint $table) {
            $table->foreign('TypeId')->references('id')->on('CON_FormFieldType');
            $table->foreign('FormId')->references('id')->on('CON_Form');
        });

        Schema::table('CON_FormResponse', function (Blueprint $table) {
            $table->foreign('StudentId')->references('id')->on('CON_Form');
        });

        Schema::table('CON_Task', function (Blueprint $table) {
            $table->foreign('CourseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('CON_TaskDeliveryFiles', function (Blueprint $table) {
            $table->foreign('DeliveryId')->references('id')->on('RPT_TaskDeliveries');
        });

        Schema::table('CON_TaskFiles', function (Blueprint $table) {
            $table->foreign('TaskId')->references('id')->on('CON_Task');
        });


        // ---------------------------------------- MODULO DE APRENDIZAJE RELACIONES ----------------------------------------


        Schema::table('APR_Certificate', function(Blueprint $table)
        {
            $table->foreign('studentId')->references('id')->on('users');
        });
        Schema::table('APR_PlanLearning', function(Blueprint $table)
        {
            $table->foreign('courseId')->references('id')->on('INP_Courses');
        });
        Schema::table('APR_PlanCalification', function(Blueprint $table)
        {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });
        Schema::table('APR_PlanTheme', function(Blueprint $table)
        {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
            $table->foreign('planId')->references('id')->on('APR_PlanLearning');
        });
        Schema::table('APR_PlanThemeMaterial', function(Blueprin $table)
        {
            $table->foreign('planThemeId')->references('id')->on('APR_PlanTheme');
        });


        // ---------------------------------------- MODULO DE REPORTES REFERENCIAS ----------------------------------------


        Schema::table('RPT_Login', function (Blueprint $table)
        {
            $table->foreign('userId')->references('id')->on('users');
        });

        Schema::table('RPT_PlatformActivity', function(Blueprint $table)
        {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('typeId')->references('id')->on('RPT_PlatformActivityType');
        });

        Schema::table('RPT_AdvertViewed', function(Blueprint $table)
        {
            $table->foreign('advertId')->references('id')->on('INP_Advert');
            $table->foreign('userId')->references('id')->on('users');
        });

        Schema::table('RPT_TaskProgress', function(Blueprint $table)
        {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('RPT_TaskDeliveries', function(Blueprint $table)
        {
            $table->foreign('taskId')->references('id')->on('CON_Task');
            $table->foreign('studentId')->references('id')->on('users');
        });

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

        Schema::table('RPT_PlanMaterialProgress', function(Blueprint $table)
        {
            $table->foreign('planMaterialId')->references('id')->on('APR_PlanThemeMaterial');
        });

        Schema::table('RPT_CourseAssistance', function(Blueprint $table)
        {
            $table->foreign('scheduleId')->references('id')->on('INP_CourseSchedule');
            $table->foreign('studentId')->references('id')->on('users');
            $table->foreign('typeId')->references('id')->on('RPT_CourseAssistanceType');
        });

        Schema::table('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('activityId');
            $table->unsignedBigInteger('studentId');
            $table->timestamp('entry')->useCurrent();
            $table->timestamp('exit')->useCurrent();
        });

        Schema::table('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->foreign('activityId')->references('id')->on('CON_Activity');
            $table->foreign('studentId')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('REFS');
    }
};
