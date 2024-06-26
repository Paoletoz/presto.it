<?php

use App\Models\Category;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
            $categories = ['Abbigliamento', 'Cucina', 'Telefoni', 'Informatica', 'Sport', 'Motori', 'Giochi', 'Libri', 'Elettrodomestici', 'Immobili', 'Arredamento', 'Vintage'];
            foreach ($categories as $category){
                Category::create(['name'=>$category]);
            }
    }

    /**
    * Reverse the migrations.
    *
    * @return void
    */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
