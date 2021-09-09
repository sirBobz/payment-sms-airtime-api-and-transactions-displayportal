<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConfirmationWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('confirmation_webhooks', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('org_id')->index('org_id');
            $table->bigInteger('service_id')->index('service_id');
            $table->string('url');
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
        Schema::dropIfExists('confirmation_webhooks');
    }
}
