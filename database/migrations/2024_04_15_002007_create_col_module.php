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
        Schema::create('COL_TypeNotification', function (Blueprint $table) {
            $table->id();
        });
        DB::statement("ALTER TABLE COL_TypeNotification ADD name varchar(50)");
        DB::statement("ALTER TABLE COL_TypeNotification ADD color varchar(50)");

        Schema::create('COL_Notification', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('typeId');
            $table->timestamp('createDate')->useCurrent();
            $table->boolean('read');
            $table->string('body');
        });
        DB::statement("ALTER TABLE COL_Notification ADD header varchar(50)");

        Schema::create('COL_Forum', function(Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('courseSectionId');
            $table->decimal('valoration')->nullable();
            $table->integer('orderNumber');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });
        DB::statement("ALTER TABLE COL_Forum ADD header varchar(70)");
        DB::statement("ALTER TABLE COL_Forum ADD content varchar(200)");

        Schema::create('COL_ForumConversation', function ( Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('conversationId');
            $table->unsignedBigInteger('userId');
            $table->unsignedBigInteger('forumId');
            $table->string('message');
            $table->timestamp('createDate')->useCurrent();
            $table->timestamp('updateDate')->nullable();
            $table->timestamp('deleteDate')->nullable();
        });

        Schema::create('COL_ForumConversationFile', function ( Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('conversationId');
            $table->string('link');
            $table->decimal('size');
        });
        DB::statement("ALTER TABLE COL_ForumConversationFile ADD type varchar(20)");

        Schema::create('COL_ForumFile', function (Blueprint $table)
        {
            $table->id();
            $table->unsignedBigInteger('forumId');
            $table->string('link');
            $table->decimal('size');
        });
        DB::statement("ALTER TABLE COL_ForumFile ADD name varchar(50)");
        DB::statement("ALTER TABLE COL_ForumFile ADD description varchar(100)");
        DB::statement("ALTER TABLE COL_ForumFile ADD type varchar(5)");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('COL_TypeNotification');
        Schema::dropIfExists('COL_Notification');
        Schema::dropIfExists('COL_Forum');
        Schema::dropIfExists('COL_ForumFile');
        Schema::dropIfExists('COL_ForumConversation');
        Schema::dropIfExists('COL_ForumConversationFile');
    }
};
