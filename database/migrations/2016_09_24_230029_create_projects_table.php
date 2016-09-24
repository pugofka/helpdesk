<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id');
            $table->string('name');
            $table->string('url_production');
            $table->string('url_dev');
            $table->text('description');
            $table->integer('payed_hours')->default(0);
            $table->integer('cost')->default(0);
            $table->enum('show', ['time', 'money', 'nothing', 'all'])->default('money');
            $table->boolean('active')->default(1);
            $table->timestamps();
            $table->softDeletes();
            $table->engine = 'InnoDB';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
