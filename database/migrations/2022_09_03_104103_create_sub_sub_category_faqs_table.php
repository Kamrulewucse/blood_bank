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
        Schema::create('sub_sub_category_faqs', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('sub_sub_category_id');
            $table->text('question');
            $table->longText('answer');
            $table->integer('sort');
            $table->string('image');
            $table->boolean('status')->default(1);
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
        Schema::dropIfExists('sub_sub_category_faqs');
    }
};
