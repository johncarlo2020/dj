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
        Schema::create('mdjs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('members_id');
            $table->date('Life_Tract');
            $table->date('Life_Retreat');
            $table->string('Life_Retreat_Batch');
            $table->date('Water_Baptism');
            $table->date('FC_Date_Enrolled');
            $table->date('FC_Date_Graduated');
            $table->date('MD_Date_Enrolled');
            $table->date('MD_Date_Graduated');
            $table->date('LGC_Date_Enrolled');
            $table->date('LGC_Date_Graduated');
            $table->date('Kainos_Date_Enrolled');
            $table->date('Kainos_Date_Graduated');
            $table->timestamps();

            $table->index(["members_id"], 'journey-mdj');
            $table->foreign('members_id', 'journey-mdj')
            ->references('id')->on('members')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mdjs');
    }
};
