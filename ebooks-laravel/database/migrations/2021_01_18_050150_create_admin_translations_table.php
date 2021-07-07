<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_translations', function (Blueprint $table) {
            $table->id();
            $table->integer('admin_id')->unsigned();
            $table->string('locale');
            $table->string('fName')->nullable();
            $table->string('lName')->nullable();

            $table->unique(['admin_id', 'locale']);
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admin_translations');
    }
}
