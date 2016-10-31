<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableClient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name','150');
            $table->enum('gender',['male','female']);
            $table->string('phone','100');
            $table->string('email','100');
            $table->string('address','150');
            $table->string('nationality','150');
            $table->string('dob','100');
            $table->string('education_background','200');
            $table->enum('contact_mode',['email','phone','none']);
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
        Schema::dropIfExists('clients');
    }
}
