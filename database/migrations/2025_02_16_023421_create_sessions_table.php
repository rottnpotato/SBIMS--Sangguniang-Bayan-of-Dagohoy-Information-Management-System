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
    Schema::create('sessions', function (Blueprint $table) {
      $table->unsignedBigInteger('session_id')->autoIncrement();
      $table->text('user_type');
      $table->unsignedBigInteger('user_id');
      $table->string('email');
      $table->timestamp('login_at')->useCurrent();
      $table->timestamp('logged_out_at')->nullable();
      $table->primary('session_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('sessions');
  }
};
