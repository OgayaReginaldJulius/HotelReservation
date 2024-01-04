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
        Schema::create('reasonBackOutTable', function (Blueprint $table) {
            $table->id('reasonBackOut_id');
            $table->integer('reservation_id');
            $table->integer('user_id');
            $table->string('reason');
            $table->integer('set_by_admin');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};