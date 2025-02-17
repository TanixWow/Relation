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
        Schema::create('checkup_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("checkupdesc_id");
            $table->string("inventory_item_name",100);
            $table->integer("quantity");
            $table->unsignedBigInteger("mech_acc_id");
            $table->enum("status",["Pending","Hand Over"])->default("Pending");
            $table->date("request_date");
            $table->unsignedBigInteger("size_id");
            $table->unsignedBigInteger("type_id");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkup_requests');
    }
};
