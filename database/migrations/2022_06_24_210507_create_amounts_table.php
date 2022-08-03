<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAmountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained('categories');
            $table->text('description');
            $table->float('value');





            

            // $table->foreign('user_id')
            //     ->references('id')
            //     ->on('users');

            // $table->foreign('category_id')
            //     ->references('id')
            //     ->on('categories');

            //$table->foreignId('user_id')->references('id')->on('users');
            // $table->enum('type', ['1','2','3'])->default('inactive');
            // $table->foreignId('categories_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('amounts');
    }
}
