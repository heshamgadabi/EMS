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
        Schema::create('invoice_ticket', function (Blueprint $table) {
            $table->id();

            $table->foreignId('invoice_id')
                  ->constrained('invoice')
                  ->cascadeOnDelete();

            // في حال حذف التذكرة: يبقى البند ويتحول معرف التذكرة إلى null
            $table->foreignId('ticket_id')
                ->nullable()
                ->constrained('ticket')
                ->nullOnDelete();

            // الاحتفاظ باسم التذكرة كـ Snapshot وقت الشراء حتى لا يضيع الوصف بعد الحذف
            $table->string('ticket_title')->nullable();    

            $table->unsignedInteger('quantity')->default(1);
            $table->decimal('unit_price', 10, 2); // سعر الحبة وقت الشراء
            $table->decimal('total_price', 10, 2); // الإجمالي لهذا البند      

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_tickets');
    }
};
