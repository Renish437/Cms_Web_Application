<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the existing foreign key constraint
            $table->dropForeign(['parent_id']);
            // Modify parent_id to be nullable
            $table->foreignId('parent_id')->nullable()->change();
            // Re-add the foreign key constraint
            $table->foreign('parent_id')->references('id')->on('posts')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            // Drop the foreign key constraint
            $table->dropForeign(['parent_id']);
            // Revert parent_id to non-nullable
            $table->foreignId('parent_id')->change();
            // Re-add the original foreign key constraint
            $table->foreign('parent_id')->references('id')->on('posts');
        });
    }
};