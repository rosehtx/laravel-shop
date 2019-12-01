<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('username',60)->default('')->comment('用户名')->nullable();
            $table->string('password',60)->default('')->comment('密码')->nullable();
            $table->char('openid',60)->default('')->comment('openid')->nullable();
            $table->string('image_head',200)->default('')->comment('头像地址')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_user');
    }
}
