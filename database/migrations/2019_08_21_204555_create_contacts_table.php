<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user');
            $table->string('company');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('number')->nullable();
            $table->string('website')->nullable();
            $table->string('response')->default('not_contacted'); // positive / no interest / negitive
            $table->string('industry');
            $table->boolean('contacted')->default(false);
            $table->boolean('todo')->default(false);
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
