<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_notes', function (Blueprint $table) {
            $table->id();
            $table->Integer('user_id');
            $table->date('date')->nullable();
            $table->longText('note')->nullable();
            $table->dateTime('period_started_date')->nullable();
            $table->dateTime('period_ended_date')->nullable();
            $table->Integer('flow')->nullable();
            $table->string('took_medicine')->nullable();
            $table->string('intercourse')->nullable();
            $table->string('masturbated')->nullable();
            $table->longText('mood')->nullable();
            $table->string('weight')->nullable();
            $table->string('height')->nullable();
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
        Schema::dropIfExists('user_notes');
    }
}
