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
        Schema::create('extra_skills', function (Blueprint $table) {
            $table->id();
            $table->string('name_extra_skill');
            $table->string('desciption_extra_skill');
            $table->float('pourcentage_extra_skills')->min(0)->max(100);
            $table->foreignId('user_id');
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
        Schema::dropIfExists('extra_skills');
    }
};
