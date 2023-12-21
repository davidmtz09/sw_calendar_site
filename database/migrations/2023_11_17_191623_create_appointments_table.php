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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id('id');
            $table->char('reason',100);
            $table->char('desc',200);
            $table->dateTime('begin');
            $table->dateTime('end');
            $table->date('date_at');
            $table->date('date_end');
            $table->time('hour');
            $table->time('hour_end');
            $table->unsignedSmallInteger('session');
            $table->char('color',10)->default('#1ABC9C');
            $table->char('textColor',10)->default('#000000');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
