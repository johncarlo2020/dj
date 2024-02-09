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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('age_group_id');
            $table->unsignedBigInteger('disciple_id');
            $table->unsignedBigInteger('process_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('tribe_id');
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->date('dob');
            $table->string('gender');
            $table->string('email')->nullable();
            $table->string('marital_status');
            $table->string('address');
            $table->string('contact_number');
            $table->string('FB_account');
            $table->date('date_invited');
            $table->string('invited_from');
            $table->string('grade_level')->nullable();
            $table->unsignedBigInteger('team_id')->nullable();
            $table->string('company')->nullable();
            $table->string('occupation')->nullable();
            $table->string('campus_name')->nullable();
            $table->string('grade_level/course')->nullable();
            $table->timestamps();

            $table->index(["age_group_id"], 'members-age-group');
            $table->foreign('age_group_id', 'members-age-group')
            ->references('id')->on('age_groups')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->index(["team_id"], 'members-team');
            $table->foreign('team_id', 'members-team')
            ->references('id')->on('teams')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->index(["disciple_id"], 'members-disciple');
            $table->foreign('disciple_id', 'members-disciple')
            ->references('id')->on('disciples')
            ->onDelete('restrict')
            ->onUpdate('restrict');
            
            $table->index(["process_id"], 'members-process');
            $table->foreign('process_id', 'members-process')
            ->references('id')->on('processes')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->index(["status_id"], 'members-status');
            $table->foreign('status_id', 'members-status')
            ->references('id')->on('member_statuses')
            ->onDelete('restrict')
            ->onUpdate('restrict');

            $table->index(["tribe_id"], 'members-tribes');
            $table->foreign('tribe_id', 'members-tribes')
            ->references('id')->on('tribes')
            ->onDelete('restrict')
            ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
