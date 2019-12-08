<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function  __construct()
    {
        $this->down();
    }


    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->text('content');
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')
                ->references('id')->on('users')->onDelete('cascade');  //creando la relacion del id con el usuario en cascada

            $table->unsignedInteger('post_id');  //creamos el id forenaeo
            $table->foreign('post_id')  //agregamos la relacion con posts
                ->references('id')->on('posts')->onDelete('cascade');  //creando la relacion del id con el usuario en cascada


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
