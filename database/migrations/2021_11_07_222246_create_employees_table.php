<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name_prefix');
            $table->string('first_name')->index();
            $table->string('middle_initial');
            $table->string('last_name')->index();
            $table->string('gender',1);
            $table->string('email')->index();
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('mother_maiden_name');
            $table->date('birth_date');
            $table->date('joining_date')->nullable();
            $table->double('salary');
            $table->string('ssn')->index();
            $table->string('phone');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
