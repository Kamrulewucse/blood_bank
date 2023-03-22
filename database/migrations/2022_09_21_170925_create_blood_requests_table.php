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
        Schema::create('blood_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('taker_id');
            $table->unsignedInteger('giver_id');
            $table->date('date')->nullable();
            $table->boolean('confirmation_status')->default(3)-> comment('3=available, 2=pending,1=completed');
            $table->boolean('donate_type')->default(1)-> comment('0=purchase,1=free');
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
        Schema::dropIfExists('blood_requests');
    }
};
