<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'book_details', callback: function (Blueprint $table) {
            $table->id();

            $table->foreignId(column: 'citation_id')
                ->unique()
                ->constrained(table: 'citations')
                ->cascadeOnDelete();

            $table->string(column: 'isbn', length: 20)
                ->nullable();
            $table->string(column: 'publisher')
                ->nullable();
            $table->string(column: 'edition', length: 50)
                ->nullable();
            $table->year(column: 'publication_year')
                ->nullable();
            $table->string(column: 'pages', length: 50)
                ->nullable();
            $table->string(column: 'city')
                ->nullable();

            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }
};
