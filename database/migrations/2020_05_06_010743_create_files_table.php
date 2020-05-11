<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\File;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned();

            $table->string('name');

            $table->string('hash_name');

            $table->bigInteger('size')->unsigned();

            $table->text('comment')->nullable();

            $table->string('extension');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $items = File::all();
        foreach($items as $item)
        {
            //unlink("public/storage/uploads/user_2/" . $item->hash_name);
            $files[] = "uploads/user_2/" . $item->hash_name;
        }
        //пизда ебаная не работала я думал ебнусь
        \Storage::disk('public')->delete($files);

        Schema::dropIfExists('files');
    }
}
