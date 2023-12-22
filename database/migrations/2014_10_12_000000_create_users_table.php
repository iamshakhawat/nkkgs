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
            $table->string('user_id')->nullable();
            $table->string('name')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('parent_phone')->nullable();
            $table->string('parent_email')->nullable();
            $table->string('emergency_contact')->nullable();
            $table->date('dob')->nullable();
            $table->integer('roll')->nullable();
            $table->integer('class')->nullable();
            $table->string('section')->nullable();
            $table->enum('shift',['Morning','Day'])->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken()->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender',['Male','Female'])->nullable();
            $table->enum('religion',['Islam','Hindu','Buddah','Christian'])->nullable();
            $table->string('nationality')->nullable();
            $table->longText('current_address')->nullable();
            $table->longText('parmanent_address')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('photo')->nullable();
            $table->string('subject')->nullable();
            $table->boolean('status')->default(0)->nullable();
            $table->enum('role',['admin','teacher','gurdian','student'])->nullable();
            $table->longText('experience')->nullable();
            $table->longText('qualification')->nullable();
            $table->longText('about_me')->nullable();
            $table->date('joining_date')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
        {Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::dropIfExists('users');
    }
};
