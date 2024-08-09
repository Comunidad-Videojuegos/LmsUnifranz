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

    Schema::create('USR_Rol', function (Blueprint $table) {
      $table->id();
      $table->timestamp('createDate')->useCurrent();
      $table->timestamp('updateDate')->nullable();
      $table->timestamp('deleteDate')->nullable();
    });
    DB::statement("ALTER TABLE USR_Rol ADD name varchar(50) NOT NULL");

    Schema::create('USR_UserRoles', function (Blueprint $table) {
      $table->id();
      $table ->unsignedBigInteger('rolId');
      $table ->unsignedBigInteger('userId');
      $table->timestamp('createDate')->useCurrent();
      $table->timestamp('updateDate')->nullable();
      $table->timestamp('deleteDate')->nullable();
    });

    Schema::create('USR_Info', function(Blueprint $table)
    {
        $table->unsignedBigInteger('id')->primary();
        $table->string('photo')->nullable();
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
    Schema::dropIfExists('USR_UserRoles');
    Schema::dropIfExists('USR_Rol');
    Schema::dropIfExists('USR_Info');
  }
};
