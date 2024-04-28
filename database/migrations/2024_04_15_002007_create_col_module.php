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
        Schema::create('COL_TypeNotifications', function (Blueprint $table) {
            $table->id();
            //$table->timestamps();
        });
        DB::statement("ALTER TABLE COL_TypeNotifications ADD name varchar(50)");
        DB::statement("ALTER TABLE COL_TypeNotifications ADD color varchar(50)");

        Schema::create('COL_Notification', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('TypeNotificationID');
            $table->timestamp('createDate')->useCurrent();
        });
        DB::statement("ALTER TABLE COL_Notification ADD header varchar(50)");
        DB::statement("ALTER TABLE COL_Notification ADD body varchar(100)");
        //DB::statement("ALTER TABLE COL_Notification ADD TypeNotification");
        //DB::statement("ALTER TABLE COL_Notification ADD createDate date");
        DB::statement("ALTER TABLE COL_Notification ADD read varchar(50)");

        Schema::create('COL_Forum', function(Blueprint $table)
        {
            $table->id();
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE COL_Forum ADD header varchar(70)");
        DB::statement("ALTER TABLE COL_Forum ADD content varchar(200)");
        DB::statement("ALTER TABLE COL_Forum ADD createUserId int");
        DB::statement("ALTER TABLE COL_Forum ADD answer nvarchar");
        DB::statement("ALTER TABLE COL_Forum ADD views nvarchar");
        DB::statement("ALTER TABLE COL_Forum ADD orderNumber int");

        Schema::create('COL_ForumConversation', function ( Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('forumId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        
        });
        DB::statement("ALTER TABLE COL_ForumConversation ADD message nvarchar");
        DB::statement("ALTER TABLE COL_ForumConversation ADD views nvarchar");
        DB::statement("ALTER TABLE COL_ForumConversation ADD answers nvarchar");

        Schema::create('COL_ForumFiles', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('forumId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE COL_ForumFiles ADD name varchar(50)");
        DB::statement("ALTER TABLE COL_ForumFiles ADD description varchar(255)");
        DB::statement("ALTER TABLE COL_ForumFiles ADD typeFile varchar(10)");
        DB::statement("ALTER TABLE COL_ForumFiles ADD sizeFile varchar(20)");
        //Relaciones
        Schema::table('COL_Notification', function (Blueprint $table)
        {
            $table->foreign('typeNotificationsId')->references('id')->on('COL_TypeNotifications');
        });

        Schema::table('COL_ForumConversation', function (Blueprint $table)
        {
            $table->foreign('forumId')->references('id')->on('COL_Forum');
        });

        Schema::table('COL_ForumFiles', function (Blueprint $table)
        {
            $table->foreign('forumId')->references('id')->on('COL_Forum');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('COL_TypeNotifications');
        Schema::dropIfExists('COL_Notification');
        Schema::dropIfExists('COL_Forum');
        Schema::dropIfExists('COL_ForumFiles');
        Schema::dropIfExists('COL_ForumConversation');
    }
};
