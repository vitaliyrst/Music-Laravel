<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singers', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->string('position', 200)->nullable();
            $table->text('description')->nullable();
            $table->text('cover')->nullable();
            $table->integer('group_id');
            $table->integer('created_user_id');
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('created_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('singers');
    }
}
