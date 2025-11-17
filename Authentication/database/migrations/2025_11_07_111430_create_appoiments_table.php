<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('appoiments', function (Blueprint $table) {
            $table->id();
            $table->string('p_name');
            $table->string('p_mail');
            $table->string('p_address');
            $table->date('date');
            $table->string('p_age');
            $table->unsignedBigInteger('d_id');
            $table->foreign('d_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->unsignedBigInteger('h_id');
            $table->foreign('h_id')->references('id')->on('hospitals')->onDelete('cascade');
            $table->unsignedBigInteger('userid');
            $table->foreign('userid')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appoiments');
    }
};
