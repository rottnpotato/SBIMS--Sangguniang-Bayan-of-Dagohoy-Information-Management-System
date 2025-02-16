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
    Schema::create('blotters', function (Blueprint $table) {
      $table->unsignedBigInteger('blotter_id')->autoIncrement();
      $table->string('incident_type')->nullable();
      $table->string('status')->nullable();
      $table->string('schedule')->nullable();
      $table->date('schedule_date')->nullable();
      $table->date('date_reported')->nullable();
      $table->time('time_reported')->nullable();
      $table->date('date_incident')->nullable();
      $table->time('time_incident')->nullable();
      $table->string('incident_location')->nullable();
      $table->longText('incident_narrative')->nullable();
      $table->timestamps();
      $table->primary('blotter_id');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('blotters');
  }
};
