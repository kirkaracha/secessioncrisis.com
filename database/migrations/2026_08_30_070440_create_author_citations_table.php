<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'author_citations', callback: function (Blueprint $table) {
            $table->id();

            $table->foreignId(column: 'author_id')
                ->constrained(table: 'authors')
                ->cascadeOnDelete();

            $table->foreignId(column: 'citation_id')
                ->constrained(table: 'citations')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger(column: 'author_order')
                ->default(value: 0);

            $table->softDeletes();
            $table->nullableTimestamps();

            $table->unique([
                'citation_id',
                'author_id'
            ]);
        });
    }
};
