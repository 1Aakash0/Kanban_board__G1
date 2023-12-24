<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskReqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_reqs', function (Blueprint $table) {
            $table->id();
            $table->integer('cus_id');
            $table->integer('task_id');
            $table->integer('project_id');
            $table->string('status',10);
            $table->enum('action',['Pending',"Approve","Reject"])->default('Pending');
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
        Schema::dropIfExists('task_reqs');
    }
}
