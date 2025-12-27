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
        Schema::table('event_registrations', function (Blueprint $table) {
            // Drop constraint unik yang salah
            $table->dropUnique(['event_id']);
            $table->dropUnique(['user_id']);

            // Tambahkan composite unique yang benar
            $table->unique(['event_id', 'user_id']);
        });
    }

    public function down(): void
    {
        Schema::table('event_registrations', function (Blueprint $table) {
            $table->dropUnique(['event_id', 'user_id']);

            $table->unique('event_id');
            $table->unique('user_id');
        });
    }

};
