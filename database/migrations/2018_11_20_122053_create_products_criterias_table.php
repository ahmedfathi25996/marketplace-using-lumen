<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsCriteriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_criterias', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('product_id')->unsigned();
             $table->foreign('product_id')->references('id')
            ->on('products')->onDelete('cascade');
            $table->integer('criteria_id')->unsigned();
             $table->foreign('criteria_id')->references('id')
            ->on('criterias')->onDelete('cascade');
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
        Schema::dropIfExists('products_criterias');
    }
}
