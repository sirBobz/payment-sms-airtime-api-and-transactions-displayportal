<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_payments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('status', 255)->default('1');
            $table->string('transaction_uuid', 255)->nullable();
            $table->bigInteger('org_id')->nullable()->index('org_id');
            $table->string('third_party_request_id', 255)->nullable();
            $table->string('signed_date_time', 255)->nullable();
            $table->string('reference_number', 255)->nullable();
            $table->string('amount', 255)->nullable();
            $table->string('bill_to_name', 255)->nullable();
            $table->string('bill_to_email', 255)->nullable();
            $table->string('bill_to_phone', 255)->nullable();
            $table->string('req_card_expiry_date', 255)->nullable();
            $table->string('auth_avs_code', 255)->nullable();
            $table->string('score_card_issuer', 255)->nullable();
            $table->string('card_type_name', 255)->nullable();
            $table->string('auth_cavv_result', 255)->nullable();
            $table->string('auth_cavv_result_raw', 255)->nullable();
            $table->string('auth_response', 255)->nullable();
            $table->string('score_device_fingerprint_true_ipaddress_city', 255)->nullable();
            $table->string('decision', 255)->nullable();
            $table->string('score_device_fingerprint_true_ipaddress_attributes', 255)->nullable();
            $table->string('decision_rmsg', 255)->nullable();
            $table->string('message', 255)->nullable();
            $table->string('score_internet_info', 255)->nullable();
            $table->string('req_device_fingerprint_id', 255)->nullable();
            $table->string('req_transaction_uuid', 255)->nullable();
            $table->string('result_code', 255)->nullable();
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
        Schema::dropIfExists('card_payments');
    }
}
