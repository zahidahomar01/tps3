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
        Schema::create('projects', function (Blueprint $table) {
            $table->id('proj_id');
            $table->string('proj_name');
            $table->string('proj_status');
            $table->date('proj_date');
            $table->unsignedBigInteger('pic_id');
            $table->foreign('pic_id')->nullable()->references('pic_id')->on('pics');
          // $table->timestamp('dateTime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
