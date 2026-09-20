<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('invoice', function (Blueprint $table) {

          $table->integer('tax')->nullable()->after('total_amount');
          $table->decimal('tax_amount', 10, 2)->nullable()->after('tax');

          $table->decimal('total_amount_with_tax', 10, 2)->nullable()->after('tax_amount');
          
          $table->decimal('discount_amount', 10, 2)->nullable()->after('total_amount_with_tax');



            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoice', function (Blueprint $table) {
            //
        });
    }
};
