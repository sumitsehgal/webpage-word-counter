<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('web_records', function (Blueprint $table) {
            $table->id();
            $table->string("url", 255)->unique();
            $table->string("title", 255)->nullable();
            $table->integer("word_count")->nullable();
            $table->string('status')->default('pending');
            $table->foreignIdFor(User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('web_records');
    }
};
