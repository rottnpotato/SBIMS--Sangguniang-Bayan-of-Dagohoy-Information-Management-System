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
    Schema::create('certificates', function (Blueprint $table) {
      $table->unsignedBigInteger('certificate_id')->autoIncrement();
      $table->string('certification_type')->nullable();
      $table->string('certificate_type')->nullable();
      $table->primary('certificate_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('certificates');
  }
};
