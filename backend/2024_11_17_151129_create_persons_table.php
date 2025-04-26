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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->string('vorname');
            $table->string('nachname');
            $table->string('titel')->nullable();
            $table->string('job_bezeichnung')->nullable();
            $table->unsignedBigInteger('institution')->nullable(); // Ref institutions.id
            $table->string('land')->default('Deutschland')->nullable();
            $table->string('plz')->nullable();
            $table->string('ort')->nullable();
            $table->string('strasse')->nullable();
            $table->string('hausnummer')->nullable();
            $table->string('google_maps')->nullable();
            $table->string('homepage')->nullable();
            $table->string('telefon')->nullable();
            $table->string('mobil')->nullable();
            $table->string('mail')->nullable();
            $table->text('notiz')->nullable();
            $table->string('status')->default('aktiv')->nullable();
            $table->timestamps();

            $table->foreign('institution')
                  ->references('id')
                  ->on('institutions')
                  ->onDelete('set null');
        });                
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('persons');
    }
};
