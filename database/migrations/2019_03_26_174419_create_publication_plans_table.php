<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublicationPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_plans', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->unsignedInteger('discipline_id');
            $table->foreign('discipline_id')->references('id')->on('disciplines');
            $table->unsignedInteger('type_publication_id');
            $table->foreign('type_publication_id')->references('id')->on('type_of_publication');
            $table->string('name_of_publication');
            $table->unsignedInteger('paper_size_id');
            $table->foreign('paper_size_id')->references('id')->on('papers_sizes');
            $table->integer('number_of_pages');
            $table->integer('number_of_copies');
            $table->unsignedInteger('cover_id');
            $table->foreign('cover_id')->references('id')->on('covers');
            $table->unsignedInteger('month_of_submission_id');
            $table->foreign('month_of_submission_id')->references('id')->on('month_of_submissions');
            $table->string('phone_number');
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
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('publication_plans');
    }
}
