<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('diets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // اسم النظام الغذائي
            $table->text('description')->nullable(); // وصف النظام الغذائي
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('diets');
    }
};
