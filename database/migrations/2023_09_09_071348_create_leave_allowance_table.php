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
        Schema::create('leave_allowance', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('account_id');
            $table->text('reason');
            $table->timestamp('start_date', $precision = 0);
            $table->timestamp('end_date', $precision = 0);
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('account_id')
                ->references('id')
                ->on('accounts')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leave_allowance');
    }
};
