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
        // Pindahkan data lama ke tabel pivot
        \DB::statement('INSERT INTO category_umkm (umkm_id, category_id, created_at, updated_at) SELECT id, kategori_id, now(), now() FROM umkms WHERE kategori_id IS NOT NULL');

        Schema::table('umkms', function (Blueprint $table) {
            $table->dropForeign(['kategori_id']);
            $table->dropColumn('kategori_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('umkms', function (Blueprint $table) {
            $table->foreignId('kategori_id')->nullable()->constrained('categories');
        });
    }
};
