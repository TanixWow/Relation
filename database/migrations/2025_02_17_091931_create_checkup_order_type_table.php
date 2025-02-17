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
        Schema::create('checkup_order_type', function (Blueprint $table) {
            $table->id();
            $table->string("checkup_type",100);
            $table->unsignedBigInteger("checkup_order_category_id");
            $table->timestamps();

            $table->foreign("checkup_order_category_id")->references("id")->on("checkup_order_category")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup_order_type');
    }
};
