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
        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->string('image')->nullable()->after('description');
        });

        // Ensure column is NOT NULL (avoid doctrine/dbal dependency)
        DB::table('strategic_plans')->whereNull('pdf_file')->update(['pdf_file' => '']);
        DB::statement('ALTER TABLE strategic_plans MODIFY pdf_file VARCHAR(255) NOT NULL');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Make nullable again
        DB::statement('ALTER TABLE strategic_plans MODIFY pdf_file VARCHAR(255) NULL');

        Schema::table('strategic_plans', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
};
