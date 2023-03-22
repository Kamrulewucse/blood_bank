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
        Schema::create('purchese_donates', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('blood_group');
            $table->integer('purchae_donate_status');
            $table->date('approximate_date')->nullable();
            $table->string('division');
            $table->string('district');
            $table->string('thana');
            $table->string('address');
            $table->string('note')->nullable();
            $table->boolean('status')->default(1)
                ->comment('0=inactive,1=active');
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
        Schema::dropIfExists('purchese_donates');
    }
};
