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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('CIN')->unique()->nullable();
            $table->string('CNE')->unique()->nullable();
            $table->string('username')->unique();
            $table->date('birthday');
            $table->string('gender');
            $table->string('phone');
            $table->text('address');
            $table->string('parent_name')->nullable();
            $table->string('parent_relation')->nullable();
            $table->string('parent_phone')->nullable();
            $table->foreignId('role_id')->constrained();
            $table->foreignId('classroom_id')->nullable()->constrained();
            $table->foreignId('level_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
