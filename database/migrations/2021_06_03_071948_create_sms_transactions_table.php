<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sms_transactions', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('org_id')->index('org_id');
            $table->integer('status')->default(0)->index('status');
            $table->integer('billing_status')->default(0);
            $table->string('reference_name')->nullable();
            $table->timestamp('transaction_time')->useCurrent();
            $table->string('request_id');
            $table->bigInteger('telco_id')->nullable()->index('telco_id');
            $table->string('phone_number', 20);
            $table->text('message');
            $table->string('sender_id', 15);
            $table->double('amount', 3, 2)->nullable();
            $table->decimal('available_balance', 10, 3)->nullable();
            $table->string('third_party_trans_id')->nullable();
            $table->integer('result_code')->nullable()->default(100);
            $table->string('result_desc')->nullable()->default('-- processing --');
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
        Schema::dropIfExists('sms_transactions');
    }
}
