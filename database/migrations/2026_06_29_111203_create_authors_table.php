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
        Schema::create('authors', function (Blueprint $table) {
            $table->id(); // 1. Auto-increment Primary Key ID
            
            // Core Data Fields matching your table exactly:
            $table->string('author');       // 2. Author Name text column (varchar)
            $table->text('bio')->nullable(); // 3. Bio text column (Allows Null values)
            $table->text('image');        // 4. Image path tracking string column (varchar)
            
            $table->timestamps(); // 5. Automatically generates created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('authors');
    }
};

