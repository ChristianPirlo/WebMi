<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('webhr', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->enum('role', ['superadmin', 'unit', 'viewer'])->default('viewer');
            $table->timestamps();
        });
    }

    public function down()
    { 
        Schema::dropIfExists('webhr');
    }
}

