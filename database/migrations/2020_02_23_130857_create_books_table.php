<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->string('book_img'); // add
            $table->bigIncrements('id');
            $table->text('book_title');
            $table->text('Author');
            $table->text('publisher');
            $table->datetime('published');
            $table->integer('lendingstatus'); // add
            $table->integer('ctgry_id');
            $table->integer('subctgry_id');
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
        Schema::dropIfExists('books');
    }
}
