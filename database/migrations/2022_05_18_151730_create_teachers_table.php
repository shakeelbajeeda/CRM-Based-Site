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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 45);
            $table->string('lname', 45);
            $table->date('dob');
            $table->string('email', 45);
            $table->string('password', 45);
            $table->string('phone', 15);
            $table->boolean('status');
            $table->date('last_login_date');
            $table->ipAddress('last_login_ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teachers');
    }
};
