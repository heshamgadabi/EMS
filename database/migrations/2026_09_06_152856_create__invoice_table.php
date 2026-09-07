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
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
          
            $table->foreignId('user_id')
              ->nullable()
              ->constrained('users')
              ->nullOnDelete();

        $table->foreignId('event_id')
              ->nullable()
              ->constrained('event') // تأكد من مطابقة اسم الجدول في قاعدة بياناتك (events أو event)
              ->nullOnDelete();
            
            $table->string('invoice_number')->unique(); // ضروري كمرجع فريد لكل فاتورة  
            
            $table->decimal('total_amount', 10, 2);
            $table->string('status')->default('unpaid')->comment('pending,paid,cancelled,unpaid,refunded');

            $table->timestamp('paid_at')->nullable(); // وقت السداد الفعلي للتقارير المالية
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
