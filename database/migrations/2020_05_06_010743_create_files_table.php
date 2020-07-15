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
            $table->string('path');
            $table->bigInteger('size')->unsigned();
            $table->string('extension');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        $files = [];
        foreach ($items as $item)
        {
            //unlink("public/storage/uploads/user_2/" . $item->hash_name);
            $path = "uploads/user_" . $item->user_id . "/" . $item->hash_name;
            echo $path . "\n";
            $files[] = $path;
        }
        //пизда ебаная не работала я думал ебнусь
        if($files)
            \Storage::disk('public')->delete($files);

        Schema::dropIfExists('files');
    }
}
