<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToConfirmationWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('confirmation_webhooks', function (Blueprint $table) {
            $table->foreign('org_id', 'confirmation_webhooks_ibfk_1')->references('id')->on('organizations')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('service_id', 'confirmation_webhooks_ibfk_2')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('confirmation_webhooks', function (Blueprint $table) {
            $table->dropForeign('confirmation_webhooks_ibfk_1');
            $table->dropForeign('confirmation_webhooks_ibfk_2');
        });
    }
}
