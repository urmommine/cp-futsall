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
        Schema::create('event_lapangans', function (Blueprint $table) {
            $table->id();
            $table->string("nama_organizer");
            $table->date("tanggal_event");
            $table->string('gambar_event')->nullable();
            $table->text("deskripsi_event")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_lapangans');
    }
};
