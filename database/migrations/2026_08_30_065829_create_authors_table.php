<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'authors', callback: function (Blueprint $table) {
            $table->id();

            $table->string(column: 'first_name', length: 100);
            $table->string(column: 'middle_name', length: 100)
                ->nullable();
            $table->string(column: 'last_name', length: 100);

            $table->softDeletes();
            $table->nullableTimestamps();

            $table->index(columns: 'last_name');
        });
    }
};
