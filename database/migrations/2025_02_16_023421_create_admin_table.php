<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('admin', function (Blueprint $table) {
      $table->id('admin_id');
      $table->string('username', 127)->unique();
      $table->string('password');
      $table->string('fname', 127);
      $table->string('lname', 127);
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('admin');
  }
};
