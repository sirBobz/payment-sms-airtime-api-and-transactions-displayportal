<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMpesaC2bTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpesa_c2b_transactions', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->integer('status')->default(0);
            $table->integer('billing_status')->default(0);
            $table->bigInteger('service_id')->nullable()->index('service_id');
            $table->string('request_id');
            $table->bigInteger('org_id')->index('org_id');
            $table->string('third_party_trans_id')->nullable();
            $table->timestamp('transaction_time')->useCurrent();
            $table->decimal('amount', 10);
            $table->decimal('available_balance', 10, 3)->nullable();
            $table->string('short_code', 10);
            $table->string('bill_ref_number')->nullable();
            $table->decimal('org_account_balance', 10)->nullable();
            $table->string('phone_number', 15);
            $table->string('customer_name', 50)->nullable();
            $table->integer('result_code')->default(100);
            $table->string('result_desc')->default('-- processing --');
            $table->softDeletes();
            $table->timestamps();
            $table->decimal('charge', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mpesa_c2b_transactions');
    }
}
