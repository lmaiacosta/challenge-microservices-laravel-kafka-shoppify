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
        Schema::create('product', function (Blueprint $table) {

            $table->increments('id');

            $table->string('name');

            $table->text('description')->nullable();

            $table->float('price')->nullable();

            $table->string('vendor')->nullable();

            $table->string('product_type')->nullable();

            $table->string('status', 20)->default('draft');

            $table->integer('quantity');

            $table->string('image')->nullable();

            $table->dateTime('created_at')->nullable();

            $table->dateTime('updated_at')->nullable();


            $table->index(['id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product');
    }
};
