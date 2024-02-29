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
        Schema::table('table_user', function (Blueprint $table) {
            $table->increments('id')->unsigned(); // ID sebagai integer(10), auto-increment, primary key
            $table->string('username', 128);
            $table->string('password');
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('table_user', function (Blueprint $table) {
            $table->increments('id')->unsigned(); // ID sebagai integer(10), auto-increment, primary key
            $table->string('username', 128);
            $table->string('password')->change();
            $table->timestamp('created_at')->useCurrent();
        });
    }
};
