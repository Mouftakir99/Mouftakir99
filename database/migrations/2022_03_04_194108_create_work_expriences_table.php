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
        Schema::create('work_expriences', function (Blueprint $table) {
            $table->id();
            $table->string('name_work_exprience');
            $table->string('statut_work_exprience');
            $table->longText('description_work_exprience');
            $table->date('start_work_exprience');
            $table->date('end_work_exprience');
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
        Schema::dropIfExists('work_expriences');
    }
};
