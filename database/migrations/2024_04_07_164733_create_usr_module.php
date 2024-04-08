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
    });
    DB::statement("ALTER TABLE USR_Permission ADD name varchar(30)");
    DB::statement("ALTER TABLE USR_Permission ADD permissionKey varchar(256)");

    Schema::create('USR_Rol', function (Blueprint $table) {
      $table->id();
      $table->timestamp('createDate')->useCurrent();
      $table->timestamp('updateDate')->useCurrent();
      $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
    });
    DB::statement("ALTER TABLE USR_Rol ADD name varchar(20) NOT NULL");

    Schema::create('USR_UserRoles', function (Blueprint $table) {
      $table->id();
      $table ->unsignedBigInteger('rolId');
      $table ->unsignedBigInteger('userId');
      $table->timestamp('createDate')->useCurrent();
      $table->timestamp('updateDate')->useCurrent();
      $table->timestamp('deleteDate')->default('0001-01-01 00:00:00');
    });
    DB::statement("ALTER TABLE USR_UserRoles ADD color varchar(10) NOT NULL");

    Schema::create('USR_RolPermissions', function (Blueprint $table) {
      $table->id();
      $table ->unsignedBigInteger('permissionId');
      $table ->unsignedBigInteger('rolId');
    });

    // Relaciones
    Schema::table('USR_RolPermissions', function (Blueprint $table) {
      $table->foreign('rolId')->references('id')->on('USR_Rol');
      $table->foreign('permissionId')->references('id')->on('USR_Permission');
    });

    Schema::table('USR_UserRoles', function (Blueprint $table) {
      $table->foreign('rolId')->references('id')->on('USR_Rol');
      $table->foreign('userId')->references('id')->on('users');
    });
  }

  // Reverse the migrations.
  public function down(): void
  {
    Schema::dropIfExists('USR_RolPermissions');
    Schema::dropIfExists('USR_UserRoles');
    Schema::dropIfExists('USR_Rol');
    Schema::dropIfExists('USR_Permission');
  }
};
