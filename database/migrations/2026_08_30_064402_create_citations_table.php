<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'citations', callback: function (Blueprint $table) {
            $table->id();

            $table->enum(column: 'type', allowed: [
                'book',
                'website'
            ]);

            $table->string(column: 'title', length: 500);
            $table->string(column: 'citation_key', length: 100)
                ->nullable();
            $table->text(column: 'notes')
                ->nullable();
            $table->date(column: 'accessed_at')
                ->nullable();

            $table->enum(column: 'citation_style', allowed: [
                'apa',
                'mla'
            ])->nullable();

            $table->nullableTimestamps();
            $table->softDeletes();

            $table->index(columns: 'type');
        });
    }
};
