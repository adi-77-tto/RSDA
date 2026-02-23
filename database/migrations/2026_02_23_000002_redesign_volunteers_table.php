<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RedesignVolunteersTable extends Migration
{
    public function up()
    {
        // Drop the old volunteers table and recreate for sign-ups
        Schema::dropIfExists('volunteers');
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Drop volunteer_applications (replaced by volunteers table)
        Schema::dropIfExists('volunteer_applications');

        // Drop subscribe table
        Schema::dropIfExists('subscribe');
    }

    public function down()
    {
        Schema::dropIfExists('volunteers');
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->text('requirements')->nullable();
            $table->string('location')->nullable();
            $table->enum('status', ['open', 'closed'])->default('open');
            $table->timestamps();
        });
    }
}
