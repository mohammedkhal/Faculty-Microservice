<?php

use App\Models\V1\Faculty;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_lecturers', function (Blueprint $table) {
            $table->bigIncrements('sequence');
            $table->uuid('uuid');
            $table->string('family_name');
            $table->string('status')->default(Faculty::STATUS_ACTIVE);

            $table->timestamps();

            $table->unique('uuid');
			$table->index('status');
			$table->index('user_uuid');
			$table->index('facility_uuid');
			$table->index('specialization_uuid');
			$table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
