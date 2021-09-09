<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBalanceNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('balance_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('org_id')->index('org_id');
            $table->integer('sent_status')->default(1);
            $table->bigInteger('status')->default(0);
            $table->string('threshold', 255)->default('0');
            $table->text('emails');
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
        Schema::dropIfExists('balance_notifications');
    }
}
