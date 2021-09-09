<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->index('org_id');
            $table->string('name', 100);
            $table->string('email')->unique();
            $table->string('phone_number', 100);
            $table->string('password')->nullable();
            $table->string('ip_address', 50)->nullable();
            $table->string('two_factor_code')->nullable();
            $table->dateTime('two_factor_expires_at')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->string('remember_token')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}
