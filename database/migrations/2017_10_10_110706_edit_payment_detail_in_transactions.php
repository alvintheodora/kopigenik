<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPaymentDetailInTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('bank_account')->after('status')->nullable()->change();
            $table->string('account_holder')->after('bank_account')->nullable()->change();
            $table->string('account_number')->after('account_holder')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->string('bank_account')->after('status')->nullable(false)->change();
            $table->string('account_holder')->after('bank_account')->nullable(false)->change();
            $table->string('account_number')->after('account_holder')->nullable(false)->change();
        });
    }
}
