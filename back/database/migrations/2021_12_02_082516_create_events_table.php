<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('category_id')->constrained()->onDelete('CASCADE');
            $table->string('eventName');
            $table->string('image')->nullable();
            $table->string('orginal')->nullable();
            $table->string('size')->nullable();
            $table->string('start_time');
            $table->string('end_time');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->string('city');
            $table->string('country');
            $table->integer('participants');
            $table->text('discription');
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
        Schema::dropIfExists('events');
    }
}
