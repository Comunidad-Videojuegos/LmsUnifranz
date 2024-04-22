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

        });
        DB::statement("ALTER TABLE COL_Notification ADD Header varchar(50)");
        DB::statement("ALTER TABLE COL_Notification ADD Body varchar(100)");
        //DB::statement("ALTER TABLE COL_Notification ADD TypeNotification");
        DB::statement("ALTER TABLE COL_Notification ADD CreateDate date");
        DB::statement("ALTER TABLE COL_Notification ADD Read varchar(50)");

        Schema::create('COL_Forum', function(Blueprint $table)
        {
            $table->id();
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE COL_Forum ADD Header varchar(70)");
        DB::statement("ALTER TABLE COL_Forum ADD Content varchar(200)");
        DB::statement("ALTER TABLE COL_Forum ADD CreateUserId int");
        DB::statement("ALTER TABLE COL_Forum ADD Answer nvarchar");
        DB::statement("ALTER TABLE COL_Forum ADD Views nvarchar");
        DB::statement("ALTER TABLE COL_Forum ADD OrderNumber int");

        Schema::create('COL_ForumConversation', function ( Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('ForumId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        
        });
        DB::statement("ALTER TABLE COL_ForumConversation ADD Message nvarchar");
        DB::statement("ALTER TABLE COL_ForumConversation ADD Views nvarchar");
        DB::statement("ALTER TABLE COL_ForumConversation ADD Answers nvarchar");

        Schema::create('COL_ForumFiles', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('ForumId');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->useCurrent();
            $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
        });
        DB::statement("ALTER TABLE COL_ForumFiles ADD name varchar(50)");
        DB::statement("ALTER TABLE COL_ForumFiles ADD Description varchar(255)");
        DB::statement("ALTER TABLE COL_ForumFiles ADD TypeFile varchar(10)");
        DB::statement("ALTER TABLE COL_ForumFiles ADD SizeFile varchar(20)");
        //Relaciones
        Schema::table('COL_Notification', function (Blueprint $table)
        {
            $table->foreign('TypeNotificationsId')->references('id')->on('COL_TypeNotifications');
        });

        Schema::table('COL_ForumConversation', function (Blueprint $table)
        {
            $table->foreign('ForumId')->references('id')->on('COL_Forum');
        });

        Schema::table('COL_ForumFiles', function (Blueprint $table)
        {
            $table->foreign('ForumId')->references('id')->on('COL_Forum');
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
