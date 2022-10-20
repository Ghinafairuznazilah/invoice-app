<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipsToDetailInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('detail_invoices', function (Blueprint $table) {
            //
            $table->foreign('invoice_id')
                    ->references('id')->on('invoices')
                    ->onDelete('cascade');
             $table->foreign('product_id')
                    ->references('id')->on('products')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('detail_invoices', function (Blueprint $table) {
            //
            $table->dropForeign('details_invoices_invoice_id_foreign');
            $table->dropForeign('details_invoices_product_id_foreign');
        });
    }
}
