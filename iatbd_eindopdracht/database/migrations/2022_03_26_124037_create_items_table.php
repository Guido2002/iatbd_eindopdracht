<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('kind');
            $table->string('description');
            $table->string('image')->default('img/items/default.jpg');
            $table->string('time_loaned');
            $table->boolean('loaned')->default(0);
            $table->foreignId('id_lender');
            $table->foreign('id_lender')->references('id')->on('users');
            $table->foreignId('id_borrower')->nullable();
            $table->foreign('kind')->references('kind')->on('kind_of_item');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
