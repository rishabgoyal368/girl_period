<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameUserFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
             $table->dropColumn(['first_name', 'last_name']);
        });

        Schema::table('users', function($table) {
            $table->String('name');
            $table->String('user_name');
            $table->String('is_pregnency')->nullable();
            $table->date('pregnency_date')->nullable();
        });
    }


    public function down()
    {
        Schema::table('users', function($table) {
             $table->String('first_name');
             $table->String('last_name');
        });

        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->dropColumn('user_name');
            $table->dropColumn('is_pregnency');
            $table->dropColumn('pregnency_date');
        });

    }

}
