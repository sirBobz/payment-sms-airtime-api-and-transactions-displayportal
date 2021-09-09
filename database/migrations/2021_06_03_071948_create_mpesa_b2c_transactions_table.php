<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaB2cTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_b2c_transactions', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('status')->default(0)->index('status');
            $table->integer('billing_status')->default(0);
            $table->string('reference_name')->nullable();
            $table->string('request_id');
            $table->bigInteger('org_id')->index('org_id');
            $table->string('third_party_trans_id')->nullable()->index('third_party_trans_id');
            $table->timestamp('transaction_time')->useCurrent();
            $table->decimal('amount', 10);
            $table->string('short_code', 10)->nullable();
            $table->string('originator_conversation_id')->nullable();
            $table->decimal('org_account_balance', 10)->nullable();
            $table->string('phone_number', 15);
            $table->string('customer_name', 50)->nullable();
            $table->integer('result_code')->default(100);
            $table->string('result_desc')->default('-- processing --');
            $table->softDeletes();
            $table->timestamps();
            $table->decimal('charge', 10)->nullable();
            $table->decimal('B2C_utility_account_available_funds', 10)->nullable();
            $table->decimal('B2C_charges_paid_account_available_funds', 10)->nullable();
            $table->string('B2C_recipientIs_registered_customer', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpesa_b2c_transactions');
    }
}
