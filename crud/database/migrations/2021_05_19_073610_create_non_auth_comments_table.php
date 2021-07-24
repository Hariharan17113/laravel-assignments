<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNonAuthCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('non_auth_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('non_auth_user_id');
            $table->foreign('non_auth_user_id')
                ->references('id')
                ->on('non_auth_users')
                ->cascadeOnDelete();
            $table->string('comments');
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
        Schema::dropIfExists('non_auth_comments');
    }
}
