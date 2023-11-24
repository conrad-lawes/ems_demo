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
        Schema::create('starters', function (Blueprint $table) {
            $table->id();          
            $table->string('firstname');
            $table->string('lastname');            
            $table->string('position');
            $table->string('email')->unique();           
            $table->string('mobile')->nullable();
            $table->string('fullname')->nullable();
            // $table->string('fullname')->nullable();
            // $table->string('phone_extension')->nullable();
            $table->string('username')->unique();
            $table->string('password');
            $table->date('date_hired');
            $table->date('end_date')->nullable();
            // $table->string('ticket_number');
            // $table->string('dn')->nullable();
            $table->string('status')->default('Pending');
            $table->boolean('notify')->default(1);
            $table->unsignedBigInteger('manager_id')->unsigned()->nullable();
            $table->foreign('manager_id')->references('id')->on('employees');         
            $table->unsignedBigInteger('department_id')->unsigned()->nullable();
            $table->foreign('department_id')->references('id')->on('departments');
            $table->unsignedBigInteger('staff_type_id')->nullable();
            $table->foreign('staff_type_id')->references('id')->on('staff_types');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('updated_by')->nullable();
            $table->string('created_by')->nullable();
            $table->text('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('starters');
    }
};
