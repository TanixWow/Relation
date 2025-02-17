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
        Schema::create('job_order_requests', function (Blueprint $table) {
            $table->id();
            
            $table->string("inventory_item_name" , 100);
            $table->integer("quantity");
            $table->enum("status",["Pending","Hand Over"])->default("Pending");
            $table->unsignedBigInteger("job_desc_id");
            $table->unsignedBigInteger("size_id");
            $table->unsignedBigInteger("type_id");
            $table->unsignedBigInteger("mech_acc_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_order_requests');
    }
};
