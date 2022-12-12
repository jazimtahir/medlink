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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
//            $table->unsignedBigInteger('user_id');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
//            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->foreignId('specialization_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string('salutation')->nullable();
            $table->string('professional_statement')->nullable();
            $table->string('fee')->nullable();
            $table->date('practicing_from')->nullable();
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
        Schema::dropIfExists('doctors');
    }
};
