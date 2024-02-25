<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('funkos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre')->unique();
            $table->decimal('precio', 10,2)->default(0.0);
            $table->integer('cantidad')->default(0);
            $table->string('imagen')->default('https://m.media-amazon.com/images/I/917Mf8yTjEL._AC_UF894,1000_QL80_.jpg');
            $table->foreignId('categoria_id')->constrained('categorias')->onDelete('cascade');
            $table->boolean('isDeleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('funkos');
    }
};
