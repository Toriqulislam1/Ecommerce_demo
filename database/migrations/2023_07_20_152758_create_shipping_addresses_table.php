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
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();

            $table->integer('coustomer_id');
            $table->string('order_id');
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('country');
            $table->string('city');
            $table->string('state');
            $table->string('zip_code');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_addresses');
    }
};
