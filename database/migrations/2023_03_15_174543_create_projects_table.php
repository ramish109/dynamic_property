<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('category_id');
            $table->integer('package_id');
            $table->integer('country_id');
            $table->integer('city_id');
            $table->integer('state_id');
            $table->integer('currency_id');
            $table->string('title');
            $table->string('lat');
            $table->string('lon');
            $table->string('bed');
            $table->string('bath')->nullable();
            $table->string('floor')->nullable();
            $table->string('room_size')->nullable();
            $table->string('price');
            $table->string('installment')->nullable();
            $table->string('status')->nullable();
            $table->json('facility_id')->nullable();
            $table->string('is_featured')->nullable();
            $table->text('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('thubmnail')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
