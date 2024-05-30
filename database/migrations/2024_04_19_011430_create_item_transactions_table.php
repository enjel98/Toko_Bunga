<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void
    {

        Schema::create('item_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transaction')->nullable();
            $table->bigInteger('id_product')->nullable();
            $table->decimal('price', 20, 0);
            $table->integer('qty');
            $table->decimal('total', 20, 0);
            $table->softDeletes();
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('item_transactions');
    }
};

