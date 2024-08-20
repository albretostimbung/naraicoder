<?php

use App\Models\HeroSection;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('heading');
            $table->string('thumbnail');
            $table->string('button_text');
            $table->string('button_link');
            $table->timestamps();
        });

        HeroSection::create([
            'heading' => 'Bertumbuh dengan kolaborasi, Menuju visi<br/>"Bersinergi, Berkolaborasi dan Berinovasi"',
            'thumbnail' => 'hero-section-1.jpg',
            'button_text' => 'Join Now',
            'button_link' => route('register'),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
