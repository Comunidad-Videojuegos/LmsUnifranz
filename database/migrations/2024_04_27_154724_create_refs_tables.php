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

        // ---------------------------------------- MODULO DE USUARIOS RELACIONES ----------------------------------------

        Schema::table('USR_RolPermission', function (Blueprint $table) {
            $table->foreign('rolId')->references('id')->on('USR_Rol');
            $table->foreign('permissionId')->references('id')->on('USR_Permission');
        });

        Schema::table('USR_UserRoles', function (Blueprint $table) {
            $table->foreign('rolId')->references('id')->on('USR_Rol');
            $table->foreign('userId')->references('id')->on('users');
        });

        Schema::table('USR_Permission', function(Blueprint $table)
        {
            $table->foreign('sectionId')->references('id')->on('USR_AppSection');
        });

        Schema::table('USR_Info', function(Blueprint $table)
        {
            $table->foreign('id')->references('id')->on('users');
        });


        // ---------------------------------------- MODULO DE CONTENIDO RELACIONES ----------------------------------------


        Schema::table('CON_Activity', function (Blueprint $table) {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
            $table->foreign('typeId')->references('id')->on('CON_ActivityType');
        });

        Schema::table('CON_ActivityEvidence', function (Blueprint $table) {
            $table->foreign('activityId')->references('id')->on('CON_Activity');
            $table->foreign('typeId')->references('id')->on('CON_ActivityEvidenceType');
        });

        Schema::table('CON_ActivityLink', function (Blueprint $table) {
            $table->foreign('activityId')->references('id')->on('CON_Activity');
        });

        Schema::table('CON_CourseSection', function (Blueprint $table) {
            $table->foreign('courseId')->references('id')->on('INP_Course');
        });

        Schema::table('CON_Form', function (Blueprint $table) {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('CON_FormField', function (Blueprint $table) {
            $table->foreign('typeId')->references('id')->on('CON_FormFieldType');
            $table->foreign('formId')->references('id')->on('CON_Form');
        });

        Schema::table('CON_FormResponse', function (Blueprint $table) {
            $table->foreign('studentId')->references('id')->on('INP_Student');
        });

        Schema::table('CON_Task', function (Blueprint $table) {
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('CON_TaskDeliveryFile', function (Blueprint $table) {
            $table->foreign('deliveryId')->references('id')->on('RPT_TaskDeliveries');
        });

        Schema::table('CON_TaskFile', function (Blueprint $table) {
            $table->foreign('taskId')->references('id')->on('CON_Task');
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
            $table->foreign('studentId')->references('id')->on('INP_Student');
        });

        Schema::table('RPT_FormProgress', function(Blueprint $table)
        {
            $table->foreign('responseId')->references('id')->on('CON_FormResponse');
        });
        Schema::table('RPT_FormValue', function(Blueprint $table)
        {
            $table->foreign('formFieldId')->references('id')->on('CON_FormField');
            $table->foreign('formResponseId')->references('id')->on('CON_FormResponse');
        });
        Schema::table('RPT_FormFieldsResponse', function(Blueprint $table)
        {
            $table->foreign('formFieldId')->references('id')->on('CON_FormField');
        });

        Schema::table('RPT_PlanMaterialProgress', function(Blueprint $table)
        {
            $table->foreign('planMaterialId')->references('id')->on('APR_PlanThemeMaterial');
        });

        Schema::table('RPT_CourseAssistance', function(Blueprint $table)
        {
            $table->foreign('scheduleId')->references('id')->on('INP_CourseSchedule');
            $table->foreign('studentId')->references('id')->on('INP_Student');
            $table->foreign('typeId')->references('id')->on('RPT_CourseAssistanceType');
        });

        Schema::table('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->foreign('activityId')->references('id')->on('CON_Activity');
            $table->foreign('studentId')->references('id')->on('INP_Student');
        });


        // ---------------------------------------- MODULO DE COLABORACION REFERENCIAS ----------------------------------------

        Schema::table('COL_Notification', function (Blueprint $table)
        {
            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('typeId')->references('id')->on('COL_TypeNotification');
        });

        Schema::table('COL_ForumConversation', function (Blueprint $table)
        {
            $table->foreign('educatorId')->references('id')->on('users');
            $table->foreign('forumId')->references('id')->on('COL_Forum');
        });

        Schema::table('COL_ForumFile', function (Blueprint $table)
        {
            $table->foreign('forumId')->references('id')->on('COL_Forum');
        });

        // ---------------------------------------- MODULO DE APRENDIZAJE REFERENCIAS ----------------------------------------

        Schema::table('APR_PlanLearning', function(Blueprint $table){
            $table->foreign('courseId')->references('id')->on('INP_Course');
        });

        Schema::table('APR_PlanTheme', function(Blueprint $table){
            $table->foreign('planId')->references('id')->on('APR_PlanLearning');
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('APR_PlanThemeMaterial', function(Blueprint $table){
            $table->foreign('planThemeId')->references('id')->on('APR_PlanTheme');
        });

        Schema::table('APR_PlanCalification', function(Blueprint $table){
            $table->foreign('courseSectionId')->references('id')->on('CON_CourseSection');
        });

        Schema::table('APR_Certificate', function(Blueprint $table){
            $table->foreign('studentId')->references('id')->on('INP_Student');
        });


        // ---------------------------------------- MODULO DE INPLEMENTACION REFERENCIAS ----------------------------------------

        Schema::table('INP_Advert', function(Blueprint $table){
            $table->foreign('typeId')->references('id')->on('INP_AdvertType');
        });

        Schema::table('INP_AdvertForUser', function(Blueprint $table){
            $table->foreign('advertId')->references('id')->on('INP_Advert');
        });

        Schema::table('INP_Student', function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
            $table->foreign('careerId')->references('id')->on('INP_Career');
        });

        Schema::table('INP_Instructor', function(Blueprint $table){
            $table->foreign('id')->references('id')->on('users');
        });

        Schema::table('INP_CourseInscribed', function(Blueprint $table){
            $table->foreign('courseId')->references('id')->on('INP_Course');
            $table->foreign('studentId')->references('id')->on('INP_Student');
            $table->foreign('careerId')->references('id')->on('INP_Career');
        });

        Schema::table('INP_CourseSchedule', function(Blueprint $table){
            $table->foreign('courseId')->references('id')->on('INP_Course');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('USR_RolPermission', function (Blueprint $table) {
            $table->dropForeign('usr_rolpermission_rolid_foreign');
            $table->dropForeign('usr_rolpermission_permissionid_foreign');
        });

        Schema::table('USR_UserRoles', function (Blueprint $table) {
            $table->dropForeign('usr_userroles_rolid_foreign');
            $table->dropForeign('usr_userroles_userid_foreign');
        });

        Schema::table('USR_Permission', function(Blueprint $table)
        {
            $table->dropForeign('usr_permission_sectionid_foreign');
        });

        Schema::table('USR_Info', function(Blueprint $table)
        {
            $table->dropForeign('usr_info_id_foreign');
        });




        Schema::table('CON_Activity', function (Blueprint $table) {
            $table->dropForeign('con_activity_coursesectionid_foreign');
            $table->dropForeign('con_activity_typeid_foreign');
        });

        Schema::table('CON_ActivityEvidence', function (Blueprint $table) {
            $table->dropForeign('con_activityevidence_typeid_foreign');
            $table->dropForeign('con_activityevidence_activityid_foreign');
        });

        Schema::table('CON_ActivityLink', function (Blueprint $table) {
            $table->dropForeign('con_activitylink_activityid_foreign');
        });

        Schema::table('CON_CourseSection', function (Blueprint $table) {
            $table->dropForeign('con_coursesection_courseid_foreign');
        });

        Schema::table('CON_Form', function (Blueprint $table) {
            $table->dropForeign('con_form_coursesectionid_foreign');
        });

        Schema::table('CON_FormField', function (Blueprint $table) {
            $table->dropForeign('con_formfield_formid_foreign');
            $table->dropForeign('con_formfield_typeid_foreign');
        });

        Schema::table('CON_FormResponse', function (Blueprint $table) {
            $table->dropForeign('con_formresponse_studentid_foreign');
        });

        Schema::table('CON_Task', function (Blueprint $table) {
            $table->dropForeign('con_task_coursesectionid_foreign');
        });

        Schema::table('CON_TaskDeliveryFile', function (Blueprint $table) {
            $table->dropForeign('con_taskdeliveryfile_deliveryid_foreign');
        });

        Schema::table('CON_TaskFile', function (Blueprint $table) {
            $table->dropForeign('con_taskfile_taskid_foreign');
        });




        Schema::table('RPT_Login', function (Blueprint $table)
        {
            $table->dropForeign('rpt_login_userid_foreign');
        });

        Schema::table('RPT_PlatformActivity', function(Blueprint $table)
        {
            $table->dropForeign('rpt_platformactivity_userid_foreign');
            $table->dropForeign('rpt_platformactivity_typeid_foreign');
        });

        Schema::table('RPT_AdvertViewed', function(Blueprint $table)
        {
            $table->dropForeign('rpt_advertviewed_userid_foreign');
            $table->dropForeign('rpt_advertviewed_advertid_foreign');
        });

        Schema::table('RPT_TaskProgress', function(Blueprint $table)
        {
            $table->dropForeign('rpt_taskprogress_coursesectionid_foreign');
        });

        Schema::table('RPT_TaskDeliveries', function(Blueprint $table)
        {
            $table->dropForeign('rpt_taskdeliveries_studentid_foreign');
            $table->dropForeign('rpt_taskdeliveries_taskid_foreign');
        });

        Schema::table('RPT_FormProgress', function(Blueprint $table)
        {
            $table->dropForeign('rpt_formprogress_responseid_foreign');
        });
        Schema::table('RPT_FormValue', function(Blueprint $table)
        {
            $table->dropForeign('rpt_formvalue_formfieldid_foreign');
            $table->dropForeign('rpt_formvalue_formresponseid_foreign');
        });
        Schema::table('RPT_FormFieldsResponse', function(Blueprint $table)
        {
            $table->dropForeign('rpt_formfieldsresponse_formfieldid_foreign');
        });

        Schema::table('RPT_PlanMaterialProgress', function(Blueprint $table)
        {
            $table->dropForeign('rpt_planmaterialprogress_planmaterialid_foreign');
        });

        Schema::table('RPT_CourseAssistance', function(Blueprint $table)
        {
            $table->dropForeign('rpt_courseassistance_scheduleid_foreign');
            $table->dropForeign('rpt_courseassistance_typeid_foreign');
            $table->dropForeign('rpt_courseassistance_studentid_foreign');
        });

        Schema::table('RPT_ActivityAssistance', function(Blueprint $table)
        {
            $table->dropForeign('rpt_activityassistance_activityid_foreign');
            $table->dropForeign('rpt_activityassistance_studentid_foreign');
        });




        Schema::table('COL_Notification', function (Blueprint $table)
        {
            $table->dropForeign('col_notification_userid_foreign');
            $table->dropForeign('col_notification_typeid_foreign');
        });

        Schema::table('COL_ForumConversation', function (Blueprint $table)
        {
            $table->dropForeign('col_forumconversation_forumid_foreign');
            $table->dropForeign('col_forumconversation_educatorid_foreign');
        });

        Schema::table('COL_ForumFile', function (Blueprint $table)
        {
            $table->dropForeign('col_forumfile_forumid_foreign');
        });




        Schema::table('APR_PlanLearning', function(Blueprint $table){
            $table->dropForeign('apr_planlearning_courseid_foreign');
        });

        Schema::table('APR_PlanTheme', function(Blueprint $table){
            $table->dropForeign('apr_plantheme_planid_foreign');
            $table->dropForeign('apr_plantheme_coursesectionid_foreign');
        });

        Schema::table('APR_PlanThemeMaterial', function(Blueprint $table){
            $table->dropForeign('apr_planthemematerial_planthemeid_foreign');
        });

        Schema::table('APR_PlanCalification', function(Blueprint $table){
            $table->dropForeign('apr_plancalification_coursesectionid_foreign');
        });

        Schema::table('APR_Certificate', function(Blueprint $table){
            $table->dropForeign('apr_certificate_studentid_foreign');
        });



        Schema::table('INP_Advert', function(Blueprint $table){
            $table->dropForeign('inp_advert_typeid_foreign');
        });

        Schema::table('INP_AdvertForUser', function(Blueprint $table){
            $table->dropForeign('inp_advertforuser_advertid_foreign');
        });

        Schema::table('INP_Student', function(Blueprint $table){
            $table->dropForeign('inp_student_careerid_foreign');
            $table->dropForeign('inp_student_id_foreign');
        });

        Schema::table('INP_Instructor', function(Blueprint $table){
            $table->dropForeign('inp_instructor_id_foreign');
        });

        Schema::table('INP_CourseInscribed', function(Blueprint $table){
            $table->dropForeign('inp_courseinscribed_careerid_foreign');
            $table->dropForeign('inp_courseinscribed_courseid_foreign');
            $table->dropForeign('inp_courseinscribed_studentid_foreign');
        });

        Schema::table('INP_CourseSchedule', function(Blueprint $table){
            $table->dropForeign('inp_courseschedule_courseid_foreign');
        });

    }
};
