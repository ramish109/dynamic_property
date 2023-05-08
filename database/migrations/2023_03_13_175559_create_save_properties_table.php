<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
 
class CreateSavePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void 
     */
    public function up()
    {
        Schema::create('save_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('property_id');
            $table->integer('category_id');
            $table->integer('country_id');
            $table->integer('state_id');
            $table->integer('city_id');
            $table->boolean('status');
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
        Schema::dropIfExists('save_properties');
    }
}
