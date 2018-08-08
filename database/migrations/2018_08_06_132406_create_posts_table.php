<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
	    //create posts table to identify every user in the system(Students/Teachers/Admin);
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('role');
			$table->string('userName');
            $table->timestamps();
        });
		
		/*create classes table to identify every student who are currently assigned to a class
		 *and using both class_id and class_title to identify a unique class
         *if current_teacher field is empty, it means that a teacher has not been assigned to this class		 
		 */
		Schema::create('class', function (Blueprint $table2) {
			$table2->increments('class_Id');
			$table2->string('type');
			$table2->string('classTitle');
			$table2->string('userName');
			$table2->string('currentTeacher');
			$table2->timestamps();
			
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
