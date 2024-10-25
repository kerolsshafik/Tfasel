<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Auto-incrementing ID
            $table->string('name'); // Name of the contact
            $table->string('email')->unique(); // Email of the contact
            $table->string('phone'); // Phone number of the contact
            $table->string('subject'); // Subject of the message
            $table->text('message'); // Message content
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('contacts');
    }
}
