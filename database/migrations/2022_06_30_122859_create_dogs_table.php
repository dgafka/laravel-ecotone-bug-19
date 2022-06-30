<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('dogs', function (Blueprint $table) {
            $table->uuid('id')->primary()->unique();
            $table->string('name');
        });
    }
};
