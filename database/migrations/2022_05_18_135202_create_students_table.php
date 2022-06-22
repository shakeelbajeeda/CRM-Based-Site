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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('fname', 255);
            $table->string('lname', 255);
            $table->date('dob');
            $table->string('email', 255);
            $table->string('password', 255);
            $table->string('phone', 35);
            $table->foreignId('parent_id')->references('id')->on('parents')->onDelete('cascade');
            $table->date('date_of_join');
            $table->boolean('status');
            $table->date('last_login_date');
            $table->ipAddress('last_login_ip');
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
        Schema::dropIfExists('students');
    }
};
