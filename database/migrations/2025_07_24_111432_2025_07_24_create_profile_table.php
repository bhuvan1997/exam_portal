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
        Schema::create('tbl_candidate_profile', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id',10);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->integer('mobile')->unique()->nullable(); // corrected 'interger' to 'integer'
            $table->timestamp('mobile_verified_at')->nullable();
            $table->string('password');
            $table->integer('otp')->nullable(); // added OTP field
            $table->enum('otp_verified', ['0', '1'])->default('0')->comment('0=No, 1=Yes'); // added enum with comment
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
