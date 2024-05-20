<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
  // Run the migrations.
  public function up(): void
  {
    Schema::create('USR_Permission', function (Blueprint $table) {
      $table->id();
      $table ->unsignedBigInteger('sectionId');
    });
    DB::statement("ALTER TABLE USR_Permission ADD name varchar(30) NOT NULL");
    DB::statement("ALTER TABLE USR_Permission ADD permissionKey varchar(255) NOT NULL");

    Schema::create('USR_Rol', function (Blueprint $table) {
      $table->id();
      $table->timestamp('createDate')->useCurrent();
      $table->timestamp('updateDate')->nullable();
      $table->timestamp('deleteDate')->nullable();
    });
    DB::statement("ALTER TABLE USR_Rol ADD name varchar(20) NOT NULL");

    Schema::create('USR_UserRoles', function (Blueprint $table) {
      $table->id();
      $table ->unsignedBigInteger('rolId');
      $table ->unsignedBigInteger('userId');
      $table->timestamp('createDate')->useCurrent();
      $table->timestamp('updateDate')->nullable();
      $table->timestamp('deleteDate')->nullable();
    });

    Schema::create('USR_RolPermission', function (Blueprint $table) {
      $table->id();
      $table ->unsignedBigInteger('permissionId');
      $table ->unsignedBigInteger('rolId');
    });
    Schema::create('USR_AppSection', function(Blueprint $table)
    {
        $table->id();
        $table->string('link', 40);
        $table->string('name', 40);
        $table->string('description', 40)->nullable();
        $table->string('icon', 30);
        $table->integer('group')->default(1);
    });

    Schema::create('USR_Info', function(Blueprint $table)
    {
        $table->unsignedBigInteger('id')->primary();
    });
    DB::statement("ALTER TABLE USR_Info ADD firstName varchar(40)");
    DB::statement("ALTER TABLE USR_Info ADD momLastName varchar(40)");
    DB::statement("ALTER TABLE USR_Info ADD dadLastName varchar(40)");
    DB::statement("ALTER TABLE USR_Info ADD age int");
    DB::statement("ALTER TABLE USR_Info ADD ci varchar(15)");

  }

  // Reverse the migrations.
  public function down(): void
  {
    Schema::dropIfExists('USR_RolPermission');
    Schema::dropIfExists('USR_UserRoles');
    Schema::dropIfExists('USR_Rol');
    Schema::dropIfExists('USR_Info');
    Schema::dropIfExists('USR_Permission');
    Schema::dropIfExists('USR_AppSection');
  }
};
