<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUser1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
             $table->dropColumn(['name', 'user_name']);
        });

        Schema::table('users', function($table) {
            $table->String('name')->nullable();
            $table->String('user_name')->nullable();
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
             $table->String('name');
             $table->String('user_name');
        });

        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->dropColumn('user_name');
        });
    }
}
