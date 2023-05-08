<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotifiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifies', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('sender_id')->nullable();
            $table->integer('reciever_id')->nullable();
            $table->integer('pkg_user')->nullable();
            $table->integer('property_user_id')->nullable();
            $table->integer('property_id')->nullable();
            $table->timestamp('read_at')->nullable();
            $table->integer('status');
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
        Schema::dropIfExists('notifies');
    }
}
