<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToValidationWebhooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('validation_webhooks', function (Blueprint $table) {
            $table->foreign('account_id', 'validation_webhooks_ibfk_1')->references('id')->on('accounts')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('validation_webhooks', function (Blueprint $table) {
            $table->dropForeign('validation_webhooks_ibfk_1');
        });
    }
}
