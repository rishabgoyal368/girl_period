<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUser2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->Date('start_period_date')->nullable();
            $table->Date('end_period_date')->nullable();
            $table->date('next_period_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('start_period_date');
            $table->dropColumn('end_period_date');
            $table->dropColumn('next_period_date');
        });
    }
}
