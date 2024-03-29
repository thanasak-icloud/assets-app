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
        Schema::create('user_has_assets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')
            ->on('users');
            $table->unsignedBigInteger('asset_id');
            $table->foreign('asset_id')->references('id')
            ->on('assets');
            $table->unsignedBigInteger('asset_type_id');
            $table->foreign('asset_type_id')->references('id')
            ->on('asset_types');
            $table->integer('quantity')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_has_assets');
    }
};
