<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->integer('project_id');
            $table->string('name',300);
            $table->text('description');
            $table->integer('assignee_id');
            $table->string('priority_id',50)->nullable();
            $table->string('status_id',10);
            $table->integer('is_delete')->default(0);
            $table->string('estimation_hours',30)->nullable();
            $table->string('progress_hours',30)->nullable();
            $table->string('remainig_hours',30)->nullable();
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
        Schema::dropIfExists('tasks');
    }
}
