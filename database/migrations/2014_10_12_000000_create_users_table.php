<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->bigInteger('role_id')->unsigned()->index('role_id')->comment('foreign key of users table');
            $table->foreign('role_id')->references('id')->on('roles');
            $table->rememberToken();
            $table->timestamps();
        });

        //password =123456
        $data=array(
            array('name'=>'Admin','email'=>'admin@gmail.com','contact_number'=>'8745210369','password'=>'$2y$10$4u0SENt8zCiIVmo7aFdzMOhQxuGaMptD8IkzoenpaE0hVWPEl3L/e.','role_id'=>1),
           
        );
        User::Insert($data);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
