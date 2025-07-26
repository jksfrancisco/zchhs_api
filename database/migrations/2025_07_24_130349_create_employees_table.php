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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('id_number')->unique();

            // Name Fields
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('middle_initial')->nullable();
            $table->string('last_name');
            $table->string('staff_chi_name')->nullable();

            // Personal Info
            $table->date('birth_date')->nullable();
            $table->string('birth_place')->nullable();
            $table->enum('sex', ['male', 'female'])->nullable();

            // Address & Contact
            $table->string('address')->nullable();
            $table->string('tel_num')->nullable();
            $table->string('cell_num')->nullable();

            // Emergency Contact
            $table->string('contact_person')->nullable();
            $table->string('contact_address')->nullable();
            $table->string('contact_num')->nullable();

            // Government IDs
            $table->string('sss_number')->nullable();
            $table->string('phil_health')->nullable();
            $table->string('tin_num')->nullable();
            $table->string('sss_coverage')->nullable();

            // Job Info
            $table->string('position')->nullable();
            $table->string('department')->nullable();
            $table->string('signature_path')->nullable();
            $table->string('image_path')->nullable();
            $table->date('date_hired')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
