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
        Schema::create('churches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone_number');
            $table->string('address');
            $table->string('parish');
            $table->string('vicar');
            $table->string('parent_guardian_name')->nullable();
            $table->boolean('enrolled_before')->default(false);
            $table->date('enrolled_date')->nullable();
            $table->text('talents')->nullable();
            $table->text('youth_group_role')->nullable();
            $table->boolean('born_again_christian')->default(false);
            $table->text('salvation_testimony')->nullable();
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
        Schema::dropIfExists('churches');
    }
};
