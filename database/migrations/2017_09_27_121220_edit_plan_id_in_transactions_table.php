<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditPlanIdInTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            $table->integer('plan_id')->length(10)->unsigned();
            $table->integer('user_id')->length(10)->unsigned()->change();
            //set foreign keys
            $table->foreign('plan_id')->references('id')->on('plans')
                ->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade');
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
            $table->dropForeign('transactions_plan_id_foreign');
            $table->dropForeign('transactions_user_id_foreign');
            $table->dropColumn('plan_id');
        });
         
        
    }
}
