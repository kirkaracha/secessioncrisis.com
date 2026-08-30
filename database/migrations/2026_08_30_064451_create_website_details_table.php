<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(table: 'website_details', callback: function (Blueprint $table) {
            $table->id();

            $table->foreignId(column: 'citation_id')
                ->unique()
                ->constrained(table: 'citations')
                ->cascadeOnDelete();

            $table->string(column: 'url', length: 2048);
            $table->string(column: 'site_name')
                ->nullable();
            $table->date(column: 'published_date')
                ->nullable();
            $table->date(column: 'last_accessed_at')
                ->nullable();
            $table->string(column: 'archive_url', length: 2048)
                ->nullable();

            $table->softDeletes();
            $table->nullableTimestamps();
        });
    }
};
