<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Option;
class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
             $table->integer('criteria_id')->unsigned();
             $table->foreign('criteria_id')->references('id')
            ->on('criterias')->onDelete('cascade');
            $table->timestamps();
        });
        $options = ['white', 'black', 'red','blue','green'];
        foreach ($options as $option) 
            Option::create(['name' => $option,'criteria_id'=> 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('options');
    }
}
