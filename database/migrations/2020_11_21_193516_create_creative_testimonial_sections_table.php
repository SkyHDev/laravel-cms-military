<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCreativeTestimonialSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('creative_testimonial_sections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('language_id');
            $table->foreign('language_id')->references('id')->on('languages')->onDelete('cascade');
            $table->text('title')->nullable();
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
        Schema::dropIfExists('creative_testimonial_sections');
    }
}
