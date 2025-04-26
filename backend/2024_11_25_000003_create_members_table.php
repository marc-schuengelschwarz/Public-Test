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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tour_id')->nullable(); // Ref tours.id

            $table->foreign('tour_id')
                  ->references('id')
                  ->on('tours')
                  ->onDelete('set null');

        $table->foreign('institution_id')
                  ->references('id')
                  ->on('institutions')
                  ->onDelete('set null');

        $table->foreign('rechnungsempfänger_id')
                  ->references('id')
                  ->on('institutions')
                  ->onDelete('set null');
                 
        $table->foreign('rechnungskontakt')
                  ->references('id')
                  ->on('persons')
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
        Schema::dropIfExists('members');
    }
};
