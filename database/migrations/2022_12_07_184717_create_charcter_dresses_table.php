<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('charcter_dresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->constrained('characters')->onDelete('CASCADE');
            $table->boolean('shirt')->default(0);
            $table->boolean('pant')->default(0);
            $table->boolean('shoes')->default(0);
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
        Schema::dropIfExists('charcter_dresses');
    }
};
