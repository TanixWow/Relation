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
        Schema::create('inventory', function (Blueprint $table) {
            $table->id();
            $table->string("inventory_name" , 100);
            $table->integer("quantity");
            $table->unsignedBigInteger("category_id");
            $table->unsignedBigInteger("type_id");
            $table->unsignedBigInteger("size_id");

            $table->timestamps();

            $table->foreign("category_id")->references("id")->on("inventory_category")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("type_id")->references("id")->on("type")->onDelete("cascade")->onUpdate("cascade");

            $table->foreign("size_id")->references("id")->on("size")->onDelete("cascade")->onUpdate("cascade");


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory');
    }
};
