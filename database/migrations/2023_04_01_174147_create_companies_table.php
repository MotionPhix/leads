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
    Schema::create('companies', function (Blueprint $table) {
      $table->id();
      $table->string('name', 50);
      $table->string('slogan', 255)->nullable();
      $table->text('address')->nullable();
      $table->string('website')->nullable();
      $table->string('country');

      $table->foreignId('category_id')->index()->nullable()->constrained('categories');

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
    Schema::dropIfExists('companies');
  }
};
