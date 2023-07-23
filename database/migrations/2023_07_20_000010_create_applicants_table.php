<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantsTable extends Migration
{
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('male')->nullable();
            $table->longText('address')->nullable();
            $table->integer('age')->nullable();
            $table->date('dob')->nullable();
            $table->string('is_active')->nullable();
            $table->string('password');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
