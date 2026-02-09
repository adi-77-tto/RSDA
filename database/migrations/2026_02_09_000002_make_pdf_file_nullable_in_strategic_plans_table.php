<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Normalize existing empty strings to NULL
        DB::table('strategic_plans')->where('pdf_file', '')->update(['pdf_file' => null]);

        // Make column nullable (avoid doctrine/dbal dependency)
        DB::statement('ALTER TABLE strategic_plans MODIFY pdf_file VARCHAR(255) NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Ensure no NULLs before making NOT NULL
        DB::table('strategic_plans')->whereNull('pdf_file')->update(['pdf_file' => '']);

        DB::statement('ALTER TABLE strategic_plans MODIFY pdf_file VARCHAR(255) NOT NULL');
    }
};
