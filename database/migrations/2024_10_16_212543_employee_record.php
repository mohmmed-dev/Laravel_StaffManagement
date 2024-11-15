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
        Schema::create('employee_record', function (Blueprint $table) {
            $table->id();
            $table->foreignId("employee_id")->constrained()->cascadeOnDelete();
            $table->foreignId("record_id")->constrained()->cascadeOnDelete();
            $table->enum('status',['exists','absent','sick','vacation']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
