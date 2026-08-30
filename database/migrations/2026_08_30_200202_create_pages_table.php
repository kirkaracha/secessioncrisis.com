<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();

            Schema::create(table: 'pages', callback: function (Blueprint $table) {
                $table->id();

                $table->string(column: 'title');
                $table->string(column: 'slug');
                $table->longText(column: 'contents');

                $table->nullableTimestamps();
                $table->softDeletes();
            });

            $table->nullableTimestamps();
            $table->softDeletes();
        });
    }
};
