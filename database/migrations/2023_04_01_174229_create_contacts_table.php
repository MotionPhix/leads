<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('contacts', function (Blueprint $table) {
      $table->id();
      $table->string('first_name', 30);
      $table->string('last_name', 30);
      $table->string('email', 50)->nullable();
      $table->string('job_title', 70);
      $table->enum('status', ['active', 'dormant'])->default('active');
      $table->text('bio')->nullable();

      $table->unique(['first_name', 'last_name', 'email']);

      $table->foreignId('company_id')->nullable()->constrained('companies')->cascadeOnDelete();
      $table->foreignId('user_id')->index()->nullable()->constrained('users');

      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('contacts');
  }
};
