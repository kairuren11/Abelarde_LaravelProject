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
        if (!Schema::hasColumn('games', 'deleted_at')) {
            Schema::table('games', function (Blueprint $table) {
                $table->softDeletes();
            });
        }

        if (!Schema::hasColumn('games', 'photo')) {
            Schema::table('games', function (Blueprint $table) {
                $table->string('photo')->nullable()->after('publisher');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            if (Schema::hasColumn('games', 'deleted_at')) {
                $table->dropSoftDeletes();
            }
            if (Schema::hasColumn('games', 'photo')) {
                $table->dropColumn('photo');
            }
        });
    }
};
