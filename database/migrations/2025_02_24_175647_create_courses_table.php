<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * firaCode
     */
    public function up(): void
    {
        // migrate:fresh تحذف كل الجداول وتعيد انشائها
        // migrate:status يعرض الجداول وهل اشتغلت وفي اي مرحلة انشات
        // migrate:rollback يتراجع عن اخر رفع للجداول
        // migrate:reset يتراجع عن جميع الرفع
        
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image');
            $table->string('content');
            $table->double('price',10,3);
            $table->integer('hours');
            $table->boolean('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
