<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('requester_id')->unsigned();
            $table->integer('receiver_id')->unsigned();
            $table->string('title');
            $table->string('slug');
            $table->string('source');
            $table->string('destination');
            $table->text('details', 65535)->nullable();
            $table->string('product_link')->nullable();
            $table->integer('order_id')->nullable();
            $table->integer('created_by')->unsigned();
            $table->enum('type',['request','travel','shipping','particular']);
            $table->integer('likes')->unsigned();
            $table->integer('dislikes')->unsigned();
            $table->integer('shares')->unsigned();
            $table->boolean('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requests');
    }
}
