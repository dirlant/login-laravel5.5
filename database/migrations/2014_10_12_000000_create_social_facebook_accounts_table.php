<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialFacebookAccountsTable extends Migration
{

    public function up()
    {
        Schema::create('social_facebook_accounts', function (Blueprint $table) {
          $table->integer('user_id');
          $table->string('provider_user_id');
          $table->string('provider');
          $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('social_facebook_accounts');
    }
}
