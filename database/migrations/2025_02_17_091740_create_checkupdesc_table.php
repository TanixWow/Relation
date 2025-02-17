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
        Schema::create('checkupdesc', function (Blueprint $table) {
            $table->id();
            $table->string("change_oil",100);
            $table->string("underchassis",100);
            $table->unsignedBigInteger("cars_id");
            $table->unsignedBigInteger("mech_acc_id");
            $table->string("mech_assign",100);
            $table->string("plate_number",100);
            $table->string("brand",100);
            $table->string("model",100);
            $table->timestamps();

            $table->foreign("cars_id")->references("id")->on("cars")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("mech_acc_id")->references("id")->on("mech_acc")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checkupdesc');
    }
};
