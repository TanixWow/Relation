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
        Schema::create('inventory_history', function (Blueprint $table) {
            $table->id();
            $table->string("inventory_item_name",100);
            $table->integer("quantity");
            $table->string("mechanic_nickname",100);
            $table->enum("request_type",["checkup","job_order"])->default("checkup");
            $table->unsignedBigInteger("checkup_requests_id");
            $table->unsignedBigInteger("job_order_requests_id");
            $table->date("date_given");
            $table->string("size_name",100);
            $table->string("type_name",100);



            $table->timestamps();

            $table->foreign("checkup_requests_id")->references("id")->on("checkup_requests")->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("job_order_requests_id")->references("id")->on("job_order_requests")->onDelete("cascade")->onUpdate("cascade");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventory_history');
    }
};
