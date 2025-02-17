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
        Schema::create('job_order_type', function (Blueprint $table) {
            $table->id();
            $table->string("job_type",100);
            $table->unsignedBigInteger("job_order_type_category_id");
            $table->timestamps();

            $table->foreign("job_order_type_category_id")->references("id")->on("job_order_type_category")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_order_type');
    }
};
