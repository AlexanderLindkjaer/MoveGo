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
            $table->increments('id');
            $table->string('headline');
            $table->text('description');
            $table->decimal('long', 10, 7);
            $table->decimal('lat', 10, 7);
            $table->string('adress');
            $table->integer('no_of_signups')->default(0);
            $table->dateTime('start_of_event_date');
            $table->string('start_of_event_clock');

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
