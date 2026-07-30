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
        Schema::table('umkms', function (Blueprint $table) {
            $table->text('peta_embed')->nullable()->after('status');
        });

        Schema::table('kelurahan_profiles', function (Blueprint $table) {
            $table->text('peta_embed')->nullable()->after('kontak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->dropColumn('peta_embed');
        });

        Schema::table('kelurahan_profiles', function (Blueprint $table) {
            $table->dropColumn('peta_embed');
        });
    }
};
