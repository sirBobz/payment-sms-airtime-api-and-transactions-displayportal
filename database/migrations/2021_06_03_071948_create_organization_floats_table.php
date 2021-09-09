<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrganizationFloatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organization_floats', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->bigInteger('org_id')->index('org_id');
            $table->decimal('available_balance', 10)->unsigned()->nullable()->comment('This is the account float in use. ');
            $table->decimal('current_balance', 10)->unsigned()->nullable()->comment('This is the current balance after deductions');
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
        Schema::dropIfExists('organization_floats');
    }
}
